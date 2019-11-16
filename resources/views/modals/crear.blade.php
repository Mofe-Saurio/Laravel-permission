<!-- The Modal -->
<div class="modal fade" id="crear">
    <div class="modal-dialog modal-dialog-centered">
        <form id="userForm">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Crear usuario para el sistema</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="rol">Rol</label>
                                <select autofocus class="form-control" name="rol" id="rol">
                                    <option value="Administrator">Administrator</option>
                                    <option value="Soporte">Soporte</option>
                                    <option value="Usuario">Usuario</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{--Row si existen errores--}}
                    <div class="row exist-errors">
                        <div class="col">
                            <span id="exist-errors"></span>
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" >Crear</button>
                </div>
            </div>
        </form>
    </div>
</div>
