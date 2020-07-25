{{-- formulario crear nuevo pago --}}
<div class="modal fade" id="ModalPagos" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalPagoLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">

				<div class="mb-5 d-flex justify-content-center">
					<h2> Registrar Nuevo Pago </h2>
				</div>
				<form action="/pagos" class="needs-validation" method="post" novalidate>
					{{ csrf_field() }}
					
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="folio">Folio</label>
							<input type="text" id="folio" name="folio" class="form-control" placeholder="Folio" required="" value="{{ old('folio') }}">
							<div class="invalid-feedback">
								Datos invalidos.
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<label for="control">No de Control</label>
							<input type="number" class="form-control" id="control" name="control" placeholder="No. de Control" required="" value="{{ old('control') }}">
							<div class="invalid-feedback">
								Datos Invalidos.
							</div>
						</div>
					
						<div class="col-md-4 mb-3">
							<label for="pago">Primer Pago</label>
							<input type="number" class="form-control" id="pago" name="pago" placeholder="Pago" required="" value="{{ old('pago') }}" min="0">
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

