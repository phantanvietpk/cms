@extends('layouts.backend')

@section('title', 'Sửa trang nội dung')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.pages.update', $page->id) }}" method="POST" class="form-horizontal">
                {{method_field('PUT') }}
                @include('admin.pages.form')
            </form>
        </div>
    </div>
@endsection