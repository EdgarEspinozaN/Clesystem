{{-- modal para deshabilitar curso --}}
<div class="modal fade" id="ModalDeleteCurso" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalDeleteCursoLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content" style="background-color: #FFC800;">
			<div class="modal-body">
				<form method="post" action="" id="FormDeleteCurso">

					{{ method_field('delete') }}
					{{ csrf_field() }}	

					<div class="mb-2 d-flex justify-content-center">
						<h3>Confirmar</h3>
					</div>

					<div class="mb-3 d-flex justify-content-center">
						<h5>Desea deshabilitar este Curso</h5>
					</div>

					<div class="row">
						<div class="col-md-6 justify-content-center">
							<label for="idcurso">Id</label>
							<input class="form-control" type="text" value="" id="idcurso" disabled style="background-color: #FFC800; border: none; padding-left: 0px;">
						</div>
						<div class="col-md-6">
							<label for="nombrecurso">Curso</label>
							<input class="form-control" type="text" value="" id="nombrecurso" disabled style="background-color: #FFC800; border: none; padding-left: 0px;">
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
