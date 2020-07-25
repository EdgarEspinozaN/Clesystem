{{-- Modal con formulario para crear aula --}}
<div class="modal fade" id="ModalAula" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalAulaLabel" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="mb-5 d-flex justify-content-center">
					<h2> Registrar Nueva Aula </h2>
				</div>
				<form class="needs-validation" action="/general/aulas" method="post" novalidate>
					{{ csrf_field() }}
					<div class="row justify-content-center">
						<div class="mb-3">
						<label for="aula">Aula</label>
						<input type="text" class="form-control" name="aula" id="aula" placeholder="Nombre Aula" required="" value="{{ old('aula') }}">
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