{{-- vista para editar datos del administrador --}}
{{-- extender de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	{{-- titulo del formulario --}}
	@section('titulo-form', 'Perfil de Admin')
	
	@php
		$admin = App\Admin::find(2);
	@endphp
	{{-- accion del formulario --}}
	@section('action-form')
		 action="/admin/{{$admin->id}}"
	@endsection
	
	{{-- contenido del formulario --}}
	@section('contenido-form')
		{{ method_field('patch') }}
		<div class="row">
			<div class="col-4">
				<label for="nombre">Nombre</label>
				<input class="form-control mb-3" type="text" id="nombre" name="nombre" value="{{$admin->persona->nombre}}" required="">
			</div>
			<div class="col-4">
				<label for="apePat">Apellido Paterno</label>
				<input class="form-control mb-3" type="text" id="ApePat" name="apePat" value="{{$admin->persona->ape_pat}}" required="">
			</div>
			<div class="col-4">
				<label for="apeMat">Apellido Materno</label>
				<input class="form-control mb-3" type="text" id="apeMat" name="apeMat" value="{{$admin->persona->ape_mat}}" required="">
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<label for="tel">Teléfono</label>
				<input class="form-control mb-3" type="number" id="tel" name="tel" value="{{$admin->persona->telefono}}" required="">
			</div>
			<div class="col-8">
				<label for="correo">Correo</label>
				<input class="form-control mb-3" type="text" id="coreeo" name="correo" value="{{$admin->persona->correo}}" required="">
			</div>
		</div>
		<div class="row">
			<div class="col-4 mb-3">
				<label for="username">Nombre de usuario</label>
				<input class="form-control mb-3" type="text" id="username" name="username" value="{{$admin->usuario->username}}" required="">
			</div>
			<div class="col-2">
				<label for="pass">Contraseña</label>
				<button type="button" class="btn btn-info mb-3" id="pass" name="pass" data-toggle="modal" data-target="#ModalAdminPass">Cambiar</button>
			</div>
		</div>
		
		<div class="row justify-content-end">
			<button class="btn btn-primary col-3 mb-3" type="submit">Guardar</button>
		</div>

	@endsection
	
	{{-- importacion del formulario --}}
	@include("Tablas.Formulario1")

@endsection

{{-- importacion de modales --}}
@section("Admin-Modals")
	@include("admin.PassForm")
@endsection
{{-- scipts para fallos al enviar el formulario --}}
@section('ScriptOpenCreate')
	<script>$('#ModalAdminPass').modal('show');</script>
@endsection