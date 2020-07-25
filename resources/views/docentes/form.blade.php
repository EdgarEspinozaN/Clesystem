{{-- modal para crear nuevo docente --}}
<div class="modal fade" id="ModalDocente" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalDocenteLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">

				<div class="mb-5 d-flex justify-content-center">
					<h2> Registrar Nuevo Docente </h2>   
				</div>
				<form action="/docentes" method="post" class="needs-validation" novalidate>
					{{ csrf_field() }}
					<div class="form row">
						<div class="col-md-4 mb-3">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" required value="{{ old('nombre') }}">
							<div class="invalid-feedback">
								Se requiere un nombre valido.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="apePat">Apellido Paterno</label>
							<input type="text" class="form-control" id="apePat" placeholder="Apellido Paterno" name="apePat" required="" value="{{ old('apePat') }}">
							<div class="invalid-feedback">
								Se requiere un appelido valido.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="apeMat">Apellido Materno</label>
							<input type="text" class="form-control" id="apeMat" placeholder="Apellido Materno" name="apeMat" required="" value="{{ old('apeMat') }}">
							<div class="invalid-feedback">
								Se requiere un apellido valido.
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="telefono">Teléfono</label>
							<input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required="" value="{{ old('telefono') }}">
							<div class="invalid-feedback" style="width: 100%;">
								Se requiere un telefono valido.
							</div>
						</div>
						<div class="col-md-8 mb-3">
							<label for="email">Correo</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required="" value="{{ old('email') }}">
							<div class="invalid-feedback">
								Por favor introdusca un correo valido.
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="idDoc">Identificador</label>
							<input type="number" class="form-control" name="idDoc" id="idDoc" placeholder="No. Control" required="" value="{{ old('idDoc') }}">
							<div class="invalid-feedback">
								Se requiere un No de control valido.
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<label for="cedula">Cédula Profesional</label>
							<input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cedula Prof" value="{{ old('cedula') }}">
							<div class="invalid-feedback">
								Se requiere una cédula valida.
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<label for="idiomas">Certificado de idiomas</label>
							<input type="text" class="form-control" name="idiomas" id="idiomas" placeholder="Certificado de idiomas" required="" value="{{ old('idiomas') }}">
							<div class="invalid-feedback">
								Se requiere un certificado valido.
							</div>
						</div>
					</div>

					<div class="d-flex justify-content-end">
						<button class="btn btn-danger mt-3 col-md-2" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-primary mt-3 col-md-2 ml-3" type="submit">Guardar</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
</div>

