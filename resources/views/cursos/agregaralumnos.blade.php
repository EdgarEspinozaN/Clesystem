{{-- vista para agregar multiples alumnos a un curso --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	{{-- titulo de la tabla cursos --}}
	@section("Titulo-Tabla", "Agregar alumnos al curso $curso->curso")
	{{-- ocultar boton crear --}}
	@section("Abrir-Modal")
		style="display:none;"
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="cursos-agregar-table"
	@endsection
	{{-- boton para enviar el formulario --}}
	@section("OtherElement")
		<a class="btn btn-outline-per ml-2" onclick="SendForm('AddAlumnosForm', '#cursos-agregar-table')">Agregar</a>
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">Seleccionar</th>
		<th scope="col">No. Control</th>
		<th scope="col">Alumno</th>
		<th scope="col"></th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
			@foreach($alumnos as $alumno)
					{{-- ver si el alumno a sido registrado en un curso antes --}}
					@if ($alumno->detcurso == null)
						@php $mos="Mostrar"; @endphp
						{{-- Ver si el alumno a realizado pagos --}}
						@if($alumno->pago == null)
							@php $mos="Mostrar"; @endphp
						@else
							@foreach($alumno->pago->all()->where('id_alumno_pago', $alumno->id_alumno) as $pago)
								{{-- verificar si existe un pago sin relacion a un curso --}}
								@if(isset($pago->DetCurso))
				                	@php $mos="NoMostrar"; @endphp
				            	@else
				            		@php
				                		$mos="Mostrar";
				                		break;
				                	@endphp
		            			@endif
							@endforeach
							{{-- si hay pagos y existe un pago sin relaciona un pago mostrar alumno --}}
							@if($mos=="Mostrar")
								<tr>
									<td> <input type="checkbox" name="check[]" value="{{$alumno->id_alumno}}"></td>
									<td>{{$alumno->id_alumno}}</td>
									<td>{{$alumno->persona->nombre." ".$alumno->persona->ape_pat." ".$alumno->persona->ape_mat}}</td>
									<td></td>
								</tr>
							@endif
						@endif
					@else {{-- acciones si el alumno ha sido registrado a un curso antes --}}
						@php $mos="Mostrar"; @endphp
						@foreach($alumno->detcurso->all()->where('id_alumno_det', $alumno->id_alumno) as $estado)
							{{-- verificar si el alumno esta en un curso activo --}}
							@if($estado->curso->estado == "Activo") 
								@php $mos = "NoMostrar"; break; @endphp
							@else
								@php $mos = "Mostrar";  @endphp
							@endif
						@endforeach

						@foreach($alumno->pago->all()->where('id_alumno_pago', $alumno->id_alumno) as $pago)
							{{-- verificar si el laumno ha realizado el pago --}}
							@if(isset($pago->DetCurso))
			              	  @php $mos="NoMostrar"; @endphp
			           		@else
			            		@php
			                		$mos="Mostrar";
			                		break;
			               		@endphp
	            			@endif
						@endforeach
						@if($alumno->adeudo)
							@php $mos="NoMostrar";	@endphp
						@endif
						{{-- mostrar el alumno si toda ha sido correcto --}}
						@if($mos=="Mostrar")
							<tr>
								<td> <input type="checkbox" name="check[]" value="{{$alumno->id_alumno}}"></td>
								<td>{{$alumno->id_alumno}}</td>
								<td>{{$alumno->persona->nombre." ".$alumno->persona->ape_pat." ".$alumno->persona->ape_mat}}</td>
								<td></td>
							</tr>
						@endif
					@endif
				</tr>
			@endforeach
	@endsection
	{{-- formulario con los alumnos que se agregaran al curso --}}
	<form action="{{url('/cursos/addAlumnos')}}" method="post" id="AddAlumnosForm">
		{{ csrf_field() }}
		<input type="hidden" id="curso" name="curso" value="{{ $curso->id_curso }}">
		{{-- importacion de la tabla --}}
		@include("tablas.tabla3")
	</form>
@endsection