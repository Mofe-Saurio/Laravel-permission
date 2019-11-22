@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header ">
            <div class="row">
                <div class="col">
                    <h4 class="card-title">Administrador de productos del sistema</h4>
                </div>

                <div class="col-4">
                    @can('products.create')
                        <p class="text-right">
                            <a href="{{ route('products.create') }}" class="btn btn-success btn-block">
                                Crear producto
                            </a>
                        </p>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" style="width: 100%">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Sentence</th>
                    @if(auth()->user()->can('products.show') ||auth()->user()->can('products.edit') || auth()->user()->can('products.destroy') )
                        <th colspan="4">Opciones</th>
                    @endif
                </tr>
                </thead>

                @foreach($products as $product)
                    <tbody>
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>

                        @can('products.edit')
                            <td width="10px">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                                    Editar
                                </a>
                            </td>
                        @endcan

                        @can('products.show')
                            <td width="10px">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">
                                    Ver
                                </a>
                            </td>
                        @endcan

                        @can('products.destroy')
                            <td width="10px">
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        @endcan

                    </tr>
                    </tbody>
                @endforeach

            </table>

        </div>
        <div class="card-footer ">
            {{ $products->links() }}
        </div>
    </div>


@stop

