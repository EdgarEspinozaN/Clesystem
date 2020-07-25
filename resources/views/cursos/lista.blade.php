{{-- vista con la lista de alumnos de un curso --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla")
		<div style="font-size: 1.2rem;"> Curso <strong>{{ $curso->curso }}</strong> impartido por <strong>{{ $curso->docente->persona->nombre." ".$curso->docente->persona->ape_pat." ".$curso->docente->persona->ape_mat }}</strong></div>
	@endsection
	{{-- ocultar el boton agregar --}}
	@section("Abrir-Modal")
		style="display: none;"
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="cursos-lista-table"
	@endsection
	{{-- boton para agregar alumnos a el curso --}}
	@section("OtherElement")
		@if($num<$limite)
			<a class="btn btn-outline-per ml-2" href="{{ url('/cursos/'.$curso->id_curso.'/edit') }}">Agregar</a>
		@endif
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">No. Control</th>
		<th scope="col">Alumno</th>
		<th scope="col">1 Parcial</th>
		<th scope="col">2 Parcial</th>
		<th scope="col">Recuperacion</th>
		<th scope="col">Acciones</th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		
		@foreach ($cursodet as $detalle) 
			@php
				$alumno = $detalle->alumno;
				$calificacion = $detalle->calificacion;
			@endphp

			<tr>
				<th scope="row"> {{$alumno->id_alumno}} </th>
				<td> {{$alumno->persona->nombre." ".$alumno->persona->ape_pat." ".$alumno->persona->ape_mat}} </td>
				<td> {{$calificacion->cal_1}} </td>
				<td> {{$calificacion->cal_2}} </td>
				<td> {{$calificacion->recuperacion}} </td>
				<td>
					<div class="d-flex justify-content-center">
					<div class="btn-group">
						<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item Editar btn" data-toggle="modal" data-target="#ModalEditCalificacion" data-id="{{$calificacion->id_calificacion}}" data-nombre="{{$alumno->persona->nombre." ".$alumno->persona->ape_pat." ".$alumno->persona->ape_mat}}" data-cal1="{{$calificacion->cal_1}}" data-cal2="{{$calificacion->cal_2}}" data-recu="{{$calificacion->recuperacion}}" data-origin="lista"><i class="fas fa-pen"></i> Calificación </a>

							<a class="dropdown-item Agregar btn" href="{{ url("/cursos/cambio/$alumno->id_alumno/$curso->id_curso")}}"><i class="fas fa-plus"></i> Cambiar de Curso</a>
						</div>
					</div>
					</div>
				</td>
			</tr>
		@endforeach
	@endsection
	{{-- importacionde la tabla --}}
	@include("tablas.tabla3")

@endsection
{{-- importacionde los modales --}}
@section("Admin-Modals")
	@include("calificaciones.edit")
@endsection