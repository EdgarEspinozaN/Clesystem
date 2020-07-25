{{-- vista de pagos del apartado general --}}
{{-- extiende de la plantila admin --}}
@extends("layouts/admin")

@section("ContenidoAdmin")
	{{-- titulo de la tabla --}}
	@section("Titulo-Tabla", "Pagos")
	{{-- ocultar boton crear --}}
	@section("Abrir-Modal")
		style="display: none;"
	@endsection
	{{-- id de la tabla --}}
	@section("table-id")
		id="pagos-general-index-table"
	@endsection
	{{-- columnas de la tabla --}}
	@section("Columnas-Tabla")
		<th scope="col">Folio</th>
		<th scope="col">Alumno</th>
		<th scope="col">Nivel</th>
		<th scope="col">Pago 1</th>
		<th scope="col">Pago 2</th>
		<th scope="col">Pago 3</th>
		<th scope="col">Acciones</th>
	@endsection
	{{-- contenido de la tabla --}}
	@section("Contenido-Tabla")
		@foreach ($pagos as $pago)
			@if(isset($pago->DetCurso))
				<tr>
					<td>{{ $pago->folio }}</td>
					<td>{{ $pago->alumno->persona->nombre." ".$pago->alumno->persona->ape_pat." ".$pago->alumno->persona->ape_mat }}</td>
					<td>{{ $pago->DetCurso->curso->nivel->nivel }}</td>
					<td>{{ $pago->pago_1 }}</td>
					<td>{{ $pago->pago_2 }}</td>
					<td>{{ $pago->pago_3 }}</td>
					<td >
						<div class="d-flex justify-content-center">
						<div class="btn-group">
							<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu dropdoen-menu-right">
							<a class="dropdown-item btn Editar" data-toggle="modal" data-target="#ModalPagosEdit" data-id="{{$pago->id_pago}}" data-folio="{{$pago->folio}}" data-pago1="{{$pago->pago_1}}" data-pago2="{{$pago->pago_2}}" data-pago3="{{$pago->pago_3}}"><i class="fas fa-pen"></i> Pagos </a>
							</div>
						</div>
						</div>
					</td>
				</tr>
			@else
				<tr>
					<td>{{ $pago->folio }}</td>
					<td>{{ $pago->alumno->persona->nombre." ".$pago->alumno->persona->ape_pat." ".$pago->alumno->persona->ape_mat }}</td>
					<td>N/A</td>
					<td>{{ $pago->pago_1 }}</td>
					<td>{{ $pago->pago_2 }}</td>
					<td>{{ $pago->pago_3 }}</td>
					<td>
						<div class="d-flex justify-content-center">
						<div class="btn-group">
							<button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu dropdoen-menu-right">
							<a class="dropdown-item btn Editar" data-toggle="modal" data-target="#ModalPagosEdit" data-id="{{$pago->id_pago}}" data-folio="{{$pago->folio}}" data-pago1="{{$pago->pago_1}}" data-pago2="{{$pago->pago_2}}" data-pago3="{{$pago->pago_3}}"><i class="fas fa-pen"></i> Pagos</a>
							</div>
						</div>
						</div>
					</td>
				</tr>
			@endif			
		@endforeach

	@endsection	
	{{-- importacionde la tabla --}}
	@include("tablas.tabla3")

@endsection
{{-- importacion de los modales --}}
@section("Admin-Modals")
	@include("AdminGeneral.pagos.edit");
@endsection
