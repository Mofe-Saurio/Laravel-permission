<!-- The Modal -->
<div class="modal fade" id="editar">
    <div class="modal-dialog modal-dialog-centered">
        <form id="rolForm">
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
                                <input type="hidden" class="form-control" id="id" name="id">
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
                                    <option value="Administrator">Administrator</option>
                                    <option value="Soporte">Soporte</option>
                                    <option value="Usuario">Usuario</option>
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
