<div class="form-group">
    <h5>{{Form::label('name','Nombre del rol ')}}</h5>
    {{Form::text('name',null,['class'=>'form-control nameinput'])}}
</div>

<hr>
{{--<div class="card-header">--}}
{{--    <h3>Permisos para el modulo usuarios</h3>--}}
{{--</div>--}}
<div class="row">
    @for($i=0; $i<=2; $i++)
        <div class="col">
            @if($i ==0)
                <div class="card-header">
                    <h3>Permisos para el modulo usuarios</h3>
                </div>
            @elseif($i==1)
                <div class="card-header">
                    <h3>Permisos para el modulo productos</h3>
                </div>

            @else
                <div class="card-header">
                    <h3>Permisos para el modulo roles</h3>
                </div>

            @endif

                <div class="form-group">

                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>Permisos</th>
                            <th>Descripciones</th>
                            <th width="10px">Estados</th>
                        </tr>
                        </thead>
                        @foreach($permissions[$i] as $users)
                            <tbody>
                            <tr>
                                <td>{{$users->name}}</td>
                                <td>{{$users->description}}</td>
                                <td>
                                    {{Form::checkbox('permissions[]', $users->id,null,array('class' => 'form-control checkboxes'))}}
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>

                </div>

        </div>


    @endfor
</div>


<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-block btn-success'])}}
</div>



