<?php

namespace App\Http\Controllers\Admin;

use App\Rules\ActivatedUserRule;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * @inheritDoc
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * @inheritDoc
     */
    public function username()
    {
        return 'username';
    }

    /**
     * @inheritDoc
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => ['required', 'string', new ActivatedUserRule()],
            'password' => 'required|string',
        ]);
    }

    /**
     * @inheritDoc
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}