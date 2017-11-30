@extends('layouts.backend')

@section('title', 'Quản lý tài khoản')

@push('heading')
    @can('accounts.users.create')
        <a href="{{ route('admin.accounts.users.create') }}" class="btn btn-default">
            <i class="fa fa-fw fa-plus"></i> Thêm mới
        </a>
    @endcan
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh sách thành viên</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @component('admin.components.datatables')
                                @slot('searchUrl', route('admin.accounts.users.index'))
                                @slot('actionUrl', route('admin.accounts.users.actions'))
                                @slot('actions', [
                                    ['active', 'Kích hoạt', 'accounts.users.edit'],
                                    ['deactive', 'Ngừng kích hoạt', 'accounts.users.edit'],
                                    ['destroy', 'Xóa tất cả', 'accounts.users.destroy'],
                                ])
                                @slot('columns', [
                                    ['name', 'Tên thành viên', true],
                                    ['username', 'Tài khoản', true],
                                    ['email', 'Email', true],
                                    ['is_activated', 'Tình trạng', true],
                                    ['user_group_id', 'Nhóm', true],
                                ])
                                @slot('actionColumn', true)
                                @slot('view', 'admin.accounts.users.item')

                                @slot('data', $users)
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection