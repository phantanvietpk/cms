@extends('layouts.master')

@push('header')
    @include('admin.partials.styles')
@endpush

@section('body')
    @include('admin.partials.navigation')

    <section class="content">
        @include('admin.partials.header')

        <div class="wraper container-fluid">

            <div class="heading">
                @hasSection('back')
                <a href="@yield('back')" class="page-back">
                    <i class="fa fa-arrow-circle-left"></i>
                </a>
                @endif
                <h2 class="page-title">@yield('title')</h2>
                @stack('heading')
            </div>

            @include('flash::message')

            @yield('content')
        </div>

        @include('admin.partials.footer')
    </section>
@endsection

@push('footer')
    @include('admin.partials.scripts')
@endpush