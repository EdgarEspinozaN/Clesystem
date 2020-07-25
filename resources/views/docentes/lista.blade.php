{{-- vista con la lista de cursos impartidos por el docente --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	@php
			use Carbon\Carbon;
	@endphp
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla")
		<div style="font-size: 1.2rem;">Cursos impartidos por <strong>{{ $docente->nombre." ".$docente->ape_pat." ".$docente->ape_mat }}</strong></div>
	@endsection
	{{-- ocultar el boton agregar --}}
	@section("Abrir-Modal")
		style="display: none;"
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="docentes-lista-table"
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">Id</th>
		<th scope="col">Curso</th>
		<th scope="col">Nivel</th>
		<th scope="col">Ciclo</th>
		<th scope="col">Aula</th>
		<th scope="col">Día</th>
		<th scope="col">Hora</th>
		<th scope="col">Cupos</th>
		<th scope="col">Acciones</th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		@foreach ($cursos as $curso) 
			@php
				$nivele = $curso->nivel->nivel;
				$aula = $curso->aula->aula;
				$horario = $curso->horario;
				$hora1 = Carbon::createFromTimeString($horario->hora_inicio);
				$hora2 = Carbon::createFromTimeString($horario->hora_fin);
				$alumnos = $curso->detCursos;
				$numero = count($alumnos);
			@endphp

			<tr @if($curso->estado != "Activo") class="table-danger" @endif>
				<th scope="row"> {{ $curso->id_curso }} </th>
				<td> {{ $curso->curso }} </td>
				<td> {{ $nivele }} </td>
				<td> {{ $curso->ciclo }} </td>
				<td> {{ $aula }} </td>
				<td> {{ $horario->dia }} </td>
				<td> {{ $hora1->format('H:i') . " - " . $hora2->format('H:i') }} </td>
				<td> {{ $numero." - ".$limite }} </td>
				<td>
					<div class="d-flex justify-content-center">
					<div class="btn-group">
						<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item btn Ver" href="{{url('/cursos/'.$curso->id_curso)}}"><i class="fas fa-eye"></i> Lista</a>
						</div>
					</div>
					</div>
	            </td>
            </tr>
		@endforeach
	@endsection
	{{-- importacion de la tabla --}}
	@include("tablas.tabla3")

@endsection
