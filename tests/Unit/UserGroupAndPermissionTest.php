<?php

namespace Tests\Unit;

use App\User;
use App\UserGroup;
use App\UserPermission;
use App\UserPermissionGroup;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserGroupAndPermissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_user_has_a_group()
    {
        $user = create(User::class);
        $group = create(UserGroup::class);

        $user->assignToGroup($group);
        $user->fresh();

        $this->assertInstanceOf(UserGroup::class, $user->group);
        $this->assertEquals($group->title, $user->group->title);
    }

    /** @test */
    function it_permission_has_group()
    {
        $permission = create(UserPermission::class);
        $this->assertInstanceOf(UserPermissionGroup::class, $permission->group);
    }

    /** @test */
    function it_group_has_permission()
    {
        $group = create(UserGroup::class);
        $permission = create(UserPermission::class);

        $group->assignPermission($permission);
        $this->assertEquals($permission->name, $group->fresh()->permissions->first()->name);

        $permissions = [
            create(UserPermission::class),
            create(UserPermission::class),
            create(UserPermission::class),
            create(UserPermission::class)
        ];
        $group->assignPermissions($permissions);
        $this->assertEquals(5, $group->permissions()->count());
    }

    /** @test */
    function it_user_has_permission()
    {
        $user = create(User::class);
        $group = create(UserGroup::class);
        $permission = create(UserPermission::class);

        $group->assignPermission($permission);
        $user->assignToGroup($group);

        $this->assertTrue($user->hasPermission($permission->name));
    }
}
