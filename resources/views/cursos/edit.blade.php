{{-- modal para editar curso --}}
<div class="modal fade" id="ModalEditCurso" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalEditCursoLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="mb-5 d-flex justify-content-center">
					<h2> Editar Curso </h2>
				</div>
				<form action="/cursos/{{ old('idhiddenE') }}" class="needs-validation" method="post" id="EditFormCurso" novalidate>
					{{ method_field('patch') }}
					{{ csrf_field() }}
					<input type="hidden" name="idhiddenE" id="idhiddenE" value="{{ old('idhiddenE') }}">

					@php
						$niveles = App\Nivel::all()->where('estado', 'Activo');
						$aulas = App\Aula::all()->where('estado', 'Activo');
						$horarios = App\Horario::all()->where('estado', 'Activo');
						$docentes = App\Docente::all()->where('estado', 'Activo');
						use Carbon\Carbon;
					@endphp

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="cursoE">Curso</label>
							<input type="text" id="cursoE" name="cursoE" class="form-control" placeholder="Nombre Curso" required="" value="{{ old('cursoE') }}">
							<div class="invalid-feedback">
								Datos invalidos.
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<label for="nivelE">Nivel</label>
							<select name="nivelE" id="nivelE" class="custom-select">
								@foreach ($niveles as $nivel)

									<option value="{{ $nivel->id_nivel }}" {{ old('nivelE') == $nivel->id_nivel ? 'selected' : '' }}> {{ $nivel->nivel }} </option>

								@endforeach
							</select>
						</div>

						<div class="col-md-4 mb-3">
							<label for="aulaE">Aula</label>
							<select name="aulaE" id="aulaE" class="custom-select">
								@foreach ($aulas as $aula)
									<option value="{{$aula->id_aula}}" {{ old('aulaE') == $aula->id_aula ? 'selected' : '' }}> {{ $aula->aula }} </option>
								@endforeach	
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="diaE">Día</label>
							<select id="diaE" name="diaE" class="custom-select" onchange="cambiar()" required="">
								<option codigo="nada" selected="" disabled="">Seleccionar</option>
								<option codigo="Lunes" value="Lunes" {{ old('diaE') == 'Lunes' ? 'selected' : '' }}>Lunes</option>
								<option codigo="Martes" value="Martes" {{ old('diaE') == 'Martes' ? 'selected' : '' }}>Martes</option>
								<option codigo="Miércoles" value="Miércoles" {{ old('diaE') == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
								<option codigo="Jueves" value="Jueves" {{ old('diaE') == 'Jueves' ? 'selected' : '' }}>Jueves</option>
								<option codigo="Viernes" value="Viernes" {{ old('diaE') == 'Viernes' ? 'selected' : '' }}>Viernes</option>
								<option codigo="Sábado" value="Sábado" {{ old('diaE') == 'Sábado' ? 'selected' : '' }}>Sábado</option>
							</select>
						</div>

						<div class="col-md-8 mb-3">
							
							<label for="horaE">Hora</label>
							<select id="horaE" name="horaE" class="custom-select" required="">
								<option codigo="nada" disabled="" selected="">Seleccionar</option>
								@foreach ($horarios as $hora)
								
									@php
										$horainicio = Carbon::createFromTimeString($hora->hora_inicio);
										$horafin = Carbon::createFromTimeString($hora->hora_fin);
									@endphp

									<option codigo="{{$hora->dia}}" value="{{$hora->id_horario}}" {{ old('horaE') == $hora->id_horario ? 'selected' : '' }}> {{ $horainicio->format('H:i') . " - " . $horafin->format('H:i') }} </option>

								@endforeach
							</select>
							
						</div>
					</div>

					<div class=" mb-3">
						<label for="docenteE">Docente</label>
						<select id="docenteE" name="docenteE" class="custom-select" >
							@foreach($docentes as $docente)
								<option value="{{ $docente->id_docente }}" {{ old('docenteE') == $docente->id_docente ? 'selected' : '' }}> {{ $docente->persona->nombre . " " . $docente->persona->ape_pat . " " . $docente->persona->ape_mat }} </option>
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

