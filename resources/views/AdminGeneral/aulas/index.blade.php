{{-- vista apartado general del aula --}}
{{-- extiende de la plantilla aula --}}
@extends("layouts/admin")
{{--  --}}
@section("ContenidoAdmin")
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla", "Aulas")
	{{-- accion del boton crear aula --}}
	@section("Abrir-Modal")
		data-target="#ModalAula"
	@endsection
	{{-- boton para deshabilitar multiples aulas --}}
	@section("OtherElement")
		<a class="btn btn-ter ml-2" href="{{route('aulas.deletevista')}}"> Deshabilitar</a>
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="aulas-general-index-table"
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">id</th>
		<th scope="col">Aula</th>
		<th scope="col">Acciones</th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		@foreach ($aulas as $aula)
			<tr @if($aula->estado != 'Activo') class="table-danger" @endif>
				<td> {{ $aula->id_aula }} </td>
				<td> {{ $aula->aula }} </td>
				<td>
					@if($aula->estado == 'Activo')	
						<div class="d-flex justify-content-center">
						<div class="btn-group">
							<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item Editar btn" data-toggle="modal" data-target="#ModalEditAula" data-id="{{$aula->id_aula}}" data-aula="{{$aula->aula}}"><i class="fas fa-pen"></i> Editar</a> 
	            				<a class="dropdown-item Eliminar btn" data-toggle="modal" data-target="#ModalDeleteAula" data-id="{{$aula->id_aula}}" data-aula="{{$aula->aula}}"><i class="fas fa-arrow-down"></i> Deshabilitar</a> 
							</div>
						</div>
						</div>
					@else
						<div class="d-flex justify-content-center">
						<div class="btn-group">
							<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" varia-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu dropdown-menu-right">
	            				<a class="dropdown-item btn Agregar" data-toggle="modal" data-target="#ModalAltaAula" data-id="{{$aula->id_aula}}" data-aula="{{$aula->aula}}"><i class="fas fa-arrow-up"></i> Habilitar</a>
	            			</div>
						</div>
						</div>
	            	@endif	
				</td>
			</tr>
		@endforeach
	@endsection
	{{-- importacion de la tabla --}}
	@include("Tablas.tabla3")

@endsection
{{-- importacion de los modales --}}
@section("Admin-Modals")
	@include("AdminGeneral.aulas.form")
	@include("AdminGeneral.aulas.delete")
	@include("AdminGeneral.aulas.edit")
	@include("AdminGeneral.aulas.alta")
@endsection
{{-- script cuando falla crear aula --}}
@section('ScriptOpenCreate')
	<script>$('#ModalAula').modal('show');</script>
@endsection
{{-- script cuando falla aditar aula --}}
@section('ScriptOpenUpdate')
	<script>$('#ModalEditAula').modal('show');</script>
@endsection