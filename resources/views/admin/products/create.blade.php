@extends('layouts.backend')

@section('title', 'Thêm sản phẩm mới')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.products.store') }}" method="POST" class="form">
                @include('admin.products.form')
            </form>
        </div>
    </div>
@endsection