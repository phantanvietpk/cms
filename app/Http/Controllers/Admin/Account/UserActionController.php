<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\ActionController;
use App\User;
use Illuminate\Http\Request;

class UserActionController extends ActionController
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function destroy(Request $request)
    {
        $users = User::query()->whereIn('id', $this->item)->get();

        if ($users->isNotEmpty()) {
            $users->each(function ($user) {
                $this->authorize('delete', $user);
                $user->delete();
            });

            flash('Đã xóa thành viên thành công.', 'success');
            return back();
        }

        flash('Dữ liệu được chọn không tồn tại.', 'danger');
        return back();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function active(Request $request)
    {
        $users = User::query()->whereIn('id', $this->item)->get();

        if ($users->isNotEmpty()) {
            $users->each(function ($user) {
                $this->authorize('edit', $user);
                $user->update(['is_activated' => true]);
            });

            flash('Đã cập nhật thành viên thành công.', 'success');
            return back();
        }

        flash('Dữ liệu được chọn không tồn tại.', 'danger');
        return back();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function deactive(Request $request)
    {
        $users = User::query()->whereIn('id', $this->item)->get();

        if ($users->isNotEmpty()) {
            $users->each(function ($user) {
                $this->authorize('edit', $user);
                $user->update(['is_activated' => false]);
            });

            flash('Đã cập nhật thành viên thành công.', 'success');
            return back();
        }

        flash('Dữ liệu được chọn không tồn tại.', 'danger');
        return back();
    }
}