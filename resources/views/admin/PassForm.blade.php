{{-- modal para cambiar la contraseña del administrador --}}
<div class="modal fade" id="ModalAdminPass" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalAdminPassLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-body">

				<div class="d-flex justify-content-center">
					<h3> Cambiar </h3>
				</div>
				<div class="mb-3 d-flex justify-content-center">
					<h3> Contraseña </h3>
				</div>
				<form method="post" action="{{url('/password/admin')}}" class="needs-validation" novalidate id="addAlumnoForm">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-12 mb-3">
							<label for="adminpass">Nueva Contraseña</label>
							<div class="input-group">
								<input type="password" class="form-control" id="adminpass" name="adminpass" placeholder="Contraseña" value="{{old('adminpass')}}" required="">
								<div class="input-group-prepend">
									<a class="btn btn-primary" onclick="verPass('adminpass', 'adminconfirm')"><i class="far fa-eye"></i></a>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 mb-3">
							<label for="adminconfirm">Confirmar Contraseña</label>
							<input type="password" class="form-control" id="adminconfirm" name="adminconfirm" placeholder="Confirmar" required>
						</div>
					</div>

					<div class="d-flex justify-content-end">
						<button class="btn btn-danger mt-3 col-md-4" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-primary mt-3 col-md-4 ml-3" type="submit">Guardar</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

