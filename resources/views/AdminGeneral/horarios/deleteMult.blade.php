{{-- vista para deshabilitar multiples horarios --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla", "Eliminar horarios")
	{{-- ocultar el boton crear --}}
	@section("Abrir-Modal")
		style="display:none;"
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		{{-- id="cursos-agregar-table" --}}
		id="horarios-eliminar-table"
	@endsection
	{{-- boton enviar formulario --}}
	@section("OtherElement")
		<a class="btn btn-outline-per ml-2" onclick="SendForm('DeleteMultHorariosForm', '#horarios-eliminar-table')">Aceptar</a>
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">Seleccionar</th>
		<th scope="col" class="">id</th>
		<th scope="col" class="">Día</th>
		<th scope="col" class="">Hora Inicio</th>
		<th scope="col" class="">Hora Fin</th>
		<th scope="col" class=""></th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
	@php use Carbon\Carbon; @endphp
		@foreach($horarios as $horario)
			@php
				$time1 = Carbon::createFromTimeString($horario->hora_inicio);
				$time2 = Carbon::createFromTimeString($horario->hora_fin);
			@endphp
			<tr @if($horario->estado != "Activo") class="table-danger" @endif>
				<td> <input type="checkbox" name="check[]" value="{{$horario->id_horario}}"></td>
				<td> {{ $horario->id_horario }} </td>
				<td> {{ $horario->dia }} </td>
				<td> {{ $time1->format('H:i') }} </td>
				<td> {{ $time2->format('H:i') }} </td>
				<td></td>
			</tr>
		@endforeach
	@endsection
	{{-- formulario para enviar los datos a deshabilitar --}}
	<form action="{{route('horarios.deleteMult')}}" method="post" id="DeleteMultHorariosForm">
		{{ csrf_field() }}
		{{-- importacion de la tabla --}}
		@include("tablas.tabla3")
	</form>
@endsection