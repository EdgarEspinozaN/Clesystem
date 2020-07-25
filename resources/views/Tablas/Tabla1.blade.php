{{-- plantilla tabla diseño 1 --}}
<style>
  .targeta-table {
    margin-top: 10px;
  }

  .targeta-table .targeta-table-header{
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .2);
  line-height: 2rem;
  font-size: 1.5rem;
  height: 60px;
  color: var(--texto-blanco);
  padding: 10px;
  border-radius: 10px;
  background-color: var(--color-user);
}

.targeta-table .targeta-table-cont{
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .2);
  margin-top: 8px;
  border-radius: 10px;
  background-color: #FFFFFF;
}

.targeta-table .btn-outline-per{
    color: #FFF;
    /*border-color: #FFF;*/
    background-color: #37A222;
    
  }

  .targeta-table .btn-outline-per:hover{
    background-color: #FFF;
    color: #000;
  }

</style>

<div class="targeta-table">
  <div class="targeta-table-header d-flex flex-row justify-content-between align-items-center">
    <div>@yield("Titulo-Tabla")</div>
    <div class="d-flex flex-row align-items-center justify-content-between">
      <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-per">Agregar</button>
    </div>
  </div>
  <div class="targeta-table-cont">
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