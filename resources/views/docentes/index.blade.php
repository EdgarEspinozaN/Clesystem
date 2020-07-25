{{-- vista de docentes --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section("ContenidoAdmin")
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla", "Docentes")
	{{-- accion del boton agregar --}}
	@section("Abrir-Modal")
		data-target="#ModalDocente"
	@endsection
	{{-- boton para deshabilitar multiples docentes --}}
	@section("OtherElement")
		<a class="btn btn-ter ml-2" href="{{route('docentes.deletevista')}}"> Deshabilitar</a>
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="docentes-index-table"
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
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		@foreach ($docentes as $docente)
			@php
				$persona = $docente->persona;
				$usuarios = $docente->usuario;
			@endphp
			<tr>
				<th scope="row"> {{ $docente->id_docente }} </th>
				<td> {{ $persona->nombre . " " . $persona->ape_pat . " " . $persona->ape_mat}} </td>
				<td> {{ $docente->cedula_prof }} </td>
				<td> {{ $docente->certificacion_idioma }} </td>
				<td> {{ $persona->correo }} </td>
				<td> {{ $persona->telefono }} </td>
				<td>
					<div class="d-flex justify-content-center">
					<div class="btn-group">
						<button type="button" class="btn btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item Ver btn" data-toggle="modal" data-target="#ModalEditDocente" data-id="{{$docente->id_docente}}" data-nombre="{{$persona->nombre}}" data-pat="{{$persona->ape_pat}}" data-mat="{{$persona->ape_mat}}" data-tel="{{$persona->telefono}}" data-mail="{{$persona->correo}}" data-cedula="{{$docente->cedula_prof}}" data-cert="{{$docente->certificacion_idioma}}" data-username="{{$usuarios->username}}" data-pass="{{$usuarios->password}}" data-action="ver"><i class="fas fa-eye"></i> Info</a>

							<a class="dropdown-item Editar btn" data-toggle="modal" data-target="#ModalEditDocente" data-id="{{$docente->id_docente}}" data-nombre="{{$persona->nombre}}" data-pat="{{$persona->ape_pat}}" data-mat="{{$persona->ape_mat}}" data-tel="{{$persona->telefono}}" data-mail="{{$persona->correo}}" data-cedula="{{$docente->cedula_prof}}" data-cert="{{$docente->certificacion_idioma}}" data-username="{{$usuarios->username}}" data-pass="{{$usuarios->password}}" data-action="editar"><i class="fas fa-pen"></i> Editar</a> 

							<a class="dropdown-item Eliminar btn" data-toggle="modal" data-target="#ModalDeleteDocente" data-id="{{$docente->id_docente}}" data-nombre="{{$persona->nombre." ".$persona->ape_pat." ".$persona->ape_mat}}"><i class="fas fa-arrow-down"></i> Deshabilitar</a>

							<a class="dropdown-item btn Agregar" href="{{url('/docentes/lista/'.$docente->id_docente)}}"><i class="fas fa-plus"></i> Cursos</a>
						</div>
					</div> 
					</div>
	            </td>
            </tr>
		@endforeach
	@endsection
	{{-- importacionde la tabla --}}
	@include("tablas.tabla3")

@endsection
{{-- importacion de los modales --}}
@section("Admin-Modals")
	@include("docentes.form")
	@include("docentes.edit")
	@include("docentes.delete")
@endsection
{{-- accion al fallar crear docente --}}
@section('ScriptOpenCreate')
	<script>$('#ModalDocente').modal('show');</script>
@endsection
{{-- accion al fallar editar docente --}}
@section('ScriptOpenUpdate')
	<script>$('#ModalEditDocente').modal('show');</script>
@endsection