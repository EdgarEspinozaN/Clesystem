{{-- vista de token expirado --}}
{{-- extiende de la plantilla login --}}
@extends("layouts.loginLayout")
{{-- contenido  --}}
@section("login-content")
	<form>
		<div class="mt-3" style="font-size: 40px;">Lo Sentimos</div>
		<div class="mt-3" style="font-size: 20px;">Este Enlace ya ha expirado, porfavor envia una nueva petición.</div>
		<div>
			<a href="{{ route('forgot.password') }}" class="btn btn-primary mt-3">Intentar</a>
		</div>
	</form>
@endsection