<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Permission @yield('title')</title>
    @include('partials._stylesheets')





        @include('components.navbar')

</head>
<body>

<div class="container-fluid" id="app">

    <div class="container-fluid content-wrap">
        @include('components.blockquote')
        @if(session('info'))
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success">
                            {{session('info')}}
                        </div>
                    </div>
                </div>
            </div>
        @endif()
        @yield('content')

    </div>

</div>
<div class="row justify-content-center footer">
    @include('components.footer')
</div>

</body>

@include('partials._scripts')

@stack('script')
</html>

