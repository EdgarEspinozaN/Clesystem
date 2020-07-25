{{-- vista con la lista de alumnos para un curso --}}
{{-- extiende de plantilla admin --}}
@extends("layouts/admin")

@php
	if (session('curso')) {
		$curso = session('curso');	
	}
@endphp
{{--  --}}
@section('ContenidoAdmin')
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla")
		<div style="font-size: 1.1rem;max-height: 28.8px; overflow: hidden;">Curso <strong>{{ $cursoinfo->curso }}</strong> Impartido por <strong>{{ $cursoinfo->docente->persona->nombre." ".$cursoinfo->docente->persona->ape_pat." ".$cursoinfo->docente->persona->ape_mat}}</strong></div>
	@endsection
	{{-- ocultar boton de crear --}}
	@section("Abrir-Modal")
		style="display: none;"
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="cursos-general-lista-table"
	@endsection
	{{-- boton de imprimir boletas del curso --}}
	@if($cursoinfo->estado != "Activo")
	@section("OtherElement")
		<a class="btn btn-ter ml-2" style="font-size: 0.9rem; width: 140px;" href="{{ url('/generate/mult/pdf/'.$cursoinfo->id_curso) }}">{{ __('Imprimir Boletas') }}</a>
	@endsection
	@endif
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">No. Control</th>
		<th scope="col">Alumno</th>
		<th scope="col">1 Parcial</th>
		<th scope="col">2 Parcial</th>
		<th scope="col">Recuperación</th>
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
							@if($cursoinfo->estado != "Activo")
								<a href="{{ url('/generate/pdf/'.$alumno->id_alumno.'/'.$cursoinfo->id_curso) }}" class="dropdown-item btn Export"><i class="far fa-file-alt"></i> Boleta</a>
							@endif
						</div>
					</div>
					</div>
				</td>
			</tr>
		@endforeach
	@endsection
	{{-- importar la tabla --}}
	@include("tablas.tabla3")
@endsection
{{-- importar modales --}}
@section("Admin-Modals")
	@include("calificaciones.edit")
@endsection