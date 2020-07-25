{{-- vista de bienvenida para el administrador--}}
{{-- extiende de la plantilla admin --}}
@extends("layouts/admin")

@section('ContenidoAdmin')
	<style>
		.content .logos-icon{
			width: 500px;
		}
		.content .image1{
			width: 200px;
			height: 200px;
			background-color: #FF0000;
		}

		.content .image2{
			width: 200px;
			height: 200px;
			background-color: #00E4FF;
		}
		.content .welcome-text{
			color: #636b6f;
            font-size: 50px;
		}
		.content .about-text .head{
			color: #636b6f;
            font-size: 35px;
		}
		.content .about-text{
			color: #636b6f;
            font-size: 20px;
		}
	</style>

	<div class="content mt-4">
		<div class="logos-head d-flex justify-content-center">
			<div class="logos-icon d-flex justify-content-between">
				<div class="image1">
					
				</div>
				<div class="image2">
					
				</div>
			</div>
		</div>
		<div class="welcome-text d-flex justify-content-center mt-3">
			<div> Conect CLE </div>
		</div>
		<div class="about-text d-flex flex-column align-items-center mt-4">
			<div class="head">
				@php
					$user = Auth::user();
					$nombre = App\Admin::where('id_usuario_admin', $user->id_usuario)->get()->first();
				@endphp
				Bienvenido {{$nombre->persona->nombre." ".$nombre->persona->ape_pat." ".$nombre->persona->ape_mat}}
			</div>
			<div class="d-flex flex-column align-items-center mt-3">
				<div>Este es el sistema de gestion  para los cursos de la </div>
				<div>Coordinacion de lenguas extranjeras</div>
			</div>
			
		</div>
	</div>
@endsection