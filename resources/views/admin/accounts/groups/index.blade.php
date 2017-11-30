@extends('layouts.backend')

@section('title', 'Quản lý nhóm tài khoản')

@push('heading')
    @can('accounts.groups.create')
        <a href="{{ route('admin.accounts.groups.create') }}" class="btn btn-default">
            <i class="fa fa-fw fa-plus"></i> Thêm mới
        </a>
    @endcan
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh sách nhóm</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @component('admin.components.datatables')
                                @slot('searchUrl', route('admin.accounts.groups.index'))
                                @slot('actionUrl', route('admin.accounts.groups.actions'))
                                @slot('actions', [
                                    ['destroy', 'Xóa tất cả', 'accounts.groups.destroy']
                                ])
                                @slot('columns', [
                                    ['title', 'Tên nhóm', true],
                                    ['users_count', 'Số thành viên', true, '100px'],
                                    ['created_at', 'Ngày tạo', true],
                                ])
                                @slot('actionColumn', true)
                                @slot('view', 'admin.accounts.groups.item')

                                @slot('data', $groups)
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection