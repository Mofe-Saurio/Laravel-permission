@extends('layouts.app')

<style>
    .form-group{
        text-align: center;
    }
</style>
@section('content')

    <div class="card">
        <div class="card-header ">
            <h3 class="card-title">Laravel DataTable + Permission roles</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered responsive" id="laravel_datatable" style="width: 100%">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Opciones</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Edit modal -->

    <!-- The Modal -->
    <div class="modal" id="editar">
        <div class="modal-dialog modal-dialog-centered">
            <form>
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Administrar rol</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input readonly type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input readonly type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="rol">Rol</label>
                                    <select autofocus class="form-control" name="rol" id="rol">

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" >Cambiar rol</button>
                    </div>

                </div>
            </form>
        </div>
    </div>



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
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false}
                ]
            });


        });

        $(document).on('click', '.edit-modal-button', function() {
            $('#name').val($(this).data('nombre'));
            $('#email').val($(this).data('email'));
        });

    </script>




@endpush
