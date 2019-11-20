@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title">Crear usuario para el sistema</h4>
                            </div>

                            <div class="col-4">
                                @can('products.create')
                                    <p class="text-right">
                                        <a href="{{ route('users.index') }}" class="btn btn-info btn-block">
                                            Volver
                                        </a>
                                    </p>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route'=> 'users.store']) !!}
                        @include('users.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

