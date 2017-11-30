<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Filters\UserGroupFilters;
use App\UserGroup;
use App\UserPermissionGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class GroupController extends Controller
{
    /**
     * GroupController constructor.
     */
    public function __construct()
    {
        View::composer('admin.accounts.groups.form', function ($view) {
            $view->with('permissionGroups', UserPermissionGroup::query()
                ->with('permissions')
                ->get());
        });

        app('navigation')->setCurrentItem('admin.accounts.groups.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserGroupFilters $filters)
    {
        $this->authorize('accounts.groups.index');

        $groups = UserGroup::query()
            ->filters($filters)
            ->withCount('users')
            ->paginate(20);

        return view('admin.accounts.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('accounts.groups.create');

        $group = new UserGroup();

        return view('admin.accounts.groups.create', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('accounts.groups.create');

        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $group = UserGroup::create($data);

        if ($request->filled('permission')) {
            $group->permissions()->attach($request->input('permission'));
        }

        flash('Đã lưu nhóm thành viên thành công.', 'success');

        return redirect()->route('admin.accounts.groups.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  UserGroup $group
     * @return \Illuminate\Http\Response
     */
    public function edit(UserGroup $group)
    {
        $this->authorize('accounts.groups.edit');

        $group->load('permissions');

        return view('admin.accounts.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  UserGroup $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserGroup $group)
    {
        $this->authorize('accounts.groups.edit');

        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $group->update($data);

        if ($request->filled('permission')) {
            $group->permissions()->sync($request->input('permission'));
        }

        flash('Đã lưu nhóm thành viên thành công.', 'success');

        return back();
    }
}
