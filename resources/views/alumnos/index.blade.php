{{-- vista de alumnos --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	{{-- titulo de la tabla alumnos --}}
	@section("Titulo-Tabla", "Alumnos")
	{{-- accion del boton agregar --}}
	@section("Abrir-Modal")
		data-target="#ModalAlumno"
	@endsection
	{{-- botton para deshabilitar multiples alumnos --}}
	@section("OtherElement")
		<a class="btn btn-ter ml-2" href="{{route('alumnos.multDel')}}"> Deshabilitar</a>
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="alumnos-index-table"
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">No. Control</th>
		<th scope="col" >Nombre</th>
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

			<tr>
				<th scope="row"> {{ $alumno->id_alumno }} </th>
				<td> {{ $personas->nombre . " " . $personas->ape_pat . " " . $personas->ape_mat}}</td>
				<td> {{ $carreras->carrera }}</td>
				<td> {{ $alumno->semestre }} </td>
				<td> {{ $alumno->turno }} </td>
				<td> {{ $personas->correo }} </td>
				<td> {{ $personas->telefono }} </td>
				<td>
					<!-- dropdown button -->
					<div class="d-flex justify-content-center">
					<div class="btn-group">
					  <button type="button" class="btn btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
					  <div class="dropdown-menu dropdown-menu-right">
					  	{{--  --}}
					    <a class="dropdown-item Ver btn" data-toggle="modal" data-target="#ModalEditAlumno" data-id="{{$alumno->id_alumno}}" data-nombre="{{$personas->nombre}}" data-pat="{{$personas->ape_pat}}" data-mat="{{$personas->ape_mat}}" data-tel="{{$personas->telefono}}" data-mail="{{$personas->correo}}" data-carrera="{{$carreras->id_carrera}}" data-turno="{{$alumno->turno}}" data-nivel="{{$alumno->nivel_aprobado}}" data-semestre="{{$alumno->semestre}}" data-username="{{$usuarios->username}}" data-pass="{{$usuarios->password}}" data-action="ver"><i class="fas fa-eye"></i> Info</a>
					    {{--  --}}
					    <a class="dropdown-item Editar btn" data-toggle="modal" data-target="#ModalEditAlumno" data-id="{{$alumno->id_alumno}}" data-nombre="{{$personas->nombre}}" data-pat="{{$personas->ape_pat}}" data-mat="{{$personas->ape_mat}}" data-tel="{{$personas->telefono}}" data-mail="{{$personas->correo}}" data-carrera="{{$carreras->id_carrera}}" data-turno="{{$alumno->turno}}" data-nivel="{{$alumno->nivel_aprobado}}" data-semestre="{{$alumno->semestre}}" data-username="{{$usuarios->username}}" data-pass="{{$usuarios->password}}" data-action="editar"><i class="fas fa-pen"></i> Editar</a>
					    {{--  --}}
					    <a class="dropdown-item Eliminar btn" data-toggle="modal" data-target="#ModalDeleteAlumno" data-id="{{$alumno->id_alumno}}" data-Nombre="{{$personas->nombre . " " . $personas->ape_pat . " " . $personas->ape_mat }}"><i class="fas fa-arrow-down"></i> Deshabilitar</a> 
						{{--  --}}
					    @if ($alumno->detcurso == null)
							<a class="dropdown-item Agregar btn" href="{{ url("/alumnos/curso/$alumno->id_alumno")}}"><i class="fas fa-plus"></i> Curso</a>
						@else
							@php 
								$cursoestado = $alumno->detcursos;
								$mos = "CursoAdd";
							@endphp
							@foreach($cursoestado as $estado)
								@if($estado->curso->estado == "Activo")
									@php
										$curso = $estado->curso->id_curso;
										$mos = "CursoInfo"; break; 
									@endphp
								@else
									@php $mos = "CursoAdd";  @endphp
								@endif
							@endforeach
							@if($mos=="CursoAdd")
								<a class="dropdown-item Agregar btn" href="{{ url("/alumnos/curso/$alumno->id_alumno")}}"><i class="fas fa-plus"></i> Curso</a>
							@elseif($mos=="CursoInfo")
								<a class="dropdown-item Agregar btn" href="{{ url("/cursos/$curso") }}"><i class="fas fa-plus"></i> Curso</a>
							@endif
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
{{-- importacion de los modales --}}
@section("Admin-Modals")
	@include("alumnos.form")
	@include("alumnos.edit")
	
	@include("alumnos.delete")
@endsection
{{-- script que se ejecuta al fallar crear un alumno --}}
@section('ScriptOpenCreate')
	<script>$('#ModalAlumno').modal('show');</script>
@endsection
{{-- script que se ejecuta al fallar editar un alumno --}}
@section('ScriptOpenUpdate')
	<script>$('#ModalEditAlumno').modal('show');</script>
@endsection