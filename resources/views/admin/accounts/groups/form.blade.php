@section('back', route('admin.accounts.groups.index'))

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Thông tin nhóm</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="control-label col-sm-3">Tên nhóm</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" id="title" value="{{ old('title', $group->title) }}" class="form-control">
                        @if($errors->has('title'))
                            <div class="help-block">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                    <label class="control-label col-sm-3">Phân quyền</label>
                    <div class="col-sm-9">
                        @foreach ($permissionGroups as $permissionGroup)
                            @if($permissionGroup->permissions->isNotEmpty())
                            <h4>{{ $permissionGroup->title }}</h4>
                                @foreach($permissionGroup->permissions as $permission)
                                    <div>
                                        <label class="cr-styled">
                                            <input type="checkbox" name="permission[]" value="{{ $permission->id }}"{{ optional($group->permissions)->contains($permission) ? ' checked' : '' }}>
                                            <i class="fa"></i>
                                            {{ $permission->title }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
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