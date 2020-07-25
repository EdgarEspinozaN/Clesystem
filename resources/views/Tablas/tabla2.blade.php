{{-- plantilla tabla diseño 2 --}}
<style>
  .targeta2 {
    background-color: #FFFFFF;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .2);
    margin-top: 10px;
  }

  .targeta2 .targeta2-header{
    line-height: 2rem;
    font-size: 1.5rem;
    height: 60px;
    color: var(--texto-blanco);
    padding: 10px;
    border-radius: 10px;
    background-color: var(--color-user);
  }
  .targeta2 .targeta2-cont{
    margin-top: 8px;
    border-radius: 10px;
    background-color: #FFFFFF;
  }

  .targeta2 .btn-outline-per{
    color: #FFF;
    /*border-color: #FFF;*/
    background-color: #37A222;
    
  }

  .targeta2 .btn-outline-per:hover{
    background-color: #FFF;
    color: #000;
  }
</style>

<div class="targeta2">
  <div class="targeta2-header d-flex flex-row justify-content-between align-items-center">
    <div>@yield("Titulo-Tabla")</div>
    <div class="d-flex flex-row align-items-center justify-content-between">
      <input class="form-control mr-2" type="Search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-per">Agregar</button>
    </div>
  </div>
  <div class="targeta2-cont">
    <table class="table table-borderless table-hover ">
      <thead>
        <tr>
          @yield("Columnas-Tabla")
        </tr>
      </thead>
      <tbody>
        @yield("Contenido-Tabla")
      </tbody>
    </table>
  </div>
</div>