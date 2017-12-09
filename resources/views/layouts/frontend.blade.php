@extends('layouts.master')

@push('header')
    @include('partial.styles')
@endpush

@section('body')
    <div id="wrapper" class="clearfix">
    @include('partial.header')
    @yield('content')
    @include('partial.footer')
    </div>
    <div id="gotoTop" class="icon-angle-up"></div>
    @include('partial.scripts')
@endsection

@push('footer')
    
@endpush