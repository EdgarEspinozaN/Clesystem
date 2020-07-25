@extends("layouts/alumno")

@section("title")
	<title>Horario | CLE System</title>
@endsection

@php
	$detcursos = App\Det_Curso::all();
	use Carbon\Carbon;
@endphp

@section("content")
	@section("Titulo-Tabla", "Calificaciones")

	@section("Abrir-Modal")
		style="display: none;"
	@endsection

	@section("Contenido-Tabla")
		
		
		@foreach ($detcursos as $detcurso) 
			@php
				$det = $detcurso->curso->estado;
				$alum = App\Det_curso::find($detcurso->id_det_curso)->alumno;
				
				$user = Auth::user()->id_usuario;
				$alu = App\Alumno::where('id_usuario_A', $user)->get()->first();
					
				
				if ($det == "Activo" && $alum == $alu) {
					$curso = App\Det_curso::find($detcurso->id_det_curso)->curso;
					$calificacion = App\Det_Curso::find($detcurso->id_det_curso)->calificacion;
					$hora1 = Carbon::createFromTimeString($curso->horario->hora_inicio);
					$hora2 = Carbon::createFromTimeString($curso->horario->hora_fin);
					$aulas = App\Curso::find($curso->id_curso)->aula;
			@endphp
			@section("Columnas-Tabla")
				
				<th scope="col">Curso</th>
				<th scope="col">Docente</th>
				<th scope="col">Horario</th>
				<th scope="col">Aula</th>
			@endsection

			<tr>
				<td> {{ $curso->curso }} </td>
				<td> {{ $curso->docente->persona->nombre . " " . $curso->docente->persona->ape_pat . " " . $curso->docente->persona->ape_mat }} </td>
				<td> {{ $curso->horario->dia . " " . $hora1->format('H:i') . " - " . $hora2->format('H:i') }} </td>
				<td> {{ $aulas->aula }} </td>
            </tr>
            @php
            	}
            @endphp

		@endforeach

	@endsection

	@include("tablas.tabla3")
	
@endsection