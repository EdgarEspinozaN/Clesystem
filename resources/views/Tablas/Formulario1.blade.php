{{-- formulario plantilla --}}
<div class="targeta">
	<div class="targeta-header d-flex flex-row justify-content-between align-items-center">
		<div>@yield("titulo-form")</div>
	</div>
	<div class="targeta-cont">
		<div class="configgen targeta d-flex justify-content-center">
			<form method="post" @yield("action-form") class="needs-validation form1" novalidate>			
				{{csrf_field()}}
				@yield("contenido-form")
			</form>
		</div>
	</div>
</div>