{{-- vista del apartado general de horario --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section("ContenidoAdmin")
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla", "Horarios")
	{{-- modal que abrira el boton crear --}}
	@section("Abrir-Modal")
		data-target="#ModalHorario"
	@endsection
	{{-- boton para deshabilitar multiples horarios --}}
	@section("OtherElement")
		<a class="btn btn-ter ml-2" href="{{route('horarios.deletevista')}}"> Deshabilitar</a>
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="horarios-general-index-table"
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col" class="">id</th>
		<th scope="col" class="">Día</th>
		<th scope="col" class="">Hora Inicio</th>
		<th scope="col" class="">Hora Fin</th>
		<th scope="col" class="">Acciones</th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		@php use Carbon\Carbon; @endphp
		@foreach ($horarios as $horario)
			@php
				$time1 = Carbon::createFromTimeString($horario->hora_inicio);
				$time2 = Carbon::createFromTimeString($horario->hora_fin);
			@endphp
			<tr @if($horario->estado != "Activo") class="table-danger" @endif>
				<th scope="row"> {{ $horario->id_horario }} </th>
				<td> {{ $horario->dia }} </td>
				<td> {{ $time1->format('H:i') }} </td>
				<td> {{ $time2->format('H:i') }} </td>
				<td>
					@if ($horario->estado == 'Activo')
						<div class="d-flex justify-content-center">
						<div class="btn-group">
							<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item Editar btn" data-toggle="modal" data-target="#ModalEditHorario" data-id="{{ $horario->id_horario }}" data-dia="{{ $horario->dia }}" data-inicio="{{ $time1->format('H:i') }}" data-fin="{{ $time2->format('H:i') }}"><i class="fas fa-pen"></i> Editar</a> 
								<a class="dropdown-item Eliminar btn" data-toggle="modal" data-target="#ModalDeleteHorario" data-id="{{$horario->id_horario}}" data-hora="{{$horario->dia." ".$time1->format('H:i')."-".$time2->format('H:i')}}"><i class="fas fa-arrow-down"></i> Deshabilitar</a>
							</div>
						</div>
						</div>
					@else
						<div class="d-flex justify-content-center">
						<div class="btn-group">
							<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item btn Agregar" data-toggle="modal" data-target="#ModalAltaHorario" data-id="{{$horario->id_horario}}" data-hora="{{$horario->dia." ".$time1->format('H:i')."-".$time2->format('H:i')}}"><i class="fas fa-arrow-up"></i> Habilitar</a>
							</div>
						</div>
						</div>
					@endif
				</td>
			</tr>
		@endforeach
	@endsection
	{{-- importacion de la tabla --}}
	@include("Tablas.tabla3")
@endsection
{{-- importacion de los modales --}}
@section("Admin-Modals")
	@include("AdminGeneral.horarios.form")
	@include("AdminGeneral.horarios.edit")
	@include("AdminGeneral.horarios.delete")
	@include("AdminGeneral.horarios.alta")
@endsection
