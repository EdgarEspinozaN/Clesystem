{{-- vista para enviar email para recuperacion de contraseña --}}
{{-- extiende de la plantilla login --}}
@extends("layouts.loginLayout")
{{-- contenido --}}
@section("login-content")
	<form action="{{ route('forgot.password') }}" method="post" novalidate>
		{{ csrf_field() }}

		<h2>¿Olvidaste tu contraseña?</h2>
		<p>Introduce tu correo y enviaremos las intrucciones para reestablecer tu contraseña</p>
		<div class="form-group row mt-5">
			<input class="form-control @error('e_mail') is-invalid @enderror" type="email" id="e_mail" name="e_mail" placeholder="E-Mail" value="{{ old('e_mail') }}" required="">
			<div class="invalid-feedback">
				@error('e_mail')
					{{$message}}
				@enderror
			</div>
		</div>
		<div class="form-group mt-5">
			<button type="submit" class="btn btn-primary btn-lg ">Enviar Correo de recuperación</button>
		</div>
		<div class="form-group mt-4 d-flex justify-content-center">
			<small class="col-10">¡Aviso! Es posible que deba verificar su carpeta de correo no deseado o desbloquear ITSRV-CLE@gmail.com</small>
		</div>
	</form>
@endsection