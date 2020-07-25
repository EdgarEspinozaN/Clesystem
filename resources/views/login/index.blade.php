{{-- vista login --}}
{{-- extiende de la plantilla login --}}
@extends("layouts.loginLayout")
{{-- contenido --}}
@section("login-content")
	<form action="{{ url('/login') }}" method="post" novalidate>
		{{ csrf_field() }}
		<h2 class="text-center">Login</h2>   
		<div class="form-group mt-5">
			<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}">

		</div>
		<div class="form-group mt-3">
			<div class="input-group">
				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				<div class="input-group-prepend">
					<a class="btn" onclick="verPass('password')"><i class="far fa-eye"></i></a>
				</div>
			</div>
			@error('password')
			<div class="" style="color: #EB0404;">
				{{$message}}
			</div>
			@enderror
			@error('username')
			<div class="" style="color: #EB0404;">
				{{$message}}
			</div>
			@enderror
		</div>        

		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-lg col-8 mt-4">Sign in</button>
		</div>
		<p><a href="{{ route('forgot.password') }}">Olvidaste tu contraseña?</a></p>
	</form> 
@endsection