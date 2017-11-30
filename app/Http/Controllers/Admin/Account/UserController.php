<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Http\Filters\UserFilters;
use App\User;
use App\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    /**
     * GroupController constructor.
     */
    public function __construct()
    {
        View::composer('admin.accounts.users.form', function ($view) {
            $view->with('userGroups', UserGroup::all(['id', 'title']));
        });

        app('navigation')->setCurrentItem('admin.accounts.users.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserFilters $filters)
    {
        $this->authorize('accounts.users.index');

        $users = User::query()
            ->with('group')
            ->filters($filters)
            ->paginate(20);

        return view('admin.accounts.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('accounts.users.create');

        $user = new User();

        return view('admin.accounts.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('accounts.users.create');

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|alpha_dash|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'nullable|min:6|confirmed',
            'user_group_id' => 'nullable|numeric|exists:user_groups,id',
        ]);

        if ($request->user('admin')->can('super-admin')) {
            $data['is_super_admin'] = $request->filled('is_super_admin');
        }

        $data['is_activated'] = $request->filled('is_activated');

        if ($request->filled('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user = User::create($data);

        flash('Đã lưu thành viên thành công.', 'success');

        return redirect()->route('admin.accounts.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('edit', $user);

        return view('admin.accounts.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('edit', $user);

        $currentUser = $request->user('admin');
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|alpha_dash|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'user_group_id' => 'nullable|numeric',
        ]);

        if ($currentUser->can('accounts.users.edit')) {
            $data['is_activated'] = $request->filled('is_activated');
        }

        if ($currentUser->can('super-admin')) {
            $data['is_super_admin'] = $request->filled('is_super_admin');
        }

        if ($request->filled('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        flash('Đã lưu thông tin thành công.', 'success');

        return back();
    }
}