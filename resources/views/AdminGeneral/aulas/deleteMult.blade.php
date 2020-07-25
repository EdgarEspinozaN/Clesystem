{{-- vista para deshabiliatar multiples aulas --}}
{{-- extender de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla", "Eliminar aulas")
	{{-- esconder boton --}}
	@section("Abrir-Modal")
		style="display:none;"
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		{{-- id="cursos-agregar-table" --}}
		id="aulas-eliminar-table"
	@endsection
	{{-- boton enviar los datos a ser deshabilitados --}}
	@section("OtherElement")
		<a class="btn btn-outline-per ml-2" onclick="SendForm('DeleteMultAulaForm', '#aulas-eliminar-table')">Aceptar</a>
	@endsection
	{{-- columnas para la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">Seleccionar</th>
		<th scope="col">Id</th>
		<th scope="col">Aula</th>
		<th scope="col" style="width: 40%"></th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		@foreach($aulas as $aula)
			<tr>
				<td> <input type="checkbox" name="check[]" value="{{$aula->id_aula}}"></td>
				<td>{{$aula->id_aula}}</td>
				<td>{{$aula->aula}}</td>
				<td></td>
			</tr>
		@endforeach
	@endsection
	{{-- formulario que enviara los datos --}}
	<form action="{{route('aulas.deleteMult')}}" method="post" id="DeleteMultAulaForm">
		{{ csrf_field() }}
		{{-- importacion de la tabla --}}
		@include("tablas.tabla3")
	</form>
@endsection