<?php

use App\Account\Models\UserPermission;
use App\Account\Models\UserPermissionGroup;
use Illuminate\Database\Seeder;

class UserPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionGroup = new UserPermissionGroup([
            'title' => 'Tài khoản'
        ]);
        $permissionGroup->save();
        $permissionGroup->permissions()->saveMany([
            new UserPermission([
                'title' => 'Tài khoản',
                'name' => 'accounts'
            ]),
            new UserPermission([
                'title' => 'Xem danh sách tài khoản',
                'name' => 'accounts.users.index'
            ]),
            new UserPermission([
                'title' => 'Xem chi tiết tài khoản',
                'name' => 'accounts.users.show'
            ]),
            new UserPermission([
                'title' => 'Thêm tài khoản mới',
                'name' => 'accounts.users.create'
            ]),
            new UserPermission([
                'title' => 'Sửa tài khoản',
                'name' => 'accounts.users.edit'
            ]),
            new UserPermission([
                'title' => 'Xóa tài khoản',
                'name' => 'accounts.users.destroy'
            ]),
            new UserPermission([
                'title' => 'Xem danh sách nhóm tài khoản',
                'name' => 'accounts.groups.index'
            ]),
            new UserPermission([
                'title' => 'Thêm nhóm tài khoản mới',
                'name' => 'accounts.groups.create'
            ]),
            new UserPermission([
                'title' => 'Sửa nhómtài khoản',
                'name' => 'accounts.groups.edit'
            ]),
            new UserPermission([
                'title' => 'Xóa nhóm tài khoản',
                'name' => 'accounts.groups.destroy'
            ])
        ]);
    }
}
