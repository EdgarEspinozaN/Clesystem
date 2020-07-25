{{-- vista de configuraciones --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section("ContenidoAdmin")
	{{-- titulo del formulario --}}
	@section('titulo-form', 'Configuracion de los cursos')
	{{-- accion del formulario --}}
	@section('action-form')
		action="{{url('/config')}}" 
	@endsection
	{{-- contenido del formulario --}}
	@section('contenido-form')

		@php
			$Config = App\Configuracion::find(1);
		@endphp

		<div class="row">
			<div class="col-4 mb-3">
				<label for="coste">Coste del curso</label>
				<input type="number" id="coste" name="coste" class="form-control" value="{{$Config->coste}}" min="0" required="">
			</div>
			<div class="col-4 mb-3">
				<label for="cupos">Cupos por clase</label>
				<input type="number" id="cupos" name="cupos" class="form-control" value="{{$Config->cupos}}" min="0" required="">
			</div>
		</div>
		<h4>Fechas para registrar calificaciones</h4>
		<div class="row">
			<div class="col-4 mb-4 exa">
				<div class="FechaExamen">
					<div class="exa-title d-flex justify-content-center">
						<h4>Examen 1</h4>
					</div>
					<div class="inicio mt-1">
						<label for="exa1">Inicio</label>
						<input type="date" class="form-control" id="exa1" name="exa1" value="{{$Config->examen1_inicio}}" required="">
					</div>
					<div class="fin mt-3">
						<label for="exa1Fin">Fin</label>
						<input type="date" class="form-control" id="exa1Fin" name="exa1Fin" value="{{$Config->examen1_fin}}" required="">
					</div>
				</div>
			</div>
			<div class="col-4 mb-4 exa">
				<div class="FechaExamen">
					<div class="exa-title d-flex justify-content-center">
						<h4>Examen 2</h4>
					</div>
					<div class="inicio mt-1">
						<label for="exa2">Inicio</label>
						<input type="date" id="exa2" name="exa2" class="form-control" value="{{$Config->examen2_inicio}}" required="">
					</div>
					<div class="fin mt-3">
						<label for="exa2Fin">Fin</label>
						<input type="date" id="exa2Fin" name="exa2Fin" class="form-control" value="{{$Config->examen2_fin}}" required="">
					</div>
				</div>
			</div>
			<div class="col-4 mb-4 exa">
				<div class="FechaExamen">
					<div class="exa-title d-flex justify-content-center">
						<h4>Recuperación</h4>
					</div>
					<div class="inicio mt-1">
						<label for="exa3">Inicio</label>
						<input type="date" id="exa3" name="exa3" class="form-control" value="{{$Config->examen3_inicio}}" required="">	
					</div>
					<div class="fin mt-3">
						<label for="exa3Fin">Fin</label>
						<input type="date" id="exa3Fin" name="exa3Fin" class="form-control" value="{{$Config->examen3_fin}}" required="">
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<button class="btn btn-primary col-3 mb-3" type="submit">Guardar</button>
		</div>
	@endsection
	{{-- importacion del formulario --}}
	@include("Tablas.Formulario1")
@endsection