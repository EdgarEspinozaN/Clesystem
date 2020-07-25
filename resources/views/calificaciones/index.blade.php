{{-- vista de calificaciones --}}
{{--  extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
{{-- titulo de la tabla --}}
	@section("Titulo-Tabla", "Calificaciones")
	{{-- ocultar boton de agregar --}}
	@section("Abrir-Modal")
		style="display: none;"
	@endsection
	{{-- id de la tabla calificaciones --}}
	@section("table-id")
		id="calificaciones-index-table"
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">No. Control</th>
		<th scope="col">Alumno</th>
		<th scope="col">Curso</th>
		<th scope="col">Horario</th>
		<th scope="col">1 Parcial</th>
		<th scope="col">2 Parcial</th>
		<th scope="col">Recuperación</th>
		<th scope="col">Acciones</th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		@php
			use Carbon\Carbon;
		@endphp
		
		@foreach ($detcursos as $detcurso) 
			@php
				$det = $detcurso->curso->estado;
				if ($det == "Activo") {
					$alumno = $detcurso->alumno;
					$curso = $detcurso->curso;
					$calificacion = $detcurso->calificacion;
					$hora1 = Carbon::createFromTimeString($curso->horario->hora_inicio);
					$hora2 = Carbon::createFromTimeString($curso->horario->hora_fin);
				
			@endphp

			<tr>
				<th scope="row"> {{ $alumno->id_alumno }} </th>
				<td> {{ $alumno->persona->nombre . " " . $alumno->persona->ape_pat . " " . $alumno->persona->ape_mat }} </td>
				<td> {{ $curso->curso }} </td>
				<td> {{ $curso->horario->dia . " " . $hora1->format('H:i') . " - " . $hora2->format('H:i') }} </td>
				<td> {{ $calificacion->cal_1 }} </td>
				<td> {{ $calificacion->cal_2 }} </td>
				<td> {{ $calificacion->recuperacion }} </td>
				<td>
					{{-- dropdown button --}}
					<div class="d-flex justify-content-center">
					<div class="btn-group">
						<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopoup="true" aria-expanded="false"></button>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item Editar btn" data-toggle="modal" data-target="#ModalEditCalificacion" data-id="{{$calificacion->id_calificacion}}" data-nombre="{{$alumno->persona->nombre." ".$alumno->persona->ape_pat." ".$alumno->persona->ape_mat}}" data-cal1="{{$calificacion->cal_1}}" data-cal2="{{$calificacion->cal_2}}" data-recu="{{$calificacion->recuperacion}}" data-origin="cal"><i class="fas fa-pen"></i> Calificación</a> 
						</div>
					</div>
					</div>
	            </td>
            </tr>
            @php
            	}
            @endphp
		@endforeach
	@endsection
	{{-- importacionde la tabla --}}
	@include("tablas.tabla3")

@endsection
{{-- importacion de los modales --}}
@section("Admin-Modals")
	@include("calificaciones.edit")
@endsection