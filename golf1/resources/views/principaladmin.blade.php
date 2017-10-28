@extends('layouts.principal')
@section('content')
	<center>
		<h1>Bienvenido {!!Auth::user()->name!!}</h1>
	</center>
@stop