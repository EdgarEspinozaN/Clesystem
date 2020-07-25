{{-- vista del apartado general de cursos --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla", "Cursos")
	{{-- acultar boton --}}
	@section("Abrir-Modal")
		style="display: none;"
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="cursos-general-index-table"
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">Id</th>
		<th scope="col">Curso</th>
		<th scope="col">Nivel</th>
		<th scope="col">Aula</th>
		<th scope="col">Día</th>
		<th scope="col">Hora</th>
		<th scope="col">Docente</th>
		<th scope="col">Alumnos</th>
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
				$alumnos = App\Det_Curso::where('id_curso_det', $curso->id_curso)->get();
				$numero = count($alumnos);
			@endphp

			<tr @if($curso->estado != "Activo") class="table-danger" @endif>
				<th scope="row"> {{ $curso->id_curso }} </th>
				<td> {{ $curso->curso }} </td>
				<td> {{ $niveles }} </td>
				<td> {{ $aulas->aula }} </td>
				<td> {{ $horarios->dia }} </td>
				<td> {{ $hora1->format('H:i') . " - " . $hora2->format('H:i') }} </td>
				<td> {{ $docentes->persona->nombre . " " . $docentes->persona->ape_pat . " " . $docentes->persona->ape_mat }} </td>
				<td> {{ $numero }} </td>
				<td>
					<div class="d-flex justify-content-center">
					<div class="btn-group">
						<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item btn Ver" href="{{url('/general/cursos/'.$curso->id_curso)}}"><i class="fas fa-eye"></i> Lista</a>
							@if($curso->estado != "Activo")
								<a href="{{ url('/generate/mult/pdf/'.$curso->id_curso) }}" class="dropdown-item btn Export"><i class="far fa-file-alt"></i> Boletas</a>

								{{-- <a class="dropdown-item btn Eliminar" data-toggle="modal" data-target="#ModalDeleteCursoPer" data-id="{{$curso->id_curso}}" data-nombre="{{$curso->curso}}"><i class="fas fa-arrow-down"></i> Eliminar</a> --}}
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
{{-- importacion de los modales --}}
@section("Admin-Modals")
	@include("AdminGeneral.cursos.deletePer")
@endsection