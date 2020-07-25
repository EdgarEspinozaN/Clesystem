{{-- modal para crear carrera --}}
<div class="modal fade" id="ModalCarrera" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalCarreraLabel" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="mb-5 d-flex justify-content-center">
					<h2> Registrar Nueva Carrera </h2>
				</div>
				<form class="needs-validation" action="{{url('/general/carreras')}}" method="post" novalidate>
					{{ csrf_field() }}
					<div class="row justify-content-center">
						<div class="mb-3">
						<label for="aula">Carrera</label>
						<input type="text" class="form-control" name="carrera" id="carrera" placeholder="Nombre Carrera" required="" value="{{ old('carrera') }}">
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