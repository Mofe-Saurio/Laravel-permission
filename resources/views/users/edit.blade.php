@extends('layouts.app')

@section('content')
    @push('blockquote')
        @role('SuperAdmin')
        Rol <code class="language-php">Administrator</code> acceso total

        @else
            Rol <code class="language-php"></code> acceso limitado
            @endhasrole

            @endpush
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2>Editar usuario</h2>
                            </div>
                            <div class="col">
                                <a class="btn btn-info btn-block" href="{{route('users.index')}}">Volver</a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::model($user, ['route'=>['users.update', $user->id], 'method' => 'PUT']) !!}
                            @include('users.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
