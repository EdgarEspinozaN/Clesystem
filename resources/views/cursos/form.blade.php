{{-- modal para crear nuevo curso --}}
<div class="modal fade" id="ModalCurso" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalCursoLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">

				<div class="mb-5 d-flex justify-content-center">
					<h2> Registrar Nuevo Curso </h2>
				</div>
				<form action="/cursos" class="needs-validation" method="post" novalidate>
					{{ csrf_field() }}
					@php
						$niveles = App\Nivel::all()->where('estado', 'Activo');
						$aulas = App\Aula::all()->where('estado', 'Activo');
						$horarios = App\Horario::all()->where('estado', 'Activo');
						$docentes = App\Docente::all()->where('estado', 'Activo');
						use Carbon\Carbon;
					@endphp

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="curso">Curso</label>
							<input type="text" id="curso" name="curso" class="form-control" placeholder="Nombre Curso" required="" value="{{ old('curso') }}">
							<div class="invalid-feedback">
								Datos invalidos.
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<label for="nivel">Nivel</label>
							<select name="nivel" id="nivel" class="custom-select">
								@foreach ($niveles as $nivel)

									<option value="{{ $nivel->id_nivel }}" {{ old('nivel') == $nivel->id_nivel ? 'selected' : '' }}> {{ $nivel->nivel }} </option>

								@endforeach
							</select>
						</div>

						<div class="col-md-4 mb-3">
							<label for="aula">Aula</label>
							<select name="aula" id="aula" class="custom-select">
								@foreach ($aulas as $aula)
									<option value="{{ $aula->id_aula }}" {{ old('aula') == $aula->id_aula ? 'selected' : '' }}> {{ $aula->aula }} </option>
								@endforeach	
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="dia">Día</label>
							<select id="dia" name="dia" class="custom-select" onchange="cambiarA()" required="">
								<option codigo="null" disabled="" selected="">Seleccionar</option>
								<option codigo="Lunes" value="Lunes" {{ old('dia') == 'lunes' ? 'selected' : '' }}>Lunes</option>
								<option codigo="Martes" value="Martes" {{ old('dia') == 'Martes' ? 'selected' : '' }}>Martes</option>
								<option codigo="Miércoles" value="Miércoles" {{ old('dia') == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
								<option codigo="Jueves" value="Jueves" {{ old('dia') == 'Jueves' ? 'selected' : '' }}>Jueves</option>
								<option codigo="Viernes" value="Viernes" {{ old('dia') == 'Viernes' ? 'selected' : '' }}>Viernes</option>
								<option codigo="Sábado" value="Sábado" {{ old('dia') == 'Sábado' ? 'selected' : '' }}>Sábado</option>
							</select>
						</div>

						<div class="col-md-4 mb-3">
							
							<label for="hora">Hora</label>
							<select id="hora" name="hora" class="custom-select" required="">
								<option codigo="null" value="" disabled="" selected="">Seleccionar</option>
								@foreach ($horarios as $hora)
								
									@php
										$horainicio = Carbon::createFromTimeString($hora->hora_inicio);
										$horafin = Carbon::createFromTimeString($hora->hora_fin);
									@endphp

									<option style="display: none;" codigo="{{$hora->dia}}" value="{{$hora->id_horario}}" {{ old('hora') == $hora->id_horario ? 'selected' : '' }}> {{ $horainicio->format('H:i') . " - " . $horafin->format('H:i') }} </option>

								@endforeach
							</select>
							
						</div>

						<div class="col-md-4 mb-3">
							<label for="ciclo">Ciclo</label>
							<select id="ciclo" name="ciclo" class="custom-select">
								<option value="Enero-Julio" {{ old('ciclo') == 'Enero-Julio' ? 'selected' : '' }}>Enero-Julio</option>
								<option value="Agosto-Diciembre" {{ old('ciclo') == 'Agosto-Diciembre' ? 'selected' : '' }}>Agosto-Diciembre</option>
								<option value="Especial" {{ old('ciclo') == 'Especial' ? 'selected' : '' }}>Especial</option>
							</select>	
						</div>

					</div>

					<div class=" mb-3">
						<label for="docente">Docente</label>
						<select id="docente" name="docente" class="custom-select" >
							@foreach($docentes as $docente)
								<option value="{{ $docente->id_docente }}" {{ old('docente') == $docente->id_docente ? 'selected' : '' }}> {{ $docente->persona->nombre . " " . $docente->persona->ape_pat . " " . $docente->persona->ape_mat }} </option>
							@endforeach
						</select>
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

