{{-- plantilla tabla diseño 4 --}}
<style>
  .targeta4{
    border-radius: 15px;
    position: relative;
    margin-top: 10px;
  }

  .targeta4 .targeta4-header{
    position: relative;
    z-index: 2;
    font-size: 1.5rem;
    height: 60px;
    color: var(--texto-blanco);
    padding: 10px;
    border-radius: 10px;
    background-color: var(--color-user);
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .2);
  }

  .targeta4 .targeta4-cont{
    margin-right: 30px;
    margin-left: 30px;
    padding-top: 30px;
    z-index: 1;
    position: relative;
    bottom: 25px; 
    border-radius: 10px;
    background-color: #FFFFFF;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .2);
  }

  .targeta4 .btn-outline-per{
    color: #FFF;
    /*border-color: #FFF;*/
    background-color: #37A222;
    
  }

  .targeta4 .btn-outline-per:hover{
    background-color: #FFF;
    color: #000;
  }
</style>

<div class="targeta4">
  <div class="targeta4-header d-flex flex-row justify-content-between align-items-center">
    <div>@yield("Titulo-Tabla")</div>
    <div class="d-flex flex-row align-items-center justify-content-between">
      <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-per">Agregar</button>
    </div>
  </div>
  <div class="targeta4-cont">
    <table class="table table-borderless table-hover">
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