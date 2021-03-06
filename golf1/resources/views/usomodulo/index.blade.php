@extends('layouts.principal')

@section('content')
	@if(Session::has('message'))
		<div class="alert alert-success alert-dismissible" role="alert">
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			 <strong>Notificacion:</strong> {{Session::get('message')}}
		</div>
	@endif
		
	@for ($i = 0; $i < ceil(count($modules)/3); $i++) 
		<?php
			$j = $i*3
		?>
		
		<div class="col-sm-12 elementsdiv">
		@if($j < count($modules))		
			<div class="col-sm-4 divborder separar">			
					<center>
						<label class="titulo-modulo">
							<h3>{{$modules[$j]->nombre}}</h3>
						</label>			
						<img class="img-responsive img-rounded center-block " src="{{URL::asset('image/golf.png')}}" width="100" height="100"> 
						<br>
						<label> CADI: {{$modules[$j]->nombre_cadi }}</label>
						<label> Cliente: {{$modules[$j]->nombre_cliente }}</label>
							@if($modules[$j]->status == 0)
								<label class="disponible">
									Disponible
								</label>
								<!--<br>		
								<label class="color-hora">
									N.A
								</label>
								<br>
								<label class="color-hora">
									N.A
								</label>-->
							@else
								<label class="ocupado">
									Ocupado
								</label>
								<br>
								<label class="color-hora">
									
									Hora Inicio: {{$modules[$j]->init_time}}
								</label>
								<br>
								<label class="color-hora">
									 Tiempo Restante: {{$modules[$j]->string_fecha}}
								</label>						
							@endif			
						
						<br>
						<div class="botones">
							<a type="button" class="btn btn-primary btn-xs button" href="{{url('/asignar')}}/{{$modules[$j]->id}}" data-toggle="tooltip" data-placement="top" title="Asignar Tiempo"
							@if($modules[$j]->status == 0)
								enabled
							@else
								disabled
							@endif
							><span aria-hidden="true"></span> Asignar</a>
						</div>
						<div class="botones">
							<a type="button" class="btn btn-danger btn-xs button" href="{{url('/cancelar')}}/{{$modules[$j]->id}}" data-toggle="tooltip" data-placement="top" title="Cancelar Tiempo"
							@if($modules[$j]->status == 0)
								disabled
							@else
								enabled
							@endif
							><span class="" aria-hidden="true"
							
							></span> Cancelar</a>
						</div>	
						<!--<div class="botones">
							<a type="button" class="btn btn-success btn-xs" href="{{url('/terminar')}}/{{$modules[$j]->id}}" data-toggle="tooltip" data-placement="top" title="Cancelar Tiempo"
							@if($modules[$j]->status == 0)
								disabled
							@else
								enabled
							@endif
							><span class="glyphicon glyphicon-edit" aria-hidden="true"
							></span> Terminar Uso</a>
						</div>-->		
					</center>
				
			</div>
			@endif 
			@if($j+1 < count($modules))
			<div class="col-sm-4 divborder separar">		
					<center>
						<label class="titulo-modulo">
							<h3>{{$modules[$j+1]->nombre}}</h3>
						</label>		
						<img class="img-responsive img-rounded center-block " src="{{URL::asset('image/golf.png')}}" width="100" height="100"> 
						<br>
						<label> CADI: {{$modules[$j+1]->nombre_cadi }}</label>
						<label> Cliente: {{$modules[$j+1]->nombre_cliente }}</label>
						@if($modules[$j+1]->status == 0)
								<label class="disponible">
									Disponible
								</label>
								<br>
								<!--<label class="color-hora">
									N.A
								</label>	
								<br>	
								<label class="color-hora">
									N.A
								</label>-->
								
							@else
								<label class="ocupado">
									Ocupado
								</label>
								<br>
								<label class="color-hora">
									Hora Inicio: {{$modules[$j+1]->init_time}}
								</label>
								<br>
								<label class="color-hora">
									Tiempo Restante: {{$modules[$j+1]->string_fecha}}
								</label>
							@endif
				
						<div class="botones">
							<a type="button" class="btn btn-primary btn-xs button" href="{{url('/asignar')}}/{{$modules[$j+1]->id}}" data-toggle="tooltip" data-placement="top" title="Asignar Tiempo"
							@if($modules[$j+1]->status == 0)
								enabled
							@else
								disabled
							@endif
							><span class="" aria-hidden="true"></span> Asignar</a>		
						</div>
						<div class="botones">
							<a type="button" class="btn btn-danger btn-xs button" href="{{url('/cancelar')}}/{{$modules[$j+1]->id}}" data-toggle="tooltip" data-placement="top" title="Cancelar Tiempo"
							@if($modules[$j+1]->status == 0)
								disabled
							@else
								enabled
							@endif
							><span class="" aria-hidden="true"></span> Cancelar</a>
						</div>	
						<!--<div class="botones">
							<a type="button" class="btn btn-success btn-xs" href="{{url('/terminar')}}/{{$modules[$j+1]->id}}" data-toggle="tooltip" data-placement="top" title="Cancelar Tiempo"
							@if($modules[$j+1]->status == 0)
								disabled
							@else
								enabled
							@endif
							><span class="glyphicon glyphicon-edit" aria-hidden="true"
							></span> Terminar Uso</a>
						</div>	-->
					</center>			
			</div>
			@endif 
			@if($j+2 < count($modules))
			<div class="col-sm-4 divborder separar">		
					<center>
						<label class="titulo-modulo">
							<h3>{{$modules[$j+2]->nombre}}</h3>
						</label>
						<img class="img-responsive img-rounded center-block " src="{{URL::asset('image/golf.png')}}" width="100" height="100"> 
						<br>
						<label> CADI: {{$modules[$j+2]->nombre_cadi }}</label>	
						<label> Cliente: {{$modules[$j+2]->nombre_cliente }}</label>
						@if($modules[$j+2]->status == 0)
							<label class="disponible">
								Disponible
							</label>
							<br>
						<!--	<label class="color-hora">
								N.A
							</label>
							<br>
							<label class="color-hora">
								N.A
							</label>-->
						@else
							<label class="ocupado">
								Ocupado
							</label>
							<br>
							<label class="color-hora">
								Hora Inicio: {{$modules[$j+2]->init_time}}
							</label>
							<br>
							<label class="color-hora">
								Tiempo Restante: {{$modules[$j+2]->string_fecha}}
							</label>
						@endif
						<div class="botones">
							<a type="button" class="btn btn-primary btn-xs button" href="{{url('/asignar')}}/{{$modules[$j+2]->id}}" data-toggle="tooltip" data-placement="top" title="Asignar Tiempo"
							@if($modules[$j+2]->status == 0)
								enabled
							@else
								disabled
							@endif
							><span class="t" aria-hidden="true"></span> Asignar</a>
						</div>
						<div class="botones">
							<a type="button" class="btn btn-danger btn-xs button" href="{{url('/cancelar')}}/{{$modules[$j+2]->id}}" data-toggle="tooltip" data-placement="top" title="Cancelar Tiempo"
							@if($modules[$j+2]->status == 0)
								disabled
							@else
								enabled
							@endif><span class="" aria-hidden="true"></span> Cancelar</a>
						</div>
						<!--<div class="botones">
							<a type="button" class="btn btn-success btn-xs" href="{{url('/terminar')}}/{{$modules[$j+2]->id}}" data-toggle="tooltip" data-placement="top" title="Cancelar Tiempo"
							@if($modules[$j+2]->status == 0)
								disabled
							@else
								enabled
							@endif
							><span class="glyphicon glyphicon-edit" aria-hidden="true"
							></span> Terminar Uso</a>
						</div>		-->	
					</center>
				
			</div>	
			@endif  
		</div>

	@endfor
@stop