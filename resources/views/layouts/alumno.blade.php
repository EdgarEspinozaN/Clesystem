<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @yield('title')
  {{-- CSS --}}
  <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('css/tabla3.css')}}">
  <link rel="stylesheet" href="{{asset('css/formulario1.css')}}">
  <link rel="stylesheet" href="{{asset('DataTable/datatables.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
</head>

<body>

{{-- Navbar Top --}}
<nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0">
    <img src="{{asset('img/bot.png')}}" width="30" height="30" class="d-inline-block align-top namecomp" alt="">
    Coordinación de Lenguas Extranjeras
  </a>
  <ul class="navbar-nav px-3">
    @guest
    @else
      <div>
        <li class="nav-item text-nowrap">
          <a class="nav-link btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </li>
        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
          {{csrf_field()}}
        </form>
      </div>
    @endif
  </ul>
</nav>
{{-- End Navbar Top --}}
{{-- Contenido --}}
<div class="container-fluid">
  <div class="row">
  {{-- SideBar --}}
    <nav class="col-md-2 col-sm-2 d-none d-sm-block sidebar">
      <div class="sidebar-sticky">
        <div class="sidebar-content d-flex flex-column justify-content-between">
          {{-- Acordion --}}
          <div class="accordion" id="accordionExample">
            <div class="card accordion-card">
              {{-- Collapse 1 --}}
              <div class="card-header card-head-per" id="headingOne">
                <button class="btn btn-block text-left btn-accordion" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <i class="fas fa-plus-circle icon"></i>
                  Curso actual
                </button>
              </div>

              <div id="collapseOne" class="collapse 
              {{(\Request::route()->getName() == 'calificacion.index' ||
              \Request::route()->getName() == 'horario.index')
              ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body card-body-per">
                  {{-- Items collapse 1 --}}
                  <ul class="nav flex-column">
                    <!-- nav item para calificacion -->
                    <li class="nav-item">
                      <a class="nav-link {{ (\Request::route()->getName() == 'calificacion.index') ? 'active' : '' }}" href="{{url('alumno/calificacion')}}">
                        <div class="menu-align">
                          <div class="icono"><i class="fas fa-users feather"></i></div>
                          <div class="texto"><span>Calificaciones</span></div>
                        </div>
                      </a>
                    </li>
                    <!-- nav item para horario -->
                    <li class="nva-item">
                      <a class="nav-link {{ (\Request::route()->getName() == 'horario.index') ? 'active' : '' }}" href="{{url('/alumno/horario')}}">
                        <div class="menu-align">
                          <div class="icono"><i class="fas fa-user-tie feather"></i></div>
                          <div class="texto"><span>Horario</span></div>
                        </div>
                      </a>
                    </li>
                  </ul>
                  {{-- Fin items collapse 1 --}}
                </div>
              </div>
              {{-- Fin Collapse 1 --}}

              {{-- Collapse 2 --}}
              <div class="card accordion-card">
                <div class="card-header card-head-per" id="headingTwo">
                    <button class="btn btn-block text-left btn-accordion collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <i class="fas fa-plus-circle icon"></i>
                      General
                    </button>
                </div>
                <div id="collapseTwo" class="collapse 
                {{(\Request::route()->getName() == 'calificaciongeneral.index' ||
                \Request::route()->getName() == 'alumno.profile')
                ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body card-body-per">
                    {{-- Items Collape 2 --}}
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'calificaciongeneral.index') ? 'active' : '' }}" href="{{url('/alumno/calificaciongeneral')}}">
                          <div class="menu-align">
                            <div class="icono"><i class="fas fa-users feather"></i></div>
                            <div class="texto">Calificaciones generales</div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'alumno.profile') ? 'active' : '' }}" href="{{url('/alumno/datospersonales')}}">
                          <div class="menu-align">
                            <div class="icono"><i class="fas fa-user-tie feather"></i></div>
                            <div class="texto">Datos personales</div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'AulasGeneral.index') ? 'active' : '' }}" href="{{url('/general/aulas')}}">
                          <div class="menu-align">
                            <div class="icono"><i class="fas fa-house-user feather"></i></div>
                            <div class="texto"><span>Aulas</span></div>
                          </div>
                        </a>
                      </li>
                    </ul>
                    {{-- Fin Items Collapse 2 --}}
                  </div>
                </div>
              </div>
              {{-- Fin Collapse 2 --}}

              

            </div>
          </div>
          {{-- Fin Acordion --}}

          {{-- Pie sidebar --}}
          @php
            use Carbon\Carbon;
            $año = Carbon::now();
          @endphp
          <div class="pie-cont">
            <div class="copy d-flex justify-content-center mb-3">
              <span>ITSRV <i class="far fa-copyright"></i> {{$año->year}}. </span>
            </div>
          </div>
          {{-- Fin pie sidebar --}}
        </div>
      </div>
    </nav>
    {{-- End SideBar --}}
    {{-- Main --}}
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 col-sm-10 px-4">
      @yield("content")
    </main>
    {{-- End Main --}}
  </div>
</div>
{{-- Fin Contenido --}}
{{-- Modales --}}
@yield("Alumno-Modal")
{{-- Fin Modales --}}
{{-- Scripts --}}
<script src="{{asset('jquery/jquery.slim.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('toast/tata.js')}}"></script>
<script src="{{asset('js/docente/modals.js')}}"></script>
<script src="{{asset('js/funciones.js')}}"></script>
@yield("Alumno-script")
@if (session('exito'))
<script>
  $(document).ready(function(){
    tata.success('Exito', '{{session('exito')}}',{
      position: "tr",
      duration: 3000,
      progress: true,
      holding: false,
      closeBtn: true,
      animate: "slide",
      onClose: function(){

      },
      onClick: function(){

      }
    });
  });
</script>  
@endif

@if ($errors->any())
<script>
  $(document).ready(function(){
    tata.error('Fallo',
     '@foreach ($errors->all() as $error) <li class="list-group">{{$error}}</li> @endforeach',{
      position: "tr",
      duration: 8000,
      progress: true,
      holding: false,
      closeBtn: true,
      animate: "slide",
      onClose: function(){

      },
      onClick: function(){

      }
    });
  });
</script>
@endif

</body>
</html>