{{-- modal para editar alumno --}}
<div class="modal fade" id="ModalEditAlumno" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalEditAlumnoLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="mb-5 d-flex justify-content-center">
					<h2 id="tituloModal"> Editar Alumno </h2> 
				</div>
				<form method="post" action="/alumnos/{{ old('idhiddenE') }}" class="needs-validation" novalidate="" id="EditFormAlumno">
					{{ method_field('patch') }}
					{{ csrf_field() }}
					<input type="hidden" name="idhiddenE" id="idhiddenE" value="{{ old('idhiddenE') }}">

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="nombreE">Nombre</label>
							<input type="text" class="form-control" name="nombreE" id="nombreE" placeholder="Nombre" required="" value="{{ old('nombreE') }}">
							<div class="invalid-feedback">
								Campo requerido.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="apePatE">Apellido Paterno</label>
							<input type="text" class="form-control" name="apePatE" id="apePatE" placeholder="Apellido Paterno" required="" value="{{ old('apePatE') }}">
							<div class="invalid-feedback">
								Campo requerido.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="apeMatE">Apellido Materno</label>
							<input type="text" class="form-control" name="apeMatE" id="apeMatE" placeholder="Apellido Materno" required="" value="{{ old('apeMatE') }}">
							<div class="invalid-feedback">
								Campo requerido.
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="telefonoE">Teléfono</label>
							<input type="text" class="form-control" name="telefonoE" id="telefonoE" placeholder="Telefono" required="" value="{{ old('telefonoE') }}">
							<div class="invalid-feedback" style="width: 100%;">
								Campo numerico.
							</div>
						</div>
						<div class="col-md-8 mb-3">
							<label for="emailE">Correo</label>
							<input type="email" class="form-control" name="emailE" id="emailE" placeholder="you@example.com" required="" value="{{ old('emailE') }}">
							<div class="invalid-feedback">
								Correo incorrecto.
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3 mb-3">
							<label for="noControlE">No. Control</label>
							<input type="text" class="form-control" name ="noControlE" id="noControlE" placeholder="No. Control" required="" value="{{ old('noControlE') }}">
							<div class="invalid-feedback">
								Campo numerico.
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<label for="carreraE">Carrera</label>
							<select id="carreraE" name="carreraE" class="custom-select" required="">

								<option selected disabled> Seleccionar </option>
								@php
								$carreras = App\Carrera::all()->where('estado', 'Activo');
								@endphp

								@foreach ($carreras as $carrera) 
								<option value="{{ $carrera->id_carrera }}" {{ old('carreraE') == $carrera->id_carrera ? 'selected' : '' }}>Ing. {{ $carrera->carrera }} </option>
								@endforeach

							</select>
							<div class="invalid-feedback">
								Campo requerido.
							</div>
						</div>

						<div class="col-md-3 mb-3">
							<label for="turnoE">Turno</label>
							<select name="turnoE" id="turnoE" class="custom-select" required="">
								<option selected="" disabled> Seleccionar </option>
								<option value="Matutino" {{ old('turnoE') == "Matutino" ? 'selected' : '' }}>Matutino</option>
								<option value="Vespertino" {{ old('turnoE') == "Vespertino" ? 'selected' : '' }}>Vespertino</option>
							</select>
							<div class="invalid-feedback">
								Campo requerido.
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2 ">
							<label for="nivelAproE">Nivel</label>
							<select name="nivelAproE" id="nivelAproE" class="custom-select text-center mb-3" required="">

								@php
								$niveles = App\Nivel::all()->where('estado', 'Activo');
								@endphp
								
								<option selected disabled>Seleccionar</option>
								@foreach ($niveles as $nivel)
								<option value="{{ $nivel->id_nivel }}" {{ old('nivelAproE') == $nivel->id_nivel ? 'selected' : '' }}> {{ $nivel->nivel }} </option>
								@endforeach

							</select>
							<div class="invalid-feedback">
								Campo requerido.
							</div>
						</div>
						<div class="col-md-2 ">
							<label for="semestreE">Semestre</label>
							<input type="number" class="form-control mb-3" name="semestreE" id="semestreE" placeholder="0" required="" value="{{ old('semestreE') }}">
							<div class="invalid-feedback">
								Campo numerico.
							</div>
						</div>
						<div class="col-md-4 ">
							<label for="usernameE">Nombre de Usuario</label>
							<input type="text" class="form-control mb-3" name="usernameE" id="usernameE" required="" placeholder="Nombre Usuario" value="{{ old('usernameE') }}">
							<div class="invalid-feedback">
								Campo requerido.
							</div>
						</div>
						<div class="col-4">
							<label for="btnPass" id="labelPass" >Contraseña</label>
							<a class="btn btn-info col-12" id="btnPass" name="btnPass" onclick="PassConfirm()">Reestablecer</a>
						</div>
					</div>
					<div class="d-flex justify-content-end">
						<button class="btn btn-danger mt-3 col-md-2" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-primary mt-3 col-md-2 ml-3" id="btnGuardar" type="submit">Guardar</button>
					</div>
				</form>

				<form id="PassResetForm" action="{{url('/password/alumno')}}" method="post" style="display: none;">
					{{csrf_field()}}
					<input type="hidden" name="passwordE" id="passwordE" value="">
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="ModalResetPassword" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalResetPasswordLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content" style="background-color: #FFC800;">
			<div class="modal-body">
				
				<div class="row mb-3">
					<div class="col-12 d-flex justify-content-center">
						<h3>Confirmar</h3>
					</div>
				</div>
				<div class="row mb-3">
					<div class=" col-12 d-flex justify-content-center">
						<h6>Desea Reestablecer la contraseña</h6>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<button class="btn btn-danger col-12" data-dismiss="modal">Cancelar</button>
					</div>
					<div class="col-6">
						<button class="btn btn-primary col-12" onclick="Pass()">Aceptar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


