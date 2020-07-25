{{-- vista con la lista de alumnos del curso --}}
{{-- extiende de la plantilla docente --}}
@extends("layouts.docente")
{{-- contenido --}}
@section("Docente-Main")
    <div class="col-12">
    	{{-- titulo de la tabla --}}
        @section("Titulo-Tabla", "lista del curso $nombre")
		{{-- ocultar boton agregar --}}
        @section("Abrir-Modal")
            style="display:none;"
        @endsection
		{{-- columnas de la tabla --}}
        @section("Columnas-Tabla")
            <th scope="col">No. Control</th>
            <th scope="col">Nombre</th>
            <th scope="col">Nivel</th>
            <th scope="col">Carrera</th>
            <th scope="col">Examen 1</th>
            <th scope="col">Examen 2</th>
            <th scope="col">Recuperación</th>
            <th scope="col">Acciones</th>
        @endsection
        {{-- contenido de la tabla --}}
        @section("Contenido-Tabla")
            @foreach($detalles as $det)
                <tr>
                    <td>{{$det->alumno->id_alumno}}</td>
                    <td>{{$det->alumno->persona->nombre." ".$det->alumno->persona->ape_pat." ".$det->alumno->persona->ape_mat}}</td>
                    <td>{{$det->curso->nivel->nivel}}</td>
                    <td>{{$det->alumno->carrera->carrera}}</td>
                    <td>{{$det->calificacion->cal_1}}</td>
                    <td>{{$det->calificacion->cal_2}}</td>
                    <td>{{$det->calificacion->recuperacion}}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <div class="btn-group">
                                <button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item btn Ver" data-toggle="modal" data-target="#ModalEditCalificacion" data-id="{{$det->calificacion->id_calificacion}}" data-nombre="{{$det->alumno->persona->nombre." ".$det->alumno->persona->ape_pat." ".$det->alumno->persona->ape_mat}}" data-cal1="{{$det->calificacion->cal_1}}" data-cal2="{{$det->calificacion->cal_2}}" data-recu="{{$det->calificacion->recuperacion}}" data-origin="lista"><i class="fas fa-eye"></i> Editar Calificación</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endsection
		{{-- importacion de la tabla --}}
        @include("Tablas.tabla3")

            {{-- <form action="{{route('Mdocente.lista')}}" id="Mdocente-curso-lista" method="post">
                {{ csrf_field() }}
                <input type="hidden" id="curso" name="curso">
            </form> --}}
    </div>
@endsection
{{-- modales --}}
@section("Docente-Modal")
	@php
		use Carbon\Carbon;
		$ini_1 = Carbon::createFromFormat('Y-m-d', $inicio1)->startOfDay();
		$fin_1 = Carbon::createFromFormat('Y-m-d', $fin1)->endOfDay();
		$ini_2 = Carbon::createFromFormat('Y-m-d', $inicio2)->startOfDay();
		$fin_2 = Carbon::createFromFormat('Y-m-d', $fin2)->endOfDay();
		$ini_3 = Carbon::createFromFormat('Y-m-d', $inicio3)->startOfDay();
		$fin_3 = Carbon::createFromFormat('Y-m-d', $fin3)->endOfDay();
	@endphp
	{{-- modal para editar calificacion --}}
	<div class="modal fade" id="ModalEditCalificacion" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalEditCalificacionLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="mb-5 d-flex justify-content-center">
					<h2> Editar Calificación </h2>   
				</div>
				<form action="" method="post" id="EditFormCalificacion" class="needs-validation" novalidate="">
					{{ method_field('patch') }}
					{{ csrf_field() }}

					<input type="hidden" id="actionorigin" name="actionorigin" value="">

					<div class="row">
						<div class="col-md-12 mb-3">
							<label for="nombre">Alumno</label>
							<input type="text" class="form-control disabled-input" id="nombre" placeholder="Nombre" name="nombre" required="" disabled="">
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="cal1">Calificación 1</label>
							<input type="number" class="form-control" name="cal_1" id="cal1" placeholder="0" required="" min="0" max="100"
							@if( !( ($hoy->greaterThan($ini_1)) && ($hoy->lessThan($fin_1)) ) )
								disabled="" 
							@endif
							>
							<div class="invalid-feedback" style="width: 100%;">
								Datos Incorrectos.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="cal2">Calificación 2</label>
							<input type="number" class="form-control" name="cal_2" id="cal2" placeholder="0" required="" min="0" max="100"
							@if( !( ($hoy->greaterThan($ini_2)) && ($hoy->lessThan($fin_2)) ) )
								disabled="" 
							@endif
							>
							<div class="invalid-feedback">
								Datos Incorrectos.
							</div>
						</div>
						<div class="col-md mb-3">
							<label for="recuperacion">Recuperación</label>
							<input type="number" class="form-control" name="recuperacion" id="recuperacion" placeholder="0" required="" min="0" max="100"
							@if( !( ($hoy->greaterThan($ini_3)) && ($hoy->lessThan($fin_3)) ) )
								disabled="" 
							@endif
							>
							<div class="invalid-feedback">
								Datos Incorrectos.
							</div>
						</div>
					</div>

					<div class="d-flex justify-content-end">
						<button class="btn btn-danger mt-3 col-md-3" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-primary mt-3 col-md-3 ml-3" type="submit">Guardar</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
@endsection