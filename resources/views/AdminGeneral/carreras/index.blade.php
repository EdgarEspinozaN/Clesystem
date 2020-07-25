{{-- vista de carreras --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section("ContenidoAdmin")
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla", "Carreras")
	{{-- accion del boton crear --}}
	@section("Abrir-Modal")
		data-target="#ModalCarrera"
	@endsection

	@section("OtherElement")
		{{-- <a class="btn btn-ter ml-2" href="{{route('carreras.deletevista')}}"> Deshabilitar</a> --}}
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="carreras-general-index-table"
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">id</th>
		<th scope="col">Carrera</th>
		<th scope="col">Acciones</th>
	@endsection
	{{-- contenido para la tabla --}}
	@section("Contenido-Tabla")
		@foreach ($carreras as $carrera)
			<tr @if($carrera->estado != 'Activo') class="table-danger" @endif>
				<td> {{ $carrera->id_carrera }} </td>
				<td> {{ $carrera->carrera }} </td>
				<td>
					@if($carrera->estado == 'Activo')	
						<div class="d-flex justify-content-center">
						<div class="btn-group">
							<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item Editar btn" data-toggle="modal" data-target="#ModalEditCarrera" data-id="{{$carrera->id_carrera}}" data-carrera="{{$carrera->carrera}}"><i class="fas fa-pen"></i> Editar</a> 
	            				<a class="dropdown-item Eliminar btn" data-toggle="modal" data-target="#ModalDeleteCarrera" data-id="{{$carrera->id_carrera}}" data-carrera="{{$carrera->carrera}}"><i class="fas fa-arrow-down"></i> Deshabilitar</a> 
							</div>
						</div>
						</div>
					@else
						<div class="d-flex justify-content-center">
						<div class="btn-group">
							<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" varia-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu dropdown-menu-right">
	            				<a class="dropdown-item btn Agregar" data-toggle="modal" data-target="#ModalAltaCarrera" data-id="{{$carrera->id_carrera}}" data-carrera="{{$carrera->carrera}}"><i class="fas fa-arrow-up"></i> Habilitar</a>
	            			</div>
						</div>
						</div>
	            	@endif	
				</td>
			</tr>
		@endforeach
	@endsection
	{{-- importar la tabla --}}
	@include("Tablas.tabla3")

@endsection
{{-- importar los modales --}}
@section("Admin-Modals")
	@include("AdminGeneral.carreras.form")
	@include("AdminGeneral.carreras.delete")
	@include("AdminGeneral.carreras.edit")
	@include("AdminGeneral.carreras.alta")
@endsection
{{-- script cuando falla crear carrera --}}
@section('ScriptOpenCreate')
	<script>$('#ModalCarrera').modal('show');</script>
@endsection
{{-- script cuando falla aditar carrera --}}
@section('ScriptOpenUpdate')
	<script>$('#ModalEditCarrera').modal('show');</script>
@endsection