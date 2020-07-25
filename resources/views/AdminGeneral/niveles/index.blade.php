@extends("layouts/admin")

@section("ContenidoAdmin")
	@section("Titulo-Tabla", "Niveles")

	@section("Abrir-Modal")
		data-target="#ModalNivel"
	@endsection

	@section("OtherElement")
		<a class="btn btn-ter ml-2" href="{{route('niveles.deletevista')}}"> Deshabilitar</a>
	@endsection

	@section("table-id")
		id="niveles-general-index-table"
	@endsection

	@section("Columnas-Tabla")
		<th scope="col">id</th>
		<th scope="col">Nivel</th>
		<th scope="col">Acciones</th>
	@endsection

	@section("Contenido-Tabla")
		@foreach ($niveles as $nivel)
			<tr @if($nivel->estado != 'Activo') class="table-danger" @endif>
				<td> {{ $nivel->id_nivel }} </td>
				<td> {{ $nivel->nivel }} </td>
				<td>
					@if($nivel->estado == 'Activo')	
						<div class="d-flex justify-content-center">
						<div class="btn-group">
							<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu dropdown-menu-right">
								{{-- <a class="dropdown-item Editar btn" data-toggle="modal" data-target="#ModalEditNivel" data-id="{{$aula->id_aula}}" data-aula="{{$aula->aula}}"><i class="fas fa-pen"></i> Editar</a>  --}}
	            				<a class="dropdown-item Eliminar btn" data-toggle="modal" data-target="#ModalDeleteNivel" data-id="{{$nivel->id_nivel}}" data-nivel="{{$nivel->nivel}}"><i class="fas fa-arrow-down"></i> Deshabilitar</a> 
							</div>
						</div>
						</div>
					@else
						<div class="d-flex justify-content-center">
						<div class="btn-group">
							<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" varia-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu dropdown-menu-right">
	            				<a class="dropdown-item btn Agregar" data-toggle="modal" data-target="#ModalAltaNivel" data-id="{{$nivel->id_nivel}}" data-nivel="{{$nivel->nivel}}"><i class="fas fa-arrow-up"></i> Habilitar</a>
	            			</div>
						</div>
						</div>
	            	@endif	
				</td>
			</tr>
		@endforeach
	@endsection

	@include("Tablas.tabla3")

@endsection

@section("Admin-Modals")
	@include("AdminGeneral.niveles.form")
	@include("AdminGeneral.niveles.delete")
	@include("AdminGeneral.niveles.alta")
@endsection

@section('ScriptOpenCreate')
	<script>$('#ModalNivel').modal('show');</script>
@endsection