<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
		<meta charset="utf-8">
	<link href="{{asset("css/bootstrap.css")}}" rel="stylesheet">
	<link href="{{asset("css/modulos.css")}}" rel="stylesheet">	

</head>
<body>

	
	@yield('content')

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	{!!Html::script('js/tether.min.js')!!}
	<script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>


