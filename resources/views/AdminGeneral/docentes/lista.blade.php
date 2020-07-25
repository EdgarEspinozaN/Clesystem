{{-- vista con la lista de cursos impartidos por un docente --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla")
		<div style="font-size: 1.3rem;">Cursos impartidos por <strong>{{$docente->nombre." ".$docente->ape_pat." ".$docente->ape_mat}}</strong></div>
	@endsection
	{{-- ocultar el boton de crear --}}
	@section("Abrir-Modal")
		style="display: none;"
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="docentes-general-lista-table"
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
				$niveles = $curso->nivel->nivel;
				$aulas = $curso->aula;
				$horarios = $curso->horario;
				$docentes = $curso->docente;
				$hora1 = Carbon::createFromTimeString($horarios->hora_inicio);
				$hora2 = Carbon::createFromTimeString($horarios->hora_fin);
				$alumnos = $curso->detCursos;
				$numero = count($alumnos);
			@endphp

			<tr @if($curso->estado != "Activo") class="table-danger" @endif>
				<th scope="row"> {{ $curso->id_curso }} </th>
				<td> {{ $curso->curso }} </td>
				<td> {{ $niveles }} </td>
				<td> {{ $curso->ciclo }} </td>
				<td> {{ $aulas->aula }} </td>
				<td> {{ $horarios->dia }} </td>
				<td> {{ $hora1->format('H:i') . " - " . $hora2->format('H:i') }} </td>
				<td> {{ $docentes->persona->nombre . " " . $docentes->persona->ape_pat . " " . $docentes->persona->ape_mat }} </td>
				<td> {{ $numero." - ".$limite }} </td>
				<td>
					<div class="d-flex justify-content-center">
					<div class="btn-group">
						<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item btn Ver" href="{{url('/general/cursos/'.$curso->id_curso)}}"><i class="fas fa-eye"></i> Lista</a>
							@if($curso->estado != "Activo")
								<a href="{{ url('/generate/mult/pdf/'.$curso->id_curso) }}" class="dropdown-item btn Export"><i class="far fa-file-alt"></i> Boletas</a>
							@endif
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
