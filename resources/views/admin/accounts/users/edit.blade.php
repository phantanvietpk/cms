@extends('layouts.backend')

@section('title', 'Sửa tài khoản')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.accounts.users.update', $user->id) }}" method="POST" class="form-horizontal">
                {{method_field('PUT') }}
                @include('admin.accounts.users.form')
            </form>

            <form action="{{ route('admin.accounts.users.photo.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ảnh cá nhân</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group text-center">
                                    <img src="{{ $user->avatar() }}" class="img-avatar">
                                </div>
                                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                    <label for="photo" class="control-label col-sm-3">Chọn ảnh</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="photo" id="photo" class="form-control">
                                        @if($errors->has('photo'))
                                            <div class="help-block">{{ $errors->first('photo') }}</div>
                                        @endif
                                        <div class="text-muted">Chỉ chọn ảnh có dung lượng tối đa 1 MB.</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        @if($user->photo_path)
                                        <button type="button" class="btn btn-sm btn-default" onclick="document.getElementById('destroy-photo-image').submit(); return false;">
                                            <i class="fa fa-trash"></i> Xóa ảnh
                                        </button>
                                        @endif
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fa fa-upload"></i> Tải lên
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{ route('admin.accounts.users.photo.destroy', $user->id) }}" id="destroy-photo-image" method="POST" class="hidden">
                {{ csrf_field() }} {{ method_field('DELETE') }}
            </form>
        </div>
    </div>
@endsection