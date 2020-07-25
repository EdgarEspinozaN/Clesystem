{{-- vista para deshabilitar multiples docentes --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
{{-- titulo de la tabla --}}
	@section("Titulo-Tabla", "Eliminar docentes")
	{{-- ocultar el boton agregar --}}
	@section("Abrir-Modal")
		style="display:none;"
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		{{-- id="cursos-agregar-table" --}}
		id="docentes-eliminar-multiple-table"
	@endsection
	{{-- boton enviar formulario --}}
	@section("OtherElement")
		<a class="btn btn-outline-per ml-2" onclick="SendForm('DeleteMultDocenteForm', '#docentes-eliminar-multiple-table')">Aceptar</a>
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">Seleccionar</th>
		<th scope="col">No. Control</th>
		<th scope="col">Nombre</th>
		<th scope="col">Cédula Profesional</th>
		<th scope="col">Certificado de idomas</th>
		<th scope="col"></th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		@foreach($docentes as $docente)
			@php
				$personas = $docente->persona;
				$usuarios = $docente->usuario;
			@endphp
			<tr>
				<td> <input type="checkbox" name="check[]" value="{{$docente->id_docente}}"></td>
				<td>{{$docente->id_docente}}</td>
				<td>{{$docente->persona->nombre." ".$docente->persona->ape_pat." ".$docente->persona->ape_mat}}</td>
				<td> {{ $docente->cedula_prof }} </td>
				<td> {{ $docente->certificacion_idioma }} </td>
				<td></td>
			</tr>
		@endforeach
	@endsection
	{{-- formulario con los docentes a adeshabilitar --}}
	<form action="{{route('docentes.deleteMult')}}" method="post" id="DeleteMultDocenteForm">
		{{ csrf_field() }}
		{{-- importacion de la tabla --}}
		@include("tablas.tabla3")
	</form>
@endsection