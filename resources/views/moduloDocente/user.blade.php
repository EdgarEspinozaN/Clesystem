{{-- vista con los datos del docente --}}
{{-- extiende de la plantilla docente --}}
@extends("layouts.docente")
{{-- contenido --}}
@section("Docente-Main")
	{{-- titulo del formulario --}}
	@section("titulo-form", "Perfil")
	{{-- accion del formulario --}}
	@section("action-form")
		action="{{route('docente.update.profile')}}"
	@endsection
	{{-- contenido del formulario --}}
	@section("contenido-form")
		{{method_field('patch')}}
		<div class="justify-content-center">
			<div class="row mb-3">
				<div class="col-md-6 col-sm-6 col-lg-4 col-12 mb-3">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" autocomplete="off" required="" value="{{$usuario->docente->persona->nombre}}">
				</div>
				<div class="col-md-6 col-sm-6 col-lg-4 col-12 mb-3">
					<label for="ape_pat">Apellido Paterno</label>
					<input type="text" class="form-control" id="ape_pat" name="ape_pat" placeholder="Appellido Paterno" autocomplete="off" required="" value="{{$usuario->docente->persona->ape_pat}}">
				</div>
				<div class="col-md-6 col-sm-6 col-lg-4 col-12 mb-3">
					<label for="ape_mat">Apellido Materno</label>
					<input type="text" class="form-control" id="ape_mat" name="ape_mat" placeholder="Apellido Materno" autocomplete="off" required="" value="{{$usuario->docente->persona->ape_mat}}">
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-6 col-sm-6 col-lg-4 col-12 mb-3">
					<label for="correo">Correo</label>
					<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo Electronico" autocomplete="off" required="" value="{{$usuario->docente->persona->correo}}">
				</div>
				<div class="col-md-6 col-sm-6 col-lg-4 col-12 mb-3">
					<label for="tel">Teléfono</label>
					<input type="number" class="form-control" id="tel" name="tel" placeholder="Teléfono" autocomplete="off" required="" value="{{$usuario->docente->persona->telefono}}">
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-6 col-sm-6 col-lg-4 col-12 mb-3">
					<label for="username">Nombre se usuario</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Nombre se usuario" autocomplete="off" required="" value="{{$usuario->username}}">
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-12 mb-3 d-flex justify-content-center">
					<a href="" data-toggle="modal" data-target="#ModalUpdatePass" class="cambio-pass">¿Cambiar Contraseña?</a>
				</div>
			</div>
			<div class="row mb-3 ">
				<div class="col-12 mb-3 d-flex justify-content-center">
					<button class="btn btn-primary mb-3 btn-save">Guardar</button>
				</div>
			</div>
		</div>
	@endsection
	{{-- importacion del formulario --}}
	@include("Tablas.Formulario1")

@endsection
{{-- modales --}}
@section("Docente-Modal")
	{{-- modal para editar datos del usuario --}}
	<div class="modal fade" id="ModalUpdatePass" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalUpdatePassLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="mb-5 d-flex justify-content-center">
						<h2> Editar Calificación </h2>   
					</div>
					<form action="{{route('docente.update.pass')}}" method="post" id="EditFormCalificacion" class="needs-validation frm-pass" novalidate="">
						{{ method_field('patch') }}
						{{ csrf_field() }}
						<label for="password">Contraseña actual</label>
						<div class="input-group mb-3">
							<input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" @error('passwordNew') value="{{old('password')}}" @enderror>
							<div class="input-group-prepend">
								<a class="btn" onclick="verPass('password')"><i class="far fa-eye"></i></a>
							</div>
						</div>
						
						<label for="passwordNew">Nueva Contraseña</label>
						<div class="input-group mb-3">
							<input class="form-control @error('passwordNew') is-invalid @enderror" type="password" id="passwordNew" name="passwordNew">
							<div class="input-group-prepend">
								<a class="btn" onclick="verPass('passwordNew')"><i class="far fa-eye"></i></a>
							</div>
						</div>

						<label for="passwordNewConfirm">Confirmar Contraseña</label>
						<div class="input-group mb-3">
							<input class="form-control @error('passwordNew') is-invalid @enderror" type="password" id="passwordNewConfirm" name="passwordNewConfirm">
							<div class="input-group-prepend">
								<a class="btn" onclick="verPass('passwordNewConfirm')"><i class="far fa-eye"></i></a>
							</div>
						</div>

						<div class="d-flex justify-content-end">
							<button class="btn btn-danger mt-3 col-md-5" data-dismiss="modal">Cancelar</button>
							<button class="btn btn-primary mt-3 col-md-5 ml-2" type="submit">Guardar</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
@endsection
{{-- accion al fallar editar docente --}}
@section("Docente-script")
	@error("editpass")
		<script>$('#ModalUpdatePass').modal('show');</script>
	@enderror
@endsection