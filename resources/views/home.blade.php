@extends('layouts.app')

@section('content')
    @push('blockquote')
        @role('SuperAdmin')
            Rol <code class="language-php">Administrator</code> acceso total

        @else
            Rol <code class="language-php"></code> de acceso limitado
        @endcan

    @endpush

    <div class="container-fluid" align="center">
{{--        <img width="50%" src="{{ asset('img/cat.jpg')}}">--}}
        <img width="30%" src="{{ asset('img/toys.png')}}">
{{--        <img width="50%" src="{{ asset('img/lake.svg')}}">--}}

    </div>

@stop

