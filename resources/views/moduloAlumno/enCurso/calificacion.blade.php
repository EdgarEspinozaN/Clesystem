@extends("layouts/alumno")

@section("title")
	<title>Calificaciones | CLE System</title>
@endsection

@php
	$detcursos = App\Det_Curso::all();
	use Carbon\Carbon;

	$user = Auth::user()->username;
	$alu = App\Alumno::where('id_alumno', $user)->get()->first();
	$alu_id_det = App\Det_Curso::where('id_alumno_det', $user)->value('id_alumno_det');
@endphp

@section('content')
	@section("Titulo-Tabla", "Calificaciones")

	@section("Abrir-Modal")
		style="display: none;"
	@endsection

	

	@section("Contenido-Tabla")
		
		
		@foreach ($detcursos as $detcurso) 
			@php
				$det = $detcurso->curso->estado;
				$alum = App\Det_curso::find($detcurso->id_det_curso)->alumno;
				
				if ($det == "Activo" && $alum == $alu) {
					
					$alumno = App\Det_curso::find($detcurso->id_det_curso)->alumno;

					$curso = App\Det_curso::find($detcurso->id_det_curso)->curso;

					$calificacion = App\Det_Curso::find($detcurso->id_det_curso)->calificacion;
			@endphp
			@section("Columnas-Tabla")
					<th scope="col">No. Control</th>
					<th scope="col">Alumno</th>
					<th scope="col">Curso</th>
					<th scope="col">Primer parcial</th>
					<th scope="col">Segundo parcial</th>
				@php
					if($calificacion->cal_1>=70 && $calificacion->cal_2>=70){
					}else{
				@endphp
						<th scope="col">Recuperacion</th>
				@php
					}
				@endphp
				<th scope="col">Estado</th>
			@endsection

			<tr>
				
				<th scope="row"> {{ $alumno->id_alumno }} </th>
				<td> {{ $alumno->persona->nombre . " " . $alumno->persona->ape_pat . " " . $alumno->persona->ape_mat }} </td>
				<td> {{ $curso->curso }} </td>
				<td> {{ $calificacion->cal_1 }} </td>
				<td> {{ $calificacion->cal_2 }} </td>

				@php
					if($calificacion->cal_1>=70 && $calificacion->cal_2>=70){
					}else{
				@endphp
					<td>{{$calificacion->recuperacion}}</td>
				@php
					}
				@endphp

				
				<td> {{ ($calificacion->cal_1>=70 && $calificacion->cal_2>=70) ? 'Aprobado' : 'Reprobado' }} </td>
            </tr>
            @php
            	}
            @endphp

		@endforeach

	@endsection

	@include("tablas.tabla3")

@endsection