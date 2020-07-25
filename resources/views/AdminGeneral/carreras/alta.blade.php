{{-- modal para habilitar carreras --}}
<div class="modal fade" id="ModalAltaCarrera" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalAltaCarreraLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="background-color: #FFC800;">
			<div class="modal-body">
				<form method="post" action="" id="FormAltaCarrera">
					{{ csrf_field() }}	

					<div class="mb-2 d-flex justify-content-center">
						<h3>Confirmar</h3>
					</div>

					<div class="mb-3 d-flex justify-content-center">
						<h5>Desea habilitar esta Carrera</h5>
					</div>

					<div class="row">
						<div class="col-md-6 justify-content-center">
							<label for="idcarrera">Id</label>
							<input class="form-control" type="text" value="" id="idcarrera" disabled style="background-color: #FFC800; border: none; padding-left: 0px;">
						</div>
						<div class="col-md-6">
							<label for="nombrecarrera">Carrera</label>
							<input class="form-control" type="text" value="" id="nombrecarrera" disabled style="background-color: #FFC800; border: none; padding-left: 0px;">
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
