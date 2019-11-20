<div class="form-group">
    {{Form::label('name','Nombre ')}}
    {{Form::text('name',null,['class'=>'form-control'])}}
</div>

<hr>
<h3>Lista de permisos</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach($permissions as $permission)

                <span>
                    {{Form::checkbox('permissions[]', $permission->id,null)}}
                    {{$permission->name}}

                </span>

        @endforeach
    </ul>
</div>

<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-block btn-success'])}}

</div>


