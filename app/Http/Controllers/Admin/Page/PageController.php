<?php

namespace App\Http\Controllers\Admin\Page;

use Illuminate\Http\Request;
use App\Page;
use App\UserPermissionGroup;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    /**
     * GroupController constructor.
     */
    public function __construct()
    {
        View::composer('admin.pages.form', function ($view) {
            $view->with('permissionGroups', UserPermissionGroup::query()
                ->with('permissions')
                ->get());
        });

        app('navigation')->setCurrentItem('admin.pages.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('pages.index');
        
        $groups = Page::query()
            // ->filters($filters)
            // ->withCount('languages')
            ->paginate(20);

        return view('admin.pages.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('pages.create');
        
        $page = new Page();

        return view('admin.pages.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $data = $request->except(['_token', 'language']);
        $data['slug'] = str_slug($data['name']);
        $data['published'] = $request->has('published') ? true : false;
        if ($page = Page::create($data)) {
            flash('Đã lưu nội dung trang thành công.', 'success');
        } else {
            flash('Đã lưu nội dung trang thất bại.', 'error');
        }
        return redirect()->route('admin.pages.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $this->authorize('edit', $page);

        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $this->authorize('edit', $page);
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $data = $request->except(['_token', 'language']);
        $data['published'] = $request->has('published') ? true : false;
        $page->update($data);
        flash('Đã lưu thông tin thành công.', 'success');
        return back();
    }
}
