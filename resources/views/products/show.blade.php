@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title">Productos</h4>
                            </div>

                            <div class="col-4">
                                @can('products.create')
                                    <p class="text-right">
                                        <a href="{{ route('products.index') }}" class="btn btn-info btn-block">
                                            Volver
                                        </a>
                                    </p>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p><strong>Nombre: </strong>{{$product->name}}</p>
                        <p><strong>Descripcion: </strong> {{$product->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
