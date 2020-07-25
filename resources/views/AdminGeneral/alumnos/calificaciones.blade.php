{{-- vista de calificaciones del alumno --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla", "Calificaciones de $nom $pat $mat")
	{{-- --}}
	@section("Abrir-Modal")
		style="display: none;"
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="alumnos-general-calif-table"
	@endsection
	{{-- columnas para la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">Curso</th>
		<th scope="col">Ciclo</th>
		<th scope="col">Horario</th>
		<th scope="col">1 Parcial</th>
		<th scope="col">2 Parcial</th>
		<th scope="col">Recuperación</th>
		<th scope="col">Action</th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		@php
			use Carbon\Carbon;
		@endphp
		
		@foreach ($detcursos as $detcurso) 
			@php
				$alumno = $detcurso->alumno;
				$curso = $detcurso->curso;
				$calificacion = $detcurso->calificacion;
				$hora1 = Carbon::createFromTimeString($curso->horario->hora_inicio);
				$hora2 = Carbon::createFromTimeString($curso->horario->hora_fin);
			@endphp

			<tr>
				<td> {{ $curso->curso }} </td>
				<td> {{ $curso->ciclo }} </td>
				<td> {{ $curso->horario->dia . " " . $hora1->format('H:i') . " - " . $hora2->format('H:i') }} </td>
				<td> {{ $calificacion->cal_1 }} </td>
				<td> {{ $calificacion->cal_2 }} </td>
				<td> {{ $calificacion->recuperacion }} </td>
				<td>
					<div class="d-flex justify-content-center">
					<div class="btn-group">
						<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item Editar btn" data-toggle="modal" data-target="#ModalEditCalificacion" data-id="{{$calificacion->id_calificacion}}" data-nombre="{{$alumno->persona->nombre." ".$alumno->persona->ape_pat." ".$alumno->persona->ape_mat}}" data-cal1="{{$calificacion->cal_1}}"data-cal2="{{$calificacion->cal_2}}" data-recu="{{$calificacion->recuperacion}}" data-origin="cal"><i class="fas fa-pen"></i> Editar</a>
							
							@if($curso->estado != "Activo")
								<a href="{{ url('/generate/pdf/'.$alumno->id_alumno.'/'.$curso->id_curso) }}" class="dropdown-item btn Export"><i class="far fa-file-alt"></i> Boleta</a>
							@endif								
						</div>
					</div>
					</div>
	            </td>
            </tr>
		@endforeach
	@endsection

	@include("tablas.tabla3")

@endsection

@section("Admin-Modals")
	@include("calificaciones.edit")
@endsection