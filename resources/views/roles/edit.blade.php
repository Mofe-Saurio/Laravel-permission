@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2>Editar rol</h2>
                            </div>
                            <div class="col">
                                <a class="btn btn-info btn-block" href="{{route('roles.index')}}">Volver</a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::model($role, ['route'=>['roles.update', $role->id], 'method' => 'PUT']) !!}
                        @include('roles.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
