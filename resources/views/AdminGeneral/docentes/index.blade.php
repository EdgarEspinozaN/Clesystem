{{-- vista del apartado general de docentes --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section("ContenidoAdmin")
	{{-- titulo de l atabla --}}
	@section("Titulo-Tabla", "Docentes")
	{{-- ocultar boton crear --}}
	@section("Abrir-Modal")
		style="display: none;"
	@endsection
	{{-- boton para deshabilitar multiples docentes --}}
	@section("OtherElement")
		<a class="btn btn-ter ml-2" href="{{route('GenDocentes.multDel')}}"> Deshabilitar</a>
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="docentes-general-index-table"
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">Id</th>
		<th scope="col">Nombre</th>
		<th scope="col">Cédula profesional</th>
		<th scope="col">Certificado de idiomas</th>
		<th scope="col">Correo</th>
		<th scope="col">Teléfono</th>
		<th scope="col">Acciones</th>
	@endsection

	@section("Contenido-Tabla")
		@foreach ($docentes as $docente)
			@php
				$personas = $docente->persona;
				$usuarios = $docente->usuario;
			@endphp
			<tr @if ($docente->estado != 'Activo') class="table-danger" @endif>
				<th scope="row"> {{ $docente->id_docente }} </th>
				<td> {{ $personas->nombre . " " . $personas->ape_pat . " " . $personas->ape_mat}} </td>
				<td> {{ $docente->cedula_prof }} </td>
				<td> {{ $docente->certificacion_idioma }} </td>
				<td> {{ $personas->correo }} </td>
				<td> {{ $personas->telefono }} </td>
				<td>
					<div class="d-flex justify-content-center">
					<div class="btn-group">
						<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item btn Ver" data-toggle="modal" data-target="#ModalEditDocente" data-id="{{$docente->id_docente}}" data-nombre="{{$personas->nombre}}" data-pat="{{$personas->ape_pat}}" data-mat="{{$personas->ape_mat}}" data-tel="{{$personas->telefono}}" data-mail="{{$personas->correo}}" data-cedula="{{$docente->cedula_prof}}" data-cert="{{$docente->certificacion_idioma}}" data-username="{{$usuarios->username}}" data-pass="{{$usuarios->password}}" data-action="ver"><i class="fas fa-eye"></i> Info</a>
							<a class="dropdown-item btn Agregar" href="{{url('/general/docentes/lista/'.$docente->id_docente)}}"><i class="fas fa-plus"></i> Cursos</a>
							@if($docente->estado != 'Activo')
								<a class="dropdown-item btn Agregar" data-toggle="modal" data-target="#ModalAltaDocente" data-id="{{$docente->id_docente}}" data-nombre="{{$personas->nombre." ".$personas->ape_pat." ".$personas->ape_mat}}"><i class="fas fa-arrow-up"></i> Habilitar</a>
							{{-- 	<a class="dropdown-item btn Eliminar" data-toggle="modal" data-target="#ModalDeleteDocentePer" data-id="{{$docente->id_docente}}" data-nombre="{{$personas->nombre." ".$personas->ape_pat." ".$personas->ape_mat}}"><i class="fas fa-arrow-down"></i> Eliminar</a> --}}
							@else
								<a class="dropdown-item Eliminar btn" data-toggle="modal" data-target="#ModalDeleteDocente" data-id="{{$docente->id_docente}}" data-nombre="{{$docente->persona->nombre." ".$docente->persona->ape_pat." ".$docente->persona->ape_mat}}"><i class="fas fa-arrow-down"></i> Deshabilitar</a>
							@endif
						</div>
					</div>
					</div>
	            </td>
            </tr>
		@endforeach
	@endsection
	{{-- importacion de la tabla --}}
	@include("tablas.tabla3")
@endsection
{{-- iportacion de modales --}}
@section("Admin-Modals")
	@include("docentes.edit")
	@include("AdminGeneral.docentes.alta")
	@include("docentes.delete")
@endsection