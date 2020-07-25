@extends("layouts/admin")

@section('ContenidoAdmin')
	@section('titulo-form', 'Perfil de Admin')
	
	@php
		$admin = App\Admin::find(2);
	@endphp

	@section('action-form')
		 {{-- action="/admin/{{$admin->id}}" --}}
	@endsection

	@section('contenido-form')
		{{-- {{ method_field('patch') }} --}}
		<div class="row">
			<div class="col-4">
				<label for="password">Contraseña</label>
				<input class="form-control mb-3" type="text" id="password" name="password" value="" required="">
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<label for="pass-confirm">Confirmar Contraseña</label>
				<input class="form-control mb-3" type="number" id="pass-confirm" name="pass-confirm" value="" required="">
			</div>
		</div>
		
		<div class="row justify-content-end">
			<button class="btn btn-primary col-3 mb-3" type="submit">Guardar</button>
		</div>

	@endsection

	@include("Tablas.Formulario1")

@endsection