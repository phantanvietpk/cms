<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\ActionController;
use App\Page;
use Illuminate\Http\Request;

class PageActionController extends ActionController
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function destroy(Request $request)
    {
        $this->authorize('pages.destroy');

        $pages = Page::query()->whereIn('id', $this->item)->get();

        if ($pages->isNotEmpty()) {
            $pages->each(function ($page) {
                $page->delete();
            });

            flash('Đã xóa trang nội dung thành công.', 'success');
            return redirect()->route('admin.pages.index');
        }

        flash('Dữ liệu được chọn không tồn tại.', 'danger');
        return redirect()->route('admin.pages.index');
    }
}
