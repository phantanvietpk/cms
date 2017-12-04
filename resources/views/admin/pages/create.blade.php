@extends('layouts.backend')

@section('title', 'Thêm trang nội dung mới')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.pages.store') }}" method="POST" class="form">
                @include('admin.pages.form')
            </form>
        </div>
    </div>
@endsection