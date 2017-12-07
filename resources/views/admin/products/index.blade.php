@extends('layouts.backend')

@section('title', 'Quản lý sản phẩm')

@push('heading')
    @can('products.create')
        <a href="{{ route('admin.products.create') }}" class="btn btn-default">
            <i class="fa fa-fw fa-plus"></i> Thêm mới
        </a>
    @endcan
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh sách sản phẩm</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @component('admin.components.datatables')
                                @slot('searchUrl', route('admin.products.index'))
                                {{--  @slot('actionUrl', route('admin.products.actions'))  --}}
                                @slot('actions', [
                                    ['destroy', 'Xóa tất cả', 'products.destroy']
                                ])
                                @slot('columns', [
                                    ['title', 'Tên trang', true],
                                    ['status', 'Tình trạng', true, '100px'],
                                    ['created_at', 'Ngày tạo', true],
                                ])
                                @slot('actionColumn', true)
                                @slot('view', 'admin.products.item')

                                @slot('data', $products)
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection