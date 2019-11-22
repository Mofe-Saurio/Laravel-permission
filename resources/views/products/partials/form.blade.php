<div class="form-group">
    <h5>{{Form::label('name','Nombre del producto')}}</h5>
    {{Form::text('name',null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('description','Descripcion del producto')}}
    {{Form::text('description',null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-block btn-success'])}}

</div>


