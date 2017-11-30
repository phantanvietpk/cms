<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\ActionController;
use App\UserGroup;
use Illuminate\Http\Request;

class GroupActionController extends ActionController
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function destroy(Request $request)
    {
        $this->authorize('accounts.groups.destroy');

        $groups = UserGroup::query()->whereIn('id', $this->item)->get();

        if ($groups->isNotEmpty()) {
            $groups->each(function ($group) {
                $group->delete();
            });

            flash('Đã xóa nhóm thành viên thành công.', 'success');
            return redirect()->route('admin.accounts.groups.index');
        }

        flash('Dữ liệu được chọn không tồn tại.', 'danger');
        return redirect()->route('admin.accounts.groups.index');
    }
}