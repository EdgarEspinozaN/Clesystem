{{-- vista para deshabilitar multiples niveles --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla", "Eliminar niveles")
	{{-- ocultar el boton crear --}}
	@section("Abrir-Modal")
		style="display:none;"
	@endsection
	@section("table-id")
		{{-- id="cursos-agregar-table" --}}
		id="niveles-eliminar-table"
	@endsection
	{{-- boton enviar formulario con los niveles a deshabilitar --}}
	@section("OtherElement")
		<a class="btn btn-outline-per ml-2" onclick="SendForm('DeleteMultNivelForm', '#niveles-eliminar-table')">Aceptar</a>
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">Seleccionar</th>
		<th scope="col">Id</th>
		<th scope="col">Nivel</th>
		<th scope="col" style="width: 40%"></th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		@foreach($niveles as $nivel)
			<tr>
				<td> <input type="checkbox" name="check[]" value="{{$nivel->id_nivel}}"></td>
				<td>{{$nivel->id_nivel}}</td>
				<td>{{$nivel->nivel}}</td>
				<td></td>
			</tr>
		@endforeach
	@endsection
	{{-- formulario para enviar los niveles a deshabilitar --}}
	<form action="{{route('niveles.deleteMult')}}" method="post" id="DeleteMultNivelForm">
		{{ csrf_field() }}
		{{ method_field('delete') }}
		{{-- importacion de la tabla --}}
		@include("tablas.tabla3")
	</form>
@endsection