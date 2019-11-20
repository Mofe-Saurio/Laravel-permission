@extends('layouts.app')

@section('content')
    @push('blockquote')
        @role('SuperAdmin')
        Rol <code class="language-php">Administrator</code> acceso total

        @else
            Rol <code class="language-php"></code> acceso limitado
        @endhasrole

    @endpush

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h4 class="card-title">Administrador de usuarios del sistema</h4>
                </div>

                <div class="col-4">
                    @can('products.create')
                        <p class="text-right">
                            <a href="{{ route('users.create') }}" class="btn btn-success btn-block">
                                Crear usuario
                            </a>
                        </p>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md">
                <thead class="thead-dark" >
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Status</th>
                    <th colspan="4">Opciones</th>



                </tr>
                </thead>

                @foreach($users as $user)
                    @foreach($user->roles as $role)
                    <tbody>
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $role->name ?: 'N/A'}}</td>
                            @if($user->is_online)
                            <td><span style="cursor: auto" class="btn btn-success online">Online</span></td>
                            @else
                            <td><span style="cursor: auto" class="btn btn-danger offline">Offline</span></td>
                            @endif


                        @can('users.edit')
                            <td width="10px">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                                    Editar
                                </a>
                            </td>
                        @endcan

                        @can('users.show')
                            <td width="10px">
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">
                                    Ver
                                </a>
                            </td>
                        @endcan

                        @can('users.destroy')
                            <td width="10px">
                                {!! Form::open(['route'=>['users.destroy',$user->id],'method'=>'DELETE']) !!}
                                    <button class="btn btn-danger">Eliminar</button>
                                {!! Form::close() !!}
                            </td>
                        @endcan

                    </tr>
                    </tbody>
                    @endforeach
                @endforeach
            </table>

        </div>
    </div>


@stop

