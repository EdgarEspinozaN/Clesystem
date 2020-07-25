{{-- vista para deshabilitar multiples alumnos --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	{{-- titulo de tabla --}}
	@section("Titulo-Tabla", "Eliminar alumnos")
	{{-- acultar boton crear --}}
	@section("Abrir-Modal")
		style="display:none;"
	@endsection
	{{-- id de tabla --}}
	@section("table-id")
		{{-- id="cursos-agregar-table" --}}
		id="alumnos-eliminar-multiple-table"
	@endsection
	{{-- boton para enviar formulario --}}
	@section("OtherElement")
		<a class="btn btn-outline-per ml-2" onclick="SendForm('DeleteMultAlumnoForm', '#alumnos-eliminar-multiple-table')">Aceptar</a>
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">Seleccionar</th>
		<th scope="col">No. Control</th>
		<th scope="col">Nombre</th>
		<th scope="col">Carrera</th>
		<th scope="col">Nivel</th>
		<th scope="col"></th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		@foreach($alumnos as $alumno)
			@php
				$personas = $alumno->persona;
				$carreras = $alumno->carrera;
				$usuarios = $alumno->usuario;			
			@endphp
			<tr>
				<td> <input type="checkbox" name="check[]" value="{{$alumno->id_alumno}}"></td>
				<td>{{$alumno->id_alumno}}</td>
				<td>{{$alumno->persona->nombre." ".$alumno->persona->ape_pat." ".$alumno->persona->ape_mat}}</td>
				<td>{{$alumno->carrera->carrera}}</td>
				<td>{{$alumno->nivel_aprobado}}</td>
				<td></td>
			</tr>
		@endforeach
	@endsection
	{{-- formulario con los alumnos que se deshabilitaran --}}
	<form action="{{route('alumnos.multDelAlum')}}" method="post" id="DeleteMultAlumnoForm">
		{{ csrf_field() }}
		{{-- importacion de la tabla --}}
		@include("tablas.tabla3")
	</form>
@endsection