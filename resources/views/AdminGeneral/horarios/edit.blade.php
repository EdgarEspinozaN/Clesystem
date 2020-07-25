{{-- modal para editar horario --}}
<div class="modal " id="ModalEditHorario" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalEditHorarioLabel" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="mb-5 d-flex justify-content-center">
					<h2> Edit Horario </h2>
				</div>
				<form class="needs-validation" action="" method="post" id="EditFormHorario" novalidate>
					{{ method_field('patch') }}
					{{ csrf_field() }}
					
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="diaE">Día</label>
							<select id="diaE" name="dia" class="custom-select" required="">
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
							<input type="time" class="form-control text-center" id="inicio" name="hora_inicio" placeholder="Hora Inicio" required="">
							<div class="invalid-feedback">
								Datos invalidos.
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<label for="fin">Hora Fin</label>
							<input type="time" class="form-control text-center" id="fin" name="hora_fin" placeholder="Hora Fin" required="">
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