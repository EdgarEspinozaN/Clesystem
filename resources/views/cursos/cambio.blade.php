{{-- vista para cambiar alumno de curso --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")
@section('ContenidoAdmin')
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla", "Asignar a Curso")
	{{-- ocultar el boton agregar --}}
	@section("Abrir-Modal")
		style="display: none;"
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="cursos-cambio-table"
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
			@if($curso->id_curso != $cursoActual)
				@php
					$niveles = $curso->nivel->nivel;
					$aulas = $curso->aula;
					$horarios = $curso->horario;
					$docentes = $curso->docente;
					$hora1 = Carbon::createFromTimeString($horarios->hora_inicio);
					$hora2 = Carbon::createFromTimeString($horarios->hora_fin);
					$alumnos = $curso->detCursos;
					$numero = count($alumnos);
				@endphp

				<tr>
					<th scope="row"> {{ $curso->id_curso }} </th>
					<td> {{ $curso->curso }} </td>
					<td> {{ $niveles }} </td>
					<td> {{ $aulas->aula }} </td>
					<td> {{ $horarios->dia }} </td>
					<td> {{ $hora1->format('H:i') . " - " . $hora2->format('H:i') }} </td>
					<td> {{ $docentes->persona->nombre . " " . $docentes->persona->ape_pat . " " . $docentes->persona->ape_mat }} </td>
					<td> {{ $numero." - ".$limite }} </td>
					<td>
						@if($numero < $limite)
							<a class="btn btn-outline-success Add d-flex justify-content-center" style="color: green;" onclick="enviar({{$curso->id_curso}})"><i class="fas fa-check"></i></a> 
						@endif
					</td>
				</tr>
			@endif
		@endforeach

	@endsection
	{{-- formulario con el alumno y el curso al que se agregara --}}
	<form method="post" action="/cursos/cambio" id="alumnocurso">
		{{ csrf_field() }}
		<input type="hidden" name="alumnAsign" id="alumnAsign" value="{{ $alumno }}">
		<input type="hidden" name="cursoAsign" id="cursoAsign" value="">
		<input type="hidden" name="cursoOld" id="cursoOld" value="{{ $cursoActual }}">
		{{-- importacion de la tabla --}}
		@include("tablas.tabla3")
	</form>
	
	

@endsection