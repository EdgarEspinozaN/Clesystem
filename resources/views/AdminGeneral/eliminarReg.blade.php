{{-- vista para eliminar registros inactivos --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts.admin")

@section("ContenidoAdmin")
	{{-- titulo de formulario --}}
	@section("titulo-form")
	Eliminar Registros
	@endsection
	{{-- accion del formulario --}}
	@section("action-form")
		action="{{route('soft.Delete')}}"
	@endsection
	{{-- contenido del formulario --}}
	@section("contenido-form")
		<div class="d-flex justify-content-center mb-4">
			<h4 class="col-8">Se eliminaran todos los registros inactivos cuya fecha de actualización sea igual o inferior a la seleccionada</h4>
		</div>
		<div class="d-flex justify-content-center">			
			<div class="col-4 mb-3">
				<label for="year">Seleccione un año</label>
				<select name="year" id="year" class="custom-select">
					@foreach(range(date('Y')-10, date('Y')) as $y)
   						<option value="{{$y}}">{{$y}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="d-flex justify-content-end mb-3">
			<div class="col-4 mb-3">
				<button class="btn btn-primary" type="submit">Aceptar</button>
			</div>
		</div>
	@endsection
	{{-- importacion del formulario --}}
	@include("Tablas.Formulario1")
@endsection