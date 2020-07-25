{{-- vista de adeudos --}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")
{{-- contenido --}}
@section("ContenidoAdmin")
	{{-- titulo de la tabla adeudos --}}
	@section("Titulo-Tabla", "Lista de Adeudos")
	{{-- ocultar boton agregar --}}
	@section("Abrir-Modal")
		style="display: none;"
	@endsection

	@section("OtherElement")
		
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="pagos-adeudos-table"
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">Folio</th>
		<th scope="col">No. Control</th>
		<th scope="col">Alumno</th>
		<th scope="col">cantidad</th>
		<th scope="col">Acción</th>
	@endsection
	{{-- columnas de la tabla --}}
	@section("Contenido-Tabla")
		@foreach ($adeudos as $adeudo)
		@php
			$alumno = App\Alumno::find($adeudo->alumno_id);
		@endphp
			<tr>
				<td>{{$adeudo->folio}}</td>
				<td>{{$adeudo->alumno_id}}</td>
				<td>{{$alumno->persona->nombre." ".$alumno->persona->ape_pat." ".$alumno->persona->ape_mat}}</td>
				<td>{{$adeudo->cantidad}}</td>
				<td>
					<div class="d-flex justify-content-center">
					<div class="btn-group">
						<button class="btn btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopoup="true" aria-expanded="false"></button>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item Agregar btn" data-toggle="modal" data-target="#ModalPagoAdeudo" data-folio="{{$adeudo->folio}}" data-alumno="{{$adeudo->alumno_id}}" data-id="{{$adeudo->id}}" data-nombre="{{$adeudo->alumno->persona->nombre." ".$adeudo->alumno->persona->ape_pat." ".$adeudo->alumno->persona->ape_mat}}"><i class="fas fa-money-check-alt"></i> Pagar</a>
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
{{-- importacion de los modales --}}
@section("Admin-Modals")
	@include("pagos.pagoadeudo")
@endsection