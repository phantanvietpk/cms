@can('accounts.users.index')
    @section('back', route('admin.accounts.users.index'))
@endcan

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Thông tin thành viên</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label col-sm-3">Tên đầy đủ</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control">
                        @if($errors->has('name'))
                            <div class="help-block">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="control-label col-sm-3">Tên tài khoản</label>
                    <div class="col-sm-9">
                        <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" class="form-control">
                        @if($errors->has('username'))
                            <div class="help-block">{{ $errors->first('username') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label col-sm-3">Địa chỉ email</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control">
                        @if($errors->has('email'))
                            <div class="help-block">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label col-sm-3">Mật khẩu</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" id="password" class="form-control">
                        @if($errors->has('password'))
                            <div class="help-block">{{ $errors->first('password') }}</div>
                        @endif
                        <div class="text-muted">Tùy chọn</div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="control-label col-sm-3">Xác nhận mật khẩu</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        <div class="text-muted">Tùy chọn</div>
                    </div>
                </div>

                @if($userGroups->isNotEmpty())
                    <div class="form-group">
                        <label for="user_group_id" class="control-label col-sm-3">Nhóm</label>
                        <div class="col-sm-9">
                            <select name="user_group_id" id="user_group_id" class="form-control">
                                <option value=" ">Chưa có nhóm nào</option>
                                @foreach($userGroups as $userGroup)
                                    <option value="{{ $userGroup->id }}"{{ old('user_group_id', $user->user_group_id) == $userGroup->id ? ' selected' : '' }}>{{ $userGroup->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <label for="is_activated" class="control-label col-sm-3">Kích hoạt</label>
                    <div class="col-sm-9">
                        <div class="checkbox">
                            <label class="cr-styled">
                                <input type="checkbox" id="is_activated" name="is_activated" data-action="toggle-checkbox-table"{{ $user->is_activated ? ' checked' : '' }}>
                                <i class="fa"></i>
                            </label>
                        </div>
                    </div>
                </div>

                @can('super-admin')
                <div class="form-group">
                    <label for="is_super_admin" class="control-label col-sm-3">Quản trị cấp cao</label>
                    <div class="col-sm-9">
                        <div class="checkbox">
                            <label class="cr-styled">
                                <input type="checkbox" id="is_super_admin" name="is_super_admin" data-action="toggle-checkbox-table"{{ $user->is_super_admin ? ' checked' : '' }}>
                                <i class="fa"></i>
                            </label>
                        </div>
                    </div>
                </div>
                @endcan

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-fw fa-save"></i> Lưu
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>