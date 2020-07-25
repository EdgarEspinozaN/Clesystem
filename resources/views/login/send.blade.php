{{-- vista aviso de correo enviado --}}
{{-- extiende de la plantilla login --}}
@extends("layouts.loginLayout")
{{-- contenido --}}
@section("login-content")
	<form>
		<div class="title mt-3"><font size="6">Correo Enviado</font></div>
		<div class="mensaje mt-3"><font size="4">Revisa tu dirección de correo electronico, se han enviado las instrucciones para realizar el cambio de contraseña</font></div>
		<div class="end mt-3"><font size="3">Si no recibiste el correo puedes intentar nuevamente</font></div>
		<div class="boton mt-3 mb-3"><a class="btn btn-primary" href="{{ route('forgot.password')}}" style="text-decoration: none;"><font size="3">Reintentar</font></a></div>
	</form>
@endsection