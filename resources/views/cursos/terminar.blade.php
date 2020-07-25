{{-- modal confirmar terminar el ciclo --}}
<div class="modal fade" id="ModalTerminarCursos" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalTerminarCursosLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="background-color: #FFC800;">
			<div class="modal-body">
					<div class="mb-2 d-flex justify-content-center">
						<h3>Confirmar</h3>
					</div>

					<div class="mb-3 d-flex justify-content-center">
						<h4>Desea terminar los cursos</h5>
					</div>

					<div class="mb-3 d-flex justify-content-center">
						<h6>Esta acción no se puede deshacer</h5>
					</div>

					<div class="mt-4 d-flex justify-content-center">
						<button class="btn btn-danger col-6" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-primary col-6 ml-3" type="button" href="{{url('/cursos/ciclo/terminar')}}">Aceptar</a>
					</div>
			</div>
		</div>
	</div>
</div>
