<div class="row">
    <div class="col">
        <div class="form-group">
            {{Form::label('name','Nombre ')}}
            {{Form::text('name',null,['class'=>'form-control'])}}
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {{Form::label('email','E-mail ')}}
            {{Form::text('email',null,['class'=>'form-control'])}}
        </div>
    </div>



</div>

<div class="row">

    <div class="col" align="center">

        <div class="form-group">
            <ul class="list-unstyled">
                <h3>Lista de roles</h3>
                @foreach($roles as $role)
                    {{Form::checkbox('roles[]', $role->id,null)}}
                    {{$role->name}}
                @endforeach
            </ul>

            {{--            <select id="roles" required name="roles" class="form-control">--}}
            {{--                <option selected value="">Seleccione un rol</option>--}}
            {{--                @foreach($roles as $role)--}}
            {{--                    <option value="{{$role->id}}">{{$role->name}}</option>--}}
            {{--                @endforeach--}}
            {{--            </select>--}}
        </div>
    </div>
</div>

<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-block btn-success'])}}

</div>


