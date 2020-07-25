{{-- modal editar pago --}}
<div class="modal fade" id="ModalPagosEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalPagoEditLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">

				<div class="mb-5 d-flex justify-content-center">
					<h2> Editar Pago </h2>
				</div>
				<form id="FormEditPago" action="" class="needs-validation" method="post" novalidate>
					{{ csrf_field() }}
					<input type="hidden" id="idpago" value="{{ old('idpago')}}">

					<div class="row">
						<div class="col-3 mb-3">
							<label for="folio">Folio</label>
							<input type="text" id="folio" name="folio" class="form-control" placeholder="Folio" required="" value="{{ old('folio') }}">
							<div class="invalid-feedback">
								Datos invalidos.
							</div>
						</div>

						<div class="col-3 mb-3">
							<label for="pago1">Pago 1</label>
							<input type="number" class="form-control" id="pago1" name="pago1" placeholder="Pago" required="" value="{{ old('pago1') }}" min="0">
							<div class="invalid-feedback">
								Datos Invalidos.
							</div>
						</div>
					
						<div class="col-3 mb-3">
							<label for="pago2">Pago 2</label>
							<input type="number" class="form-control" id="pago2" name="pago2" placeholder="Pago" required="" value="{{ old('pago2') }}" min="0">
							<div class="invalid-feedback">
								Datos Invalidos.
							</div>
						</div>
						<div class="col-3 mb-3">
							<label for="pago3">Pago 3</label>
							<input type="number" class="form-control" id="pago3" name="pago3" placeholder="Pago" required="" value="{{ old('pago3') }}" min="0">
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

