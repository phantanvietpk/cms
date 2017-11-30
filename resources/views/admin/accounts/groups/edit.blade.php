@extends('layouts.backend')

@section('title', 'Sửa nhóm tài khoản')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.accounts.groups.update', $group->id) }}" method="POST" class="form-horizontal">
                {{method_field('PUT') }}
                @include('admin.accounts.groups.form')
            </form>
        </div>
    </div>
@endsection