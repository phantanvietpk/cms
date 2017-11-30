@extends('layouts.backend')

@section('title', 'Thêm tài khoản mới')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.accounts.users.store') }}" method="POST" class="form-horizontal">
                @include('admin.accounts.users.form')
            </form>
        </div>

        <div class="col-md-12">
            <div class="alert alert-info alert-important">
                <p><strong>Lưu ý:</strong> bạn chỉ có thể sửa đổi ảnh đại diện sau khi khởi tạo thành viên.</p>
            </div>
        </div>
    </div>
@endsection