<?php

namespace App\Http\Controllers\Admin\Account;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserPhotoController extends Controller
{
    public function update(Request $request, User $user)
    {
        $this->authorize('edit', $user);

        $this->validate($request, [
            'photo' => ['required', 'image', 'max:1024']
        ]);

        $storage = Storage::disk('public');

        if ($storage->exists($user->photo_path)) {
            $storage->delete($user->photo_path);
        }

        $user->update([
            'photo_path' => $request->file('photo')->store('avatars', 'public')
        ]);

        flash('Đã thay đổi ảnh thành công.', 'success');

        return back();
    }

    public function destroy(User $user)
    {
        $this->authorize('edit', $user);

        $storage = Storage::disk('public');

        if ($storage->exists($user->photo_path)) {
            flash('Đã xóa ảnh thành công.', 'success');

            $storage->delete($user->photo_path);

            $user->update([
                'photo_path' => null
            ]);
        } else {
            flash('Bạn chưa có ảnh đại diện.', 'warning');
        }

        return back();
    }
}
