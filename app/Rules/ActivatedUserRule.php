<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class ActivatedUserRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = User::where('username', $value)->first();

        return $user && $user->isActivated();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Tài khoản này chưa được kích hoạt.';
    }
}
