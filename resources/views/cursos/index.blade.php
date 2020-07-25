{{-- vista de los cursos --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	{{-- titulode la tabla de cursos --}}
	@section("Titulo-Tabla", "Cursos")
	{{-- accion del boton agregar --}}
	@section("Abrir-Modal")
		data-target="#ModalCurso"
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="cursos-index-table"
	@endsection

	@php
		use Carbon\Carbon;
	@endphp
	{{-- boton para terminar el ciclo --}}
	@if($hoy->greaterThan($fin))
		@section("OtherElement")
			<a class="btn btn-ter ml-2" data-toggle="modal" data-target="#ModalTerminarCursos">Terminar</a>
		@endsection
	@endif
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">Id</th>
		<th scope="col">Curso</th>
		<th scope="col">Nivel</th>
		<th scope="col">Aula</th>
		<th scope="col">Día</th>
		<th scope="col">Hora</th>
		<th scope="col">Docente</th>
		<th scope="col">Cupos</th>
		<th scope="col">Acciones</th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		@foreach ($cursos as $curso) 
			@php
				$nivel = $curso->nivel->nivel;
				$aula = $curso->aula->aula;
				$horario = $curso->horario;
				$docente = $curso->docente;
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
				<td> {{ $docente->persona->nombre . " " . $docente->persona->ape_pat . " " . $docente->persona->ape_mat }} </td>
				<td> {{ $numero." - ".$limite }} </td>
				<td>
					<div class="d-flex justify-content-center">
					<div class="btn-group">
						<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item Ver btn" href="{{url('/cursos/'.$curso->id_curso)}}"><i class="fas fa-eye"></i> Lista</a>
							<a class="dropdown-item Editar btn" data-toggle="modal" data-target="#ModalEditCurso" data-id="{{$curso->id_curso}}" data-curso="{{$curso->curso}}" data-nivel="{{$nivel}}" data-aula="{{$aula}}" data-dia="{{$horario->dia}}" data-hora="{{$horario->id_horario}}" data-docente="{{$docente->id_docente}}"><i class="fas fa-pen"></i> Editar</a> 
	            			<a class="dropdown-item Eliminar btn" data-toggle="modal" data-target="#ModalDeleteCurso" data-id="{{$curso->id_curso}}" data-nombre="{{$curso->curso}}"><i class="fas fa-arrow-down"></i> Eliminar </a>
						</div>
					</div>
					 
	            </td>
            </tr>
		@endforeach
	@endsection
	{{-- importacion de la tabla --}}
	@include("tablas.tabla3")
	{{-- comprobar si se envio una solicitud para imprimir boletas --}}
	@if(session('pdfboletasgenerate'))
	{{-- formulario con los datos de las boletas --}}
	    <form action="{{route('terminar.cursoPdf')}}" method="post" id="pdfboletasgenerateform" target="_blank">
	      	{{csrf_field()}}
	      		@foreach(session('pdfboletasgenerate') as $curso)
	      		<input type="hidden" name="pdf[]" value="{{$curso->id_curso}}">
	      		@endforeach
		</form>
		{{-- script para enviar las boletas --}}
		<script> 
			var form = document.getElementById("pdfboletasgenerateform");
			form.submit();
		</script>
	@endif
@endsection
{{-- importacion de los modales --}}
@section("Admin-Modals")
	@include("cursos.form")
	@include("cursos.edit")
	@include("cursos.delete")
	@include("cursos.terminar")
@endsection
{{-- accion si falla crear curso --}}
@section('ScriptOpenCreate')
	<script>$('#ModalCurso').modal('show');</script>
@endsection
{{-- accion si falla editar curso --}}
@section('ScriptOpenUpdate')
	<script>$('#ModalEditCurso').modal('show');</script>
@endsection