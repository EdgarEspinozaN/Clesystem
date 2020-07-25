{{-- modal para agregar nuevo alumno --}}
<div class="modal fade" id="ModalAlumno" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalAlumnoLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">

				<div class="mb-5 d-flex justify-content-center">
					<h2> Registrar Nuevo Alumno </h2>   
				</div>
				<form method="post" action="/alumnos" class="needs-validation" novalidate id="addAlumnoForm">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{ old('nombre') }}" required>
							<div class="invalid-feedback">
								Campo requerido.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="apePat">Apellido Paterno</label>
							<input type="text" class="form-control" name="apePat" id="apePat" placeholder="Apellido Paterno" value="{{ old('apePat') }}" required="">
							<div class="invalid-feedback">
								Campo requerido.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="apeMat">Apellido Materno</label>
							<input type="text" class="form-control" name="apeMat" id="apeMat" placeholder="Apellido Materno" value="{{ old('apeMat') }}" required="">
							<div class="invalid-feedback">
								Campo requerido.
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="telefono">Teléfono</label>
							<input type="number" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required="" value="{{ old('telefono') }}">
							<div class="invalid-feedback" style="width: 100%;">
								Campo numerico.
							</div>
						</div>
						<div class="col-md-8 mb-3">
							<label for="email">Correo</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required="" value="{{ old('email') }}">
							<div class="invalid-feedback">
								Correo incorrecto.
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3 mb-3">
							<label for="noControl">No. Control</label>
							<input type="number" class="form-control" name ="noControl" id="noControl" placeholder="No. Control" required="" value="{{ old('noControl') }}">
							<div class="invalid-feedback">
								Campo numerico.
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<label for="carrera">Carrera</label>
							<select id="carrera" name="carrera" class="custom-select" required>
								
								<option selected value="" disabled=""> Seleccionar </option>
								@php
									$carreras = App\Carrera::all()->where('estado', 'Activo');
								@endphp

								@foreach ($carreras as $carrera) 
									<option value=" {{ $carrera->id_carrera }} " {{ old('carrera') == $carrera->id_carrera ? 'selected' : '' }}>Ing. {{ $carrera->carrera }} </option>
								@endforeach

							</select>
							<div class="invalid-feedback">
								Campo requerido.
							</div>
						</div>

						<div class="col-md-3 mb-3">
							<label for="turno">Turno</label>
							<select name="turno" id="turno" class="custom-select" required="">
								<option selected value="" disabled=""> Seleccionar </option>
								<option value="Matutino" {{ old('turno') == "Matutino" ? 'selected' : '' }}>Matutino</option>
								<option value="Vespertino" {{ old('turno') == "Vespertino" ? 'selected' : '' }}>Vespertino</option>
							</select>
							<div class="invalid-feedback">
								Campo requerido.
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 mb-3">
							<label for="nivelApro">Nivel</label>
							<select name="nivelApro" id="nivelApro" class="custom-select text-center" required="">

								@php
									$niveles = App\Nivel::all()->where('estado', 'Activo');
								@endphp
								
								<option selected value="" disabled=""> Seleccionar </option>
								@foreach ($niveles as $nivel)
									<option value=" {{ $nivel->id_nivel }} " {{ old('nivelApro') == $nivel->id_nivel ? 'selected' : '' }}> {{ $nivel->nivel }} </option>
								@endforeach

							</select>
							<div class="invalid-feedback">
								Campo requerido.
							</div>
						</div>
						<div class="col-md-2 mb-3">
							<label for="semestre">Semestre</label>
							<input type="number" class="form-control" name="semestre" id="semestre" placeholder="0" required="" value="{{ old('semestre') }}" min="0">
							<div class="invalid-feedback">
								Campo numerico.
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-end">
						<button class="btn btn-danger mt-3 col-md-2" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-primary mt-3 col-md-2 ml-3" type="submit">Guardar</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

