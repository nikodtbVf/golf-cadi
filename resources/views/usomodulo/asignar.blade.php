@extends('layouts.principal')

@section('content')
	
	@if(Session::has('message'))
		<div class="alert alert-danger alert-dismissible" role="alert">
		     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		     <strong>Notificacion:</strong> {{Session::get('message')}}
		</div>
	@endif
	{!!Form::open(['route'=>'uso.store','method'=>'POST'])!!}
	<center>
		<div class="col-time">
			<div class="col-time">
				<label><h1>Seleccion:</h1> </label>
				<label class="disponible"><h1>
					{{$modulo->nombre}}
				</h1></label>
			</div>	
		</div>
		<div style="display:none;">
				{!!Form::number('numero',$modulo->numero,['class' =>'form-control','placeholder'=>'Ingresa la cantidad de tiempo para el módulo'])!!}
			</div>

		<div class="col-min">
			<div class="col-time">
				<h1>{!!Form::label('Tiempo:')!!}</h1>
				{!!Form::number('minutos',null,['class' =>'form-control','placeholder'=>'tiempo en minutos'])!!}
			</div>
		</div>
		<br>
		
		<div class="col-min">
			<h1>{!!Form::label('Nombre Cliente:')!!}</h1>
			{!!Form::text('nombre_cliente',null,['class' =>'form-control','placeholder'=>'Ingresa el nombre del cliente'])!!}
		</div>
		<br>
		<div class="col-min">
			<h1>{!!Form::label('Contraseña:')!!}</h1>
			{!!Form::password('password',['class' =>'form-control','placeholder'=>'Ingresa la contraseña del cadi'])!!}
		</div>
		<br>
      <div class="col-time">
		 	<div class="col-time">
		 		{!!Form::submit('Agregar',['class'=>'btn btn-primary','onclick'=>"return confirm('Estás seguro de que deseas asignarle tiempo a este módulo?')"])!!}
		 	</div>
		</div>
	</center>
	{!!Form::close()!!}
@stop