
<div class="row">
    <div class="col">
        <div class="form-group">
            <h5>{{Form::label('name','Nombre ')}}</h5>
            {{Form::text('name',null,array('required' => 'required','class'=>'form-control'))}}
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <h5>{{Form::label('email','E-mail ')}}</h5>
            {{Form::text('email',null,array('required' => 'required','class'=>'form-control'))}}
        </div>
    </div>



</div>

<div class="row">

    <div class="col" align="center">

        <div class="form-group">
            <ul class="list-unstyled">
                <div class="card-header">
                    <h3>Asignar rol</h3>
                </div>
                <hr>
                <div class="row">
                    @foreach($roles as $role)
                        <div class="col">
                            <label>
                                {{Form::checkbox("roles[]",$role->id,null,array('class'=>'form-control'))}}
                                {{$role->name}}
                            </label>
                        </div>
                    @endforeach
                </div>
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

