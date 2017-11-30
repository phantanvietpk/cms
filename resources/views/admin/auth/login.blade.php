@extends('layouts.master')

@section('title', 'Đăng Nhập')

@push('header')
    @include('admin.partials.styles')
@endpush

@section('body')
    <div class="wrapper-page animated fadeInDown">
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="text-center m-t-10">Đăng nhập</h3>
            </div>

            <form class="form-horizontal m-t-40" action="{{ route('admin.login') }}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="remember" value="1">

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <label for="username" class="sr-only">Tên tài khoản</label>
                        <input id="username" name="username" class="form-control" type="text" placeholder="Tên tài khoản" value="{{ old('username') }}" required autofocus autocomplete="off">
                        @if($errors->has('username'))
                            <p class="help-block">{{ $errors->first('username') }}</p>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <label for="password" class="sr-only">Mật khẩu</label>
                        <input id="password" name="password" class="form-control" type="password" placeholder="Mật khẩu" required>
                        @if($errors->has('password'))
                            <p class="help-block">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                </div>

                <div class="form-group text-right">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-block w-md" type="submit">Đăng nhập</button>
                    </div>
                </div>
                <div class="form-group m-t-30">
                    <div class="col-xs-12">
                        <a href="{{ route('password.request') }}"><i class="fa fa-lock m-r-5"></i> Quên mật khẩu?</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@push('footer')
    @include('admin.partials.scripts')
@endpush
