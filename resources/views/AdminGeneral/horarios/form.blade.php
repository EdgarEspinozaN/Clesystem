{{-- modal para crear horario --}}
<div class="modal fade" id="ModalHorario" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalHorarioLabel" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="mb-5 d-flex justify-content-center">
					<h2> Registrar Nuevo Horario </h2>
				</div>
				<form class="needs-validation" action="/general/horarios" method="post" novalidate>
					{{ csrf_field() }}
					
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="dia">Día</label>
							<select id="dia" name="dia" class="custom-select" required="">
								<option value="Lunes">Lunes</option>
								<option value="Martes">Martes</option>
								<option value="Miércoles">Miércoles</option>
								<option value="Jueves">Jueves</option>
								<option value="Viernes">Viernes</option>
								<option value="Sábado">Sábado</option>	
							</select>
							<div class="invalid-feedback">
							Datos Invalidos. 
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<label for="inicio">Hora Inicio</label>
							<input type="time" class="form-control text-center" id="inicio" name="inicio" placeholder="Hora Inicio" required="">
							<div class="invalid-feedback">
								Datos invalidos.
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<label for="fin">Hora Fin</label>
							<input type="time" class="form-control text-center" id="fin" name="fin" placeholder="Hora Fin" required="">
							<div class="invalid-feedback">
								Datos invalidos.
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