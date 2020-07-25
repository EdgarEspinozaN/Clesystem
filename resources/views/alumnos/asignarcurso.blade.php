{{-- vista para asignar curso a un alumno --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")
@section('ContenidoAdmin')
	{{-- titulo de l atabla --}}
	@section("Titulo-Tabla", "Asignar a Curso")
	{{-- ocultar boton agregar --}}
	@section("Abrir-Modal")
		style="display: none;"
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="alumnos-asignarcurso-table"
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">Id</th>
		<th scope="col">Curso</th>
		<th scope="col">Nivel</th>
		<th scope="col">Aula</th>
		<th scope="col">Dia</th>
		<th scope="col">Hora</th>
		<th scope="col">Docente</th>
		<th scope="col">Cupos</th>
		<th scope="col">Acciones</th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		@php
			use Carbon\Carbon;
		@endphp

		@foreach ($cursos as $curso) 
			@php
				$nivel = $curso->nivel->nivel;
				$aula = $curso->aula->aula;
				$horario = $curso->horario;
				$docente = $curso->docente->persona;
				$hora1 = Carbon::createFromTimeString($horario->hora_inicio);
				$hora2 = Carbon::createFromTimeString($horario->hora_fin);
				$alumnos = $curso->detCursos;
				$numero = count($alumnos);
			@endphp

			<tr>
				<th scope="row"> {{ $curso->id_curso }} </th>
				<td> {{ $curso->curso }} </td>
				<td> {{ $nivel }} </td>
				<td> {{ $aula }} </td>
				<td> {{ $horario->dia }} </td>
				<td> {{ $hora1->format('H:i') . " - " . $hora2->format('H:i') }} </td>
				<td> {{ $docente->nombre . " " . $docente->ape_pat . " " . $docente->ape_mat }} </td>
				<td> {{ $numero." - ".$limite }} </td>
				<td>
					@if($numero < $limite)
						<a class="btn btn-outline-success Add d-flex justify-content-center" style="color: green;" onclick="enviar({{$curso->id_curso}})"><i class="fas fa-check"></i></a> 
					@endif
				</td>
			</tr>
		@endforeach

	@endsection
	{{-- formulario con los datos del alumno y el curso asignado --}}
	<form method="post" action="/calificaciones" id="alumnocurso">
			{{ csrf_field() }}
			<input type="text" name="alumnAsign" id="alumnAsign" value="{{ $idAlumno }}" style="display: none">
			<input type="text" name="cursoAsign" id="cursoAsign" value="" style="display: none">
			{{-- importacion de la tabla --}}
			@include("tablas.tabla3")
	</form>
	

@endsection