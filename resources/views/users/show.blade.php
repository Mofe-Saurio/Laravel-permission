@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2>Datos del usuario</h2>
                            </div>
                            <div class="col">
                                <a class="btn btn-info btn-block" href="{{route('users.index')}}">Volver</a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <p><strong>Nombre: </strong>{{$user->name}}</p>
                        <p><strong>Email: </strong> {{$user->email}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
