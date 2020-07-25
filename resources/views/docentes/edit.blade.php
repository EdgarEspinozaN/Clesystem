{{-- modal para editar docente --}}
<div class="modal fade" id="ModalEditDocente" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalEditDocenteLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="mb-5 d-flex justify-content-center">
					<h2 id="tituloModal"> Editar Docente </h2>   
				</div>
				<form action="/docentes/{{ old('idhiddenE') }}" method="post" id="EditFormDocente" class="needs-validation" novalidate>

					{{ method_field('patch') }}
					{{ csrf_field() }}
					<input type="hidden" id="idhiddenE" name="idhiddenE" value="{{ old('idhiddenE') }}">

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="nombreE">Nombre</label>
							<input type="text" class="form-control" id="nombreE" placeholder="Nombre" name="nombreE" required="" value="{{ old('nombreE') }}">
							<div class="invalid-feedback">
								Se requiere un nombre valido.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="apePatE">Apellido Paterno</label>
							<input type="text" class="form-control" id="apePatE" placeholder="Apellido Paterno" name="apePatE" required="" value="{{ old('apePatE') }}">
							<div class="invalid-feedback">
								Se requiere un appelido valido.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="apeMatE">Apellido Materno</label>
							<input type="text" class="form-control" id="apeMatE" placeholder="Apellido Materno" name="apeMatE" required="" value="{{ old('apeMatE') }}">
							<div class="invalid-feedback">
								Se requiere un apellido valido.
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="telefonoE">Teléfono</label>
							<input type="tel" class="form-control" name="telefonoE" id="telefonoE" placeholder="Telefono" required="" value="{{ old('telefonoE') }}">
							<div class="invalid-feedback" style="width: 100%;">
								Se requiere un telefono valido.
							</div>
						</div>
						<div class="col-md-8 mb-3">
							<label for="emailE">Correo</label>
							<input type="email" class="form-control" name="emailE" id="emailE" placeholder="you@example.com" required="" value="{{ old('emailE') }}">
							<div class="invalid-feedback">
								Por favor introdusca un correo valido.
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="idDocE">No. Control</label>
							<input type="text" class="form-control" name="idDocE" id="idDocE" placeholder="No. Control" required="" value="{{ old('idDocE') }}">
							<div class="invalid-feedback">
								Se requiere un No de control valido.
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<label for="cedulaE">Cédula Profesional</label>
							<input type="text" class="form-control" name="cedulaE" id="cedulaE" placeholder="Cedula Prof" value="{{ old('cedulaE') }}">
							<div class="invalid-feedback">
								Se requiere una cédula valida.
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<label for="idiomasE">Certificado de idiomas</label>
							<input type="text" class="form-control" name="idiomasE" id="idiomasE" placeholder="Certificado de idiomas" required="" value="{{ old('idiomasE') }}">
							<div class="invalid-feedback">
								Se requiere un certificado valido.
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-4 mb-3">
							<label for="usernameE">Nombre de Usuario</label>
							<input type="text" class="form-control" name="usernameE" id="usernameE" placeholder="Username" required="" value="{{ old('usernameE') }}">
							<div class="invalid-feedback">
								Nombre inválido u ocupado.
							</div>
						</div>
						<div class="col-4 mb-3">
							<label for="btnPass" id="labelPass">Contraseña</label>
							<a class="btn btn-info col-12" id="btnPass" name="btnPass" onclick="PassConfirm()">Reestablecer</a>
							{{-- <input type="text" class="form-control" name="passwordE" id="passwordE" placeholder="Contraseña" required="" value="{{ old('passwordE') }}">
							<div class="invalid-feedback">
								Datos Invalidos
							</div> --}}
						</div>
					</div>

					<div class="d-flex justify-content-end">
						<button class="btn btn-danger mt-3 col-md-2" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-primary mt-3 col-md-2 ml-3" id="btnGuardarD" type="submit">Guardar</button>
					</div>
				</form>
				<form id="PassResetForm" action="{{url('/password/docente')}}" method="post" style="display:none;">
					{{csrf_field()}}
					<input type="hidden" name="passwordE" id="passwordE" value="">
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="ModalResetPassword" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalResetPasswordLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content" style="background-color: #FFC800;">
			<div class="modal-body">
				
				<div class="row mb-3">
					<div class="col-12 d-flex justify-content-center">
						<h3>Confirmar</h3>
					</div>
				</div>
				<div class="row mb-3">
					<div class=" col-12 d-flex justify-content-center">
						<h6>Desea Reestablecer la contraseña</h6>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<button class="btn btn-danger col-12" data-dismiss="modal">Cancelar</button>
					</div>
					<div class="col-6">
						<button class="btn btn-primary col-12" onclick="Pass()">Aceptar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>