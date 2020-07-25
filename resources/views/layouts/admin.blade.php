<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  {{-- CSS --}}
  <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('css/tabla3.css')}}">
  <link rel="stylesheet" href="{{asset('css/formulario1.css')}}">
  <link rel="stylesheet" href="{{asset('DataTable/datatables.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body>
{{-- Navbar Top fixed--}}
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
                  En Curso
                </button>
              </div>

              <div id="collapseOne" class="collapse 
              {{(\Request::route()->getName() == 'alumnos.index' ||
              \Request::route()->getName() == 'alumnos.curso' ||
              \Request::route()->getName() == 'alumnos.multDel' ||
              \Request::route()->getName() == 'docentes.index' ||
              \Request::route()->getName() == 'docentes.lista' ||
              \Request::route()->getName() == 'docentes.deletevista' ||
              // \request::route()->getName() == 'aulas.index' || 
              // \Request::route()->getName() == 'horarios.index' ||
              \Request::route()->getName() == 'cursos.index' ||
              \Request::route()->getName() == 'cursos.show' ||
              \Request::route()->getName() == 'cursos.edit' ||
              \Request::route()->getName() == 'curso.cambio' ||
              \Request::route()->getName() == 'calificaciones.index' ||
              \Request::route()->getName() == 'pagos.index' ||
              \Request::route()->getName() == 'pagos.adeudos' ||
              \Request::route()->getName() == 'admin.index')
              ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body card-body-per">
                  {{-- Items collapse 1 --}}
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link {{ (\Request::route()->getName() == 'alumnos.index' || \Request::route()->getName() == 'alumnos.curso' || \Request::route()->getName() == 'alumnos.multDel') ? 'active' : '' }}" href="{{url('/alumnos')}}">
                        <div class="menu-align">
                          <div class="icono"><i class="fas fa-users feather"></i></div>
                          <div class="texto"><span>Alumnos</span></div>
                        </div>
                      </a>
                    </li>
                    <li class="nva-item">
                      <a class="nav-link {{ (\Request::route()->getName() == 'docentes.index' || \Request::route()->getName() == 'docentes.lista' || \Request::route()->getName() == 'docentes.deletevista') ? 'active' : '' }}" href="{{url('/docentes')}}">
                        <div class="menu-align">
                          <div class="icono"><i class="fas fa-user-tie feather"></i></div>
                          <div class="texto"><span>Docentes</span></div>
                        </div>
                      </a>
                    </li>
                    {{-- <li class="nav-item">
                      <a class="nav-link {{ (\Request::route()->getName() == 'aulas.index') ? 'active' : '' }}" href="{{url('/aulas')}}">
                        <div class="menu-align">
                          <div class="icono"><i class="fas fa-house-user feather"></i></div>
                          <div class="texto"><span>Aulas</span></div>
                        </div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ (\Request::route()->getName() == 'horarios.index') ? 'active' : '' }}" href="{{url('/horarios')}}">
                        <div class="menu-align">
                          <div class="icono"><i class="far fa-calendar-alt feather"></i></div>
                          <div class="texto"><span>Horarios</span></div>
                        </div>
                      </a>
                    </li> --}}
                    <li class="nav-item">
                      <a class="nav-link {{ (\Request::route()->getName() == 'cursos.index' || \Request::route()->getName() == 'cursos.show' || \Request::route()->getName() == 'cursos.edit' || \Request::route()->getName() == 'curso.cambio') ? 'active' : '' }}" href="{{url('/cursos')}}">
                        <div class="menu-align">
                          <div class="icono"><i class="fas fa-chalkboard-teacher feather"></i></div>
                          <div class="texto"><span>Cursos</span></div>
                        </div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ (\Request::route()->getName() == 'calificaciones.index') ? 'active' : '' }}" href="{{url('/calificaciones')}}">
                        <div class="menu-align">
                          <div class="icono"><i class="far fa-clipboard feather"></i></div>
                          <div class="texto"><span>Calificaciones</span></div>
                        </div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ (\Request::route()->getName() == 'pagos.index' || \Request::route()->getName() == 'pagos.adeudos') ? 'active' : '' }}" href="{{url('/pagos')}}">
                        <div class="menu-align">
                          <div class="icono"><i class="fas fa-money-check-alt feather"></i></div>
                          <div class="texto"><span>Pagos</span></div>
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
                {{(\Request::route()->getName() == 'AlumnosGeneral.index' ||
                \Request::route()->getName() == 'AlumnosGeneral.lista' ||
                \Request::route()->getName() == 'GenAlumnos.multDel' ||
                \Request::route()->getName() == 'DocentesGeneral.index' ||
                \Request::route()->getName() == 'DocentesGeneral.lista' ||
                \Request::route()->getName() == 'GenDocentes.multDel' ||
                //\Request::route()->getName() == 'AulasGeneral.index' ||
                //\Request::route()->getName() == 'HorariosGeneral.index' ||
                \Request::route()->getName() == 'PagosGeneral.index' ||
                \Request::route()->getName() == 'CursosGeneral.index' ||
                \Request::route()->getName() == 'CursosGeneral.lista' ||
                \Request::route()->getName() == 'aulas.index' || 
                \Request::route()->getName() == 'aulas.deletevista' ||
                \Request::route()->getName() == 'horarios.index' ||
                \Request::route()->getName() == 'horarios.deletevista' ||
                \Request::route()->getName() == 'niveles.index' ||
                \Request::route()->getName() == 'niveles.deletevista' ||
                \Request::route()->getName() == 'carreras.index' ||
                \Request::route()->getNAme() == 'eliminar.registros')
                ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body card-body-per">
                    {{-- Items Collape 2 --}}
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'AlumnosGeneral.index' || \Request::route()->getName() == 'AlumnosGeneral.lista' || \Request::route()->getName() == 'GenAlumnos.multDel') ? 'active' : '' }}" href="{{url('/general/alumnos')}}">
                          <div class="menu-align">
                            <div class="icono"><i class="fas fa-users feather"></i></div>
                            <div class="texto">Alumnos</div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'DocentesGeneral.index' || \Request::route()->getName() == 'DocentesGeneral.lista' || \Request::route()->getName() == 'GenDocentes.multDel') ? 'active' : '' }}" href="{{url('/general/docentes')}}">
                          <div class="menu-align">
                            <div class="icono"><i class="fas fa-user-tie feather"></i></div>
                            <div class="texto">Docentes</div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'CursosGeneral.index' || \Request::route()->getName() == 'CursosGeneral.lista') ? 'active' : '' }}" href="{{url('/general/cursos')}}">
                          <div class="menu-align">
                            <div class="icono"><i class="fas fa-chalkboard-teacher feather"></i></div>
                            <div class="texto"><span>Cursos</span></div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'PagosGeneral.index') ? 'active' : '' }}" href="{{url('/general/pagos')}}">
                          <div class="menu-align">
                            <div class="icono"><i class="fas fa-money-check-alt feather"></i></div>
                            <div class="texto"><span>Pagos</span></div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'aulas.index' || \Request::route()->getName() == 'aulas.deletevista') ? 'active' : '' }}" href="{{url('/general/aulas')}}">
                          <div class="menu-align">
                            <div class="icono"><i class="fas fa-house-user feather"></i></div>
                            <div class="texto"><span>Aulas</span></div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'horarios.index' || \Request::route()->getName() == 'horarios.deletevista') ? 'active' : '' }}" href="{{url('/general/horarios')}}">
                          <div class="menu-align">
                            <div class="icono"><i class="far fa-calendar-alt feather"></i></div>
                            <div class="texto"><span>Horarios</span></div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'niveles.index' || \Request::route()->getName() == 'niveles.deletevista') ? 'active' : '' }}" href="{{url('/general/niveles')}}">
                          <div class="menu-align">
                            <div class="icono"><i class="fas fa-signal feather"></i></div>
                            <div class="texto"><span>Niveles</span></div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'carreras.index' || \Request::route()->getName() == 'carreras.deletevista') ? 'active' : '' }}" href="{{url('/general/carreras')}}">
                          <div class="menu-align">
                            <div class="icono"><i class="fas fa-graduation-cap feather"></i></div>
                            <div class="texto"><span>Carreras</span></div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ (\Request::route()->getName() == 'eliminar.registros') ? 'active' : '' }}" href="{{route('eliminar.registros')}}">
                          <div class="menu-align">
                            <div class="icono"><i class="fas fa-times feather"></i></div>
                            <div class="texto"><span>Eliminar Registros</span></div>
                          </div>
                        </a>
                      </li>
                    </ul>
                    {{-- Fin Items Collapse 2 --}}
                  </div>
                </div>
              </div>
              {{-- Fin Collapse 2 --}}
              {{-- Collapse 3 --}}
              <div class="card accordion-card">
                <div class="card-header card-head-per" id="headingThree">
                  <button class="btn btn-block text-left btn-accordion" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <i class="fas fa-plus-circle icon"></i>
                    Configuración
                  </button>
                </div>

                <div id="collapseThree" class="collapse {{ (\Request::route()->getName() == 'config.index' ||
              \Request::route()->getName() == 'admin.edit')
              ? 'show' : '' }}" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body card-body-per">
                  {{-- Items Collapse 3 --}}
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link {{ (\Request::route()->getName() == 'config.index') ? 'active' : '' }}" href="{{url('/config')}}">
                        <div class="menu-align">
                          <div class="icono"><i class="fas fa-cogs feather"></i></div>
                          <div class="texto"><span>Config Cursos</span></div>
                        </div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ (\Request::route()->getName() == 'admin.edit') ? 'active' : '' }}" href="{{ url('/admin/admin/edit') }}">
                        <div class="menu-align">
                          <div class="icono"><i class="fas fa-user-secret feather"></i></div>
                          <div class="texto"><span>Perfil Admin</span></div>
                        </div>
                      </a>
                    </li>
                  </ul>
                  {{-- Fin Items Collapse 3 --}}
                </div>
              </div>
              </div>
              {{-- Fin Collapse 3 --}}
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
      @yield("ContenidoAdmin")
    </main>
    {{-- End Main --}}
  </div>
</div>
{{-- Fin Contenido --}}
{{-- Modales --}}
@yield("Admin-Modals")
{{-- Fin Modales --}}
{{-- Scripts --}}
<script src="{{asset('jquery/jquery.slim.min.js')}}"></script>
<script src="{{asset('DataTable/datatables.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

@if (count($errors) == 0)
  <script src="{{asset('js/edit-modal.js')}}"></script>
@else
  @if(isset($_GET['act']))
    @if($_GET['act']=="Add")
      @yield('ScriptOpenCreate')
    @elseif($_GET['act'] == "Update")
      @yield('ScriptOpenUpdate')
    @endif
  @endif
  <script src="{{asset('js/edit-modal.js')}}"></script>
@endif

<script src="{{asset('js/funciones.js')}}"></script>
<script src="{{asset('toast/tata.js')}}"></script>
<script src="{{asset('js/validation.js')}}"></script> 
<script src="{{asset('js/tablas.js')}}"></script>


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
{{-- End Script --}}
</body>
</html>