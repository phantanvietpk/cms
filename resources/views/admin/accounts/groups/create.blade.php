@extends('layouts.backend')

@section('title', 'Thêm nhóm tài khoản mới')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.accounts.groups.store') }}" method="POST" class="form-horizontal">
                @include('admin.accounts.groups.form')
            </form>
        </div>
    </div>
@endsection