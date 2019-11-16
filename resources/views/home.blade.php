@extends('layouts.app')

@section('content')
    @push('style')
        <style>
            blockquote{
                margin-left: 10% !important;
            }
        </style>
    @endpush
    @push('blockquote')
        @can('crud')
            Rol <code class="language-php">Administrator</code> acceso total

        @elsecan('read')
            Rol <code class="language-php">Soporte</code> acceso lectura
        @endcan

    @endpush
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h4 class="card-title">Administrador de usuarios del sistema</h4>
                </div>
                <div class="col">
                    @can('crud')
                    <button data-toggle="modal" data-target="#crear" class="btn btn-success float-right">Anadir usuario al sistema</button>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered responsive" id="laravel_datatable" style="width: 100%">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Created at</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Created at</th>
                    <th>Opciones</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>


    <!-- Edit modal -->
    @include('modals/edit')
    <!-- Crear modal -->
    @include('modals/crear')

@stop


@push('script')

    <script>
        $(document).ready( function () {
            $.fn.dataTable.ext.errMode = 'throw'; // Para mostrar errores en la consola
            $('#laravel_datatable').DataTable({ //Inicializamos el datatable
                processing: true,
                serverSide: true,
                "scrollX": true,

                ajax: "{{ url('users-list') }}", //Ruta de la peticion de la data
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json" //Aqui se podria cargar localmente
                },
                columns: [ //Columnas que deben ir acorde a las columnas existentes en la BD y dentro del Thead
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'roles[0].name', name: 'roles' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false}
                ]
            });
        });

        /*Inicializamos el token para las peticiones POST*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /*Al dar submit del modal editar o guardar*/
        $('#userForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#userForm').serialize(),
                url: "{{ route('users-create') }}",
                type: "POST",

                success: function (data) {
                    var html = '';
                    if(data.errors){
                        html = '<div class="alert alert-danger">';
                        for(var count = 0; count < data.errors.length; count++)
                        {
                            html += '<li>' + data.errors[count] + '</li>';
                        }
                        html += '</div>';
                        $(".exist-errors").css("display", "block");
                        $('#exist-errors').html(html);
                        console.log(data.errors)
                    }else{
                        $('#userForm').trigger("reset");
                        $('#crear').modal('hide');
                        $('#laravel_datatable').DataTable().ajax.reload(); //Actualizar la tabla
                        toastr.info('Usuario creado exitosamente!')
                    }
                },

                error: function (data) {
                    console.log('Error:', data);

                }
            });



        });


        $(document).on('click', '.edit-modal-button', function() {
            $('#name').val($(this).data('nombre'));
            $('#email').val($(this).data('email'));
            $('#rol').val($(this).data('rol'));

        });



    </script>




@endpush
