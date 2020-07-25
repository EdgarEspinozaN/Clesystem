{{-- modal para editar aulas --}}
<div class="modal" id="ModalEditAula" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalEditAulaLabel" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="mb-5 d-flex justify-content-center">
					<h2> Editar Aula </h2>
				</div>
				<form class="needs-validation" action="/general/aulas/{{ old('idAula') }}" method="post" id="EditForm" novalidate>
					{{ method_field('patch') }}
					{{ csrf_field() }}
					<input type="hidden" name="idAula" id="idAula" value="{{ old('idAula') }}">

					<div class="row justify-content-center">
						<div class="mb-3">
							<label for="aulaE">Aula</label>
							<input type="text" class="form-control" name="aulaE" id="aulaE" required="" value="{{ old('aulaE') }}">
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

