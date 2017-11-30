<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function deactivated_user_can_not_login_to_admin()
    {
        $deactivatedUser = create('App\User', ['is_activated' => false]);
        $activatedUser = create('App\User');

        $this->post(route('admin.login'), [
            'username' => $deactivatedUser->username,
            'password' => 'secret'
        ])
            ->assertSessionHasErrors(['username']);

        $this->post(route('admin.login'), [
            'username' => $activatedUser->username,
            'password' => 'secret'
        ])
            ->assertRedirect('/admin');
    }
}
