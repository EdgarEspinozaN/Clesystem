@extends("layouts/alumno")

@section("title")
	<title>Calificaciones generales | CLE System</title>
@endsection

@php
	$detcursos = App\Det_Curso::all();
	use Carbon\Carbon;

	$user = Auth::user()->username;
	$alu = App\Alumno::where('id_alumno', $user)->get()->first();
	$alu_id_det = App\Det_Curso::where('id_alumno_det', $user)->value('id_alumno_det');
	$promedio=0;
	$prom;
	$contador=0;
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

				$ciclo =$detcurso->curso->ciclo;
				
				if ($det == "Inactivo" && $alum == $alu) {
					
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
					<th scope="col">Promedio</th>
					<th scope="col">Estado</th>
					<th scope="col">Ciclo escolar</th>
			@endsection

			<tr>
				
				<th scope="row"> {{ $alumno->id_alumno }} </th>
				<td> {{ $alumno->persona->nombre . " " . $alumno->persona->ape_pat . " " . $alumno->persona->ape_mat }} </td>
				<td> {{ $curso->curso }} </td>
				<!-- Comparacion calificacion primer parcial es aprovatorio si no escribir la recuperacion -->
				<td> {{ ($calificacion->cal_1>=70) ? $calificacion->cal_1 : $calificacion->recuperacion.' *R' }} </td>
				<td> {{ ($calificacion->cal_2>=70) ? $calificacion->cal_2 : $calificacion->recuperacion.' *R' }} </td>

				@php
					if($calificacion->cal_1<70 && $calificacion->cal_2<70){
					@endphp
					<td> {{ $prom=0 }} </td>
					@php
					}else{
					if($calificacion->cal_1<70){
					@endphp
					<td> {{ $prom=(($calificacion->recuperacion + $calificacion->cal_2)/2) }} </td>
					@php
					}if($calificacion->cal_2<70){
					@endphp
					<td> {{ $prom=(($calificacion->cal_1 + $calificacion->recuperacion)/2) }} </td>
					@php
					}if($calificacion->cal_1>=70 && $calificacion->cal_2>=70){
					@endphp
					<td> {{ $prom=(($calificacion->cal_1 + $calificacion->cal_2)/2) }} </td>
					@php
					}}
				@endphp

				<!-- Estado -->
				<td> {{ (($calificacion->cal_1>=70 && $calificacion->cal_2>=70) || ($calificacion->cal_1>=70 && $calificacion->recuperacion>=70) || ($calificacion->cal_2>=70 && $calificacion->recuperacion>=70) ) ? 'Aprobado' : 'Reprobado' }} </td>

				<td> {{ $ciclo }} </td>
            </tr>
	        @php
	        	$contador=$contador+1;
	        	$promedio=($prom+$promedio);
	        	}
	        @endphp

		@endforeach
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<th colspan="2" scope="row" align="right">Calificacion general {{ " ".number_format(($promedio/$contador),2) }}</th>
		</tr>
		<tr>
		<td colspan="12" align="right">*R = Recuperacion</td>
		</tr>
	@endsection

	@include("tablas.tabla3")

@endsection