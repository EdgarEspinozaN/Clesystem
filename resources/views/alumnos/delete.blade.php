{{-- modal para deshabilitar alumno --}}
<div class="modal fade" id="ModalDeleteAlumno" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalDeleteAlumnoLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="background-color: #FFC800;">
			<div class="modal-body">
				<form method="post" action="" id="FormDeleteAlumno">

					{{ method_field('delete') }}
					{{ csrf_field() }}	

					<div class="mb-2 d-flex justify-content-center">
						<h3>Confirmar</h3>
					</div>

					<div class="mb-3 d-flex justify-content-center">
						<h5>Desea dar de baja a este alumno</h5>
					</div>

					<div class="row">
						<div class="col-md-4 justify-content-center">
							<label for="idaula">No. Control</label>
							<input class="form-control" type="text" value="" id="idalumno" disabled style="background-color: #FFC800; border: none; padding-left: 0px;">
						</div>
						<div class="col-md-8">
							<label for="nombreauña">Nombre</label>
							<input class="form-control" type="text" value="" id="nombrealumno" disabled style="background-color: #FFC800; border: none; padding-left: 0px;">
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
