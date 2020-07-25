{{-- modal para editar calificaciones --}}
<div class="modal fade" id="ModalEditCalificacion" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalEditCalificacionLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="mb-5 d-flex justify-content-center">
					<h2> Editar Calificación </h2>   
				</div>
				<form action="" method="post" id="EditFormCalificacion" class="needs-validation" novalidate="">

					{{ method_field('patch') }}
					{{ csrf_field() }}

					<input type="hidden" id="actionorigin" name="actionorigin" value="">

					<div class="row">
						<div class="col-md-12 mb-3">
							<label for="nombre">Alumno</label>
							<input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" required="" disabled="">
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="cal1">Calificación 1</label>
							<input type="number" class="form-control" name="cal_1" id="cal1" placeholder="0" required="" min="0" max="100">
							<div class="invalid-feedback" style="width: 100%;">
								Datos Incorrectos.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="cal2">Calificación 2</label>
							<input type="number" class="form-control" name="cal_2" id="cal2" placeholder="0" required="" min="0" max="100">
							<div class="invalid-feedback">
								Datos Incorrectos.
							</div>
						</div>
						<div class="col-md mb-3">
							<label for="recuperacion">Recuperación</label>
							<input type="number" class="form-control" name="recuperacion" id="recuperacion" placeholder="0" required="" min="0" max="100">
							<div class="invalid-feedback">
								Datos Incorrectos.
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
</div>

