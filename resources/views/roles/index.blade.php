@extends('layouts.app')

@section('content')

    @push('blockquote')
        @role('SuperAdmin')
        Rol <code class="language-php">Administrator</code> acceso total

        @else
            Rol <code class="language-php"></code> de acceso limitado
        @endcan

    @endpush

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h4 class="card-title">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title">Administrador de roles del sistema</h4>
                            </div>

                            <div class="col-4">
                                @can('products.create')
                                    <p class="text-right">
                                        <a href="{{ route('roles.create') }}" class="btn btn-success btn-block">
                                            Crear nuevo rol
                                        </a>
                                    </p>
                                @endcan
                            </div>
                        </div>
                    </h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" style="width: 100%">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Rol</th>
                    @if(auth()->user()->can('roles.show') ||auth()->user()->can('roles.edit') || auth()->user()->can('roles.destroy') )
                        <th colspan="4">Opciones</th>
                    @endif
                </tr>
                </thead>

                @foreach($roles as $rol)
                    <tbody>
                    <tr>
                        <td>{{ $rol->id }}</td>
                        <td>{{ $rol->name }}</td>
                        @can('roles.edit')
                            <td width="10px">
                                <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-warning">
                                    Editar
                                </a>
                            </td>
                        @endcan


                        @can('roles.show')
                            <td width="10px">
                                <a href="{{ route('roles.show', $rol->id) }}" class="btn btn-info">
                                    Ver
                                </a>
                            </td>
                        @endcan


                        @can('roles.destroy')
                            <td width="10px">
                                <form action="{{ route('roles.destroy', $rol->id) }}" method="POST">
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
            {{ $roles->links() }}
        </div>
    </div>


@stop

