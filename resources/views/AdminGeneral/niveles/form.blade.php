<div class="modal fade" id="ModalNivel" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalNivelLabel" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="mb-5 d-flex justify-content-center">
					<h2> Registrar Nuevo Nivel </h2>
				</div>
				<form class="needs-validation" action="/general/niveles" method="post" novalidate>
					{{ csrf_field() }}
					<div class="row justify-content-center">
						<div class="mb-3">
						<label for="nivel">Nivel</label>
						<input type="number" class="form-control" name="nivel" id="nivel" placeholder="Nombre Nivel" required="" value="{{ old('nivel') }}">
						<div class="invalid-feedback">
							Datos Invalidos.
						</div>
					</div>
					</div>
					
					<div class="d-flex justify-content-end">
						<button class="btn btn-danger mt-3 col-md-3" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-primary mt-3 col-md-3 ml-3" type="submit">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>