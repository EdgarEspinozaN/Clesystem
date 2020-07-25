{{-- vista para cambiar de contraseña --}}
{{-- extiende de la plantilla login --}}
@extends("layouts.loginLayout")
{{-- contenido --}}
@section('login-content')
<form method="POST" action="{{ route('update.password') }}">
	@csrf
	<input type="hidden" name="token" value="{{ $token }}">
	<input type="hidden" name="email" value="{{ $email }}">


	<div class="tituo mt-3"><h2>Cambio de Contraseña</h2></div>
	
	<div class="form-group row mt-2">
		<label for="username">Nombre de usuario</label>
		<input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $username ?? old('username') }}">
		@error('username')
		<div class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</div>
		@enderror
	</div>

	<div class="form-group row mt-2">
			<label for="password">{{ __('Contraseña') }}</label>
			<div class="input-group">
				<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" value="{{ old('password') }}">
				<div class="input-group-prepend">
					<a class="btn btn-primary" onclick="verPass('password', 'password-confirm')"><i class="far fa-eye"></i></a>
				</div>
				@error('password')
				<div class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</div>
				@enderror
			</div>
	</div>

	<div class="form-group row mt-2">
		<label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>
		<input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
	</div>

	<div class="form-group row mb-0 mt-4 justify-content-center">
		<div class="">
			<button type="submit" class="btn btn-primary">
				{{ __('Guardar') }}
			</button>
		</div>
	</div>
</form>
@endsection