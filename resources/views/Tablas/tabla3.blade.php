{{-- plantilla tabla 3er diseño --}}
<div class="targeta3">
  <div class="targeta3-header d-flex flex-row justify-content-between align-items-center">
    <div class="d-flex flex-row">@yield("Titulo-Tabla")</div>
    <div class="d-flex flex-row justify-content-end head-option">
      {{-- <input id="btns" onkeyup="myFunction()" class="form-control ml-2 searchInput" type="text" placeholder="Search" aria-label="Search"> --}}
      @yield('OtherElement')
      <a class="btn btn-outline-per ml-2" data-toggle="modal" @yield('Abrir-Modal')>Agregar</a>
    </div>
  </div>
  <div class="targeta3-cont table-responsive">
    <div class="scroll-user">
      {{-- <div class="table-cont"> --}}
        <table class="table table-borderless table-hover" @yield("table-id")>
          <thead >
              <tr>
                @yield("Columnas-Tabla")
              </tr>
          </thead>
          {{-- <div> --}}
            <tbody id="tabla-3">
              @yield("Contenido-Tabla")
            </tbody>
          {{-- </div> --}}
        </table>
      {{-- </div> --}}
    </div>
  </div>
</div>
