{{-- modal para editar carrera --}}
<div class="modal" id="ModalEditCarrera" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalEditCarreraLabel" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="mb-5 d-flex justify-content-center">
					<h2> Editar Carrera </h2>
				</div>
				<form class="needs-validation" action="/general/carreras/{{ old('idCarrera') }}" method="post" id="EditCarreraForm" novalidate>
					{{ method_field('patch') }}
					{{ csrf_field() }}
					<input type="hidden" name="idCarrera" id="idCarrera" value="{{ old('idCarrera') }}">

					<div class="row justify-content-center">
						<div class="mb-3">
							<label for="carreraE">Aula</label>
							<input type="text" class="form-control" name="carreraE" id="carreraE" required="" value="{{ old('carreraE') }}">
							<div class="invalid-feedback">
								Datos Invalidos.
							</div>
						</div>
					</div>
					
					<div class="d-flex justify-content-end">
						<button class="btn btn-danger mt-3 col-md-3" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-primary mt-3 col-md-3 ml-3" type="submit">Guardar </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

