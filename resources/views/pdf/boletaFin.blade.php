{{-- HTML para el formato de boletas de cursos --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Boletas</title>	
</head>

<style>
	body{
		font-family: Helvetica;	
	}
	td {
		font-size: 10px;
		border-width: 2px 2px 2px 2px;
		border-style: solid;
		border-color: black;
		text-align: center;
		height: 20px;
		overflow: hidden;
		word-wrap: break-word;
	}
	h4 {
		padding: 0px;
		margin: 0px;
		margin-top: 1.5px;
		padding-bottom: 1.5px;
	}
	.page-break {
	    page-break-after: always;
	}
</style>

	<body>
		@php
			$count = 0;
			$break = count($cursos);
		@endphp

		@foreach ($cursos as $curso)
			@php 
				$detalles = App\Det_curso::where('id_curso_det', $curso->id_curso)->get();
			@endphp
			<h3>Boletas Curso {{ $curso->curso }}</h3>
			@foreach($detalles as $detalle)
			@php
				$alumno = $detalle->alumno;
				$nombre = $alumno->persona->nombre." ".$alumno->persona->ape_pat." ".$alumno->persona->ape_mat;
				$control = $alumno->id_alumno;
				$nivel = $curso->nivel->nivel;
				$docente = $curso->docente->persona->nombre." ".$curso->docente->persona->ape_pat." ".$curso->docente->persona->ape_mat;
				$periodo = $curso->ciclo;
				$cal1 = $detalle->calificacion->cal_1;
				$cal2 = $detalle->calificacion->cal_2;
				$recu = $detalle->calificacion->recuperacion;
				$promedio = ($cal1 + $cal2) / 2;
				if ($promedio < 70) {
					$promedio = ($promedio + $recu) / 2;
				}
				
				
			@endphp
			<table cellspacing="0" cellpadding="0" width="100%" style="border: 2px solid black; margin-bottom: 150px;">
				<tr>
					<td colspan="4" width="16.6%">TEC Logo</td>
					<td colspan="16" width="66.6%">
						<div style="padding-top: 3px; padding-bottom: 3px;">
							<h4>INSTITUTO TECNOLOGICO SUPERIOR DE RIOVERDE S.L.P.</h4>
							<h4>COORDINACION DE LENGUAS EXTRANJERAS</h4>
							<h4>Registro:TecNM-SEV-DECyaD-PCLE-11/17-ITSRV-29</h4>
							<h4>BOLETA DE CALIFICACIONES</h4>
						</div>
					</td>
					<td colspan="4" width="16.6%">ClE Logo</td>
				</tr>
				<tr bgcolor="#B8B8B8" style="font-weight: bold;">
					<td colspan="14">NOMBRE</td>
					<td colspan="8">NUMERO DE CONTROL</td>
					<td colspan="2">NIVEL</td>
				</tr>
				<tr>
					<td colspan="14">{{ $nombre }}</td>
					<td colspan="8">{{ $control }}</td>
					<td colspan="2">{{ $nivel }}</td>
				</tr>
				<tr bgcolor="#B8B8B8" style="font-weight: bold;">
					<td colspan="14">TEACHER</td>
					<td colspan="4">PERIODO</td>
					<td colspan="6">CALIFICACION</td>
				</tr>
				<tr>
					<td colspan="14">{{ $docente }}</td>
					<td colspan="4">{{ $periodo }}</td>
					<td colspan="6"></td>
				</tr>
				<tr>
					<td rowspan="4" colspan="18"></td>
					<td rowspan="1" colspan="6"></td>
				</tr>
				<tr>
					<td rowspan="1" colspan="6"></td>
				</tr>
				<tr>
					<td rowspan="1" colspan="6"></td>
				</tr>
				<tr>
					<td rowspan="1" colspan="6"></td>
				</tr>
				<tr>
					<td colspan="18" bgcolor="#B8B8B8" style="font-weight: bold;">SELLO DE LA COORDINACIÓN</td>
					<td colspan="6">{{ $promedio }}</td>
				</tr>
				<tr>
					<td colspan="24">
						<div style="height: 50px;">
							<div style="height: 22px;"></div>
							<div>_____________________________________________</div>
							<div> COORDINACION DE LENGUAS EXTRANJERAS </div>
						</div>
					</td>
				</tr>
			</table>
			@endforeach
			@php $count=$count+1; @endphp
			@if($count<$break)
				<div class="page-break"></div>
			@endif
		@endforeach
	</body>
	</html>