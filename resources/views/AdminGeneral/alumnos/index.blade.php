{{-- vista de alumnos general --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla", "Alumnos")
	{{--  --}}
	@section("Abrir-Modal")
		style="display: none;"
	@endsection
	{{-- boton para deshabilitar multiples alumnos --}}
	@section("OtherElement")
		<a class="btn btn-ter ml-2" href="{{route('GenAlumnos.multDel')}}"> Deshabilitar</a>
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="alumnos-general-index-table"
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">No. Control</th>
		<th scope="col">Nombre</th>
		<th scope="col">Carrera</th>
		<th scope="col">Semestre</th>
		<th scope="col">Turno</th>
		<th scope="col">Correo</th>
		<th scope="col">Teléfono</th>
		<th scope="col">Acciones</th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		@foreach ($alumnos as $alumno) 
			@php
				$personas = $alumno->persona;
				$carreras = $alumno->carrera;
				$usuarios = $alumno->usuario;
			@endphp

			<tr id="row-table" @if($alumno->estado != "Activo") class="table-danger" @endif>
				<th scope="row"> {{ $alumno->id_alumno }} </th>
				<td> {{ $personas->nombre . " " . $personas->ape_pat . " " . $personas->ape_mat}}</td>
				<td> {{ $carreras->carrera }}</td>
				<td> {{ $alumno->semestre }} </td>
				<td> {{ $alumno->turno }} </td>
				<td> {{ $personas->correo }} </td>
				<td> {{ $personas->telefono }} </td>
				<td>
					<div class="d-flex justify-content-center">
					<div class="btn-group">
						<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" baria-expanded="false"></button>
						<div class="dropdown-menu dropdown-menu-right">
							<a class=" dropdown-item btn Ver" data-toggle="modal" data-target="#ModalEditAlumno" data-id="{{$alumno->id_alumno}}" data-nombre="{{$personas->nombre}}" data-pat="{{$personas->ape_pat}}" data-mat="{{$personas->ape_mat}}" data-tel="{{$personas->telefono}}" data-mail="{{$personas->correo}}" data-carrera="{{$carreras->id_carrera}}" data-turno="{{$alumno->turno}}" data-nivel="{{$alumno->nivel_aprobado}}" data-semestre="{{$alumno->semestre}}" data-username="{{$usuarios->username}}" data-pass="{{$usuarios->password}}" data-action="ver"><i class="fas fa-eye"></i> Info</a>
							@if($alumno->estado != "Activo")
								<a class="dropdown-item btn Agregar" data-toggle="modal" data-target="#ModalAltaAlumno" data-id="{{$alumno->id_alumno}}" data-nombre="{{$personas->nombre." ".$personas->ape_pat." ".$personas->ape_mat}}"><i class="fas fa-arrow-up"></i> Habilitar</a>
							@else
								<a class="dropdown-item Eliminar btn" data-toggle="modal" data-target="#ModalDeleteAlumno" data-id="{{$alumno->id_alumno}}" data-Nombre="{{$personas->nombre . " " . $personas->ape_pat . " " . $personas->ape_mat }}"><i class="fas fa-arrow-down"></i> Deshabilitar</a>
							@endif
							<a class="dropdown-item btn Agregar" href="{{url('/general/alumnos/cal/'.$alumno->id_alumno)}}"><i class="fas fa-plus"></i> Calificaciónes</a>
						</div>
					</div>
					</div>
	            </td>
            </tr>
		@endforeach
	@endsection
	{{-- inclucion de la tabla --}}
	@include("tablas.tabla3")

@endsection
{{-- importacion de modales --}}
@section("Admin-Modals")
	@include("alumnos.edit")
	@include("alumnos.delete")
	@include("AdminGeneral.alumnos.alta")
@endsection