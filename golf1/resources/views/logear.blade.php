@extends('layouts.login')

@section('content')

	@if(Session::has('message'))
		@include('alerts.alert')
	@endif
	{!!Form::open(['route'=>'login.store','method'=>'POST'])!!}
		<!--<center class="centrado">-->
	<div class = 'container'>
		<div class='row'>
			<div class ="col-sm-12" >
				<strong>
					<h1>{!!Form::label('Correo Electrónico')!!}</h1>
				</strong>	
			</div>
		</div>
		<div class='row'>
			<div class="col-sm-12">
				{!!Form::email('email',null,['class' =>'form-control','placeholder'=>'Ingresa tu correo electronico'])!!}
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<strong>
					<h1>{!!Form::label('contrasena','Contraseña')!!}</h1>
				</strong>	
			</div>
		</div>
		<div class='row'>
			<div class="col-sm-12">
				{!!Form::password('password',['class' =>'form-control','placeholder'=>'Ingresa tu contraseña'])!!}
			</div>
		</div>
		<br>
		<div class='row'>
			<div class="col-sm-12 form-group">
				{!!Form::submit('Iniciar Sesión',['class'=>'btn btn-primary'])!!}
			</div>
		</div>
		
	</div>
		
	
	{!!Form::close()!!}
@stop
