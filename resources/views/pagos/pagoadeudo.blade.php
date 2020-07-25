{{-- modal realizar pago del adeudo --}}
<div class="modal fade" id="ModalPagoAdeudo" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalPagoAdeudoLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="mb-3 d-flex justify-content-center">
					<h2> Pago de Adeudo </h2>
				</div>
				<div class="mb-1 d-flex justify-content-center">
					<h4>¿Este alumno ha realizado su pago?</h4>
				</div>
				<div class="mb-3 d-flex justify-content-center">
					<h4 id="HNombre"></h4>
				</div>
				<form id="FormPagoAdeudo" action="/pagos/adeudos/pagar" class="needs-validation" method="post" novalidate>
					{{ csrf_field() }}
					<input type="hidden" id="adeudo_id" name="adeudo_id">
					<input type="hidden" id="alumno" name="alumno">
					<input type="hidden" id="folio" name="folio">

					<div class="d-flex justify-content-end">
						<button class="btn btn-danger mt-3 col-md-3" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-primary mt-3 col-md-3 ml-3" type="submit">Aceptar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

