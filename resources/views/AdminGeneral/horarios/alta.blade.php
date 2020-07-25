{{-- modal para habilitar horario --}}
<div class="modal fade" id="ModalAltaHorario" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalAltaHorarioLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content" style="background-color: #FFC800;">
			<div class="modal-body">
				<form method="post" action="" id="FormAltaHorario">
					{{ csrf_field() }}	

					<div class="mb-2 d-flex justify-content-center">
						<h3>Confirmar</h3>
					</div>

					<div class="mb-3 d-flex justify-content-center">
						<h5>Desea habilitar este horario</h5>
					</div>

					<div class="row">
						<div class="col-md-4 justify-content-center">
							<label for="idhora">Id</label>
							<input class="form-control" type="text" value="" id="idhora" disabled style="background-color: #FFC800; border: none; padding-left: 0px;">
						</div>
						<div class="col-md-8">
							<label for="horaIF">Horario</label>
							<input class="form-control" type="text" value="" id="horaIF" disabled style="background-color: #FFC800; border: none; padding-left: 0px;">
						</div>
					</div>

					<div class="mt-4 d-flex justify-content-center">
						<button class="btn btn-danger col-6" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-primary col-6 ml-3" type="submit">Aceptar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
