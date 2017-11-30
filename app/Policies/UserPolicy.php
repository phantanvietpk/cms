<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * @param \App\User $user
     * @param \App\User $baseUser
     *
     * @return bool
     */
    public function edit(User $user, User $baseUser)
    {
        return $user->can('accounts.users.edit') &&
            (!$baseUser->isSuperAdmin() || $user->id === $baseUser->id);
    }

    /**
     * @param \App\User $user
     * @param \App\User $baseUser
     *
     * @return bool
     */
    public function delete(User $user, User $baseUser)
    {
        return $user->can('accounts.users.destroy') &&
            !$baseUser->isSuperAdmin() &&
            $user->id !== $baseUser->id;
    }
}
