<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>Dashboard Template · Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

  <!-- Favicons -->
  <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
  

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
  <!-- Custom styles for this template -->

</head>

<body>
  <nav class="navbar navbar-dark fixed-top  flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0"><img src="{{asset('img/bot.png')}}" width="30" height="30" class="d-inline-block align-top namecomp" alt=""> Coordinación de 
    Lenguas Extranjeras</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link " href="#">Sign out</a>
      </li>
    </ul>
  </nav>

   
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 col-sm-2 d-none d-sm-block sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ (\Request::route()->getName() == 'admin.index') ? 'active' : '' }}" href=" {{ url('/admin') }} ">
                <div class="menu-align">
                  <div class="icono"><i class="fas fa-home feather"></i></div>
                  <div class="texto"><span>Dashboard</span></div>
                </div>
              </a>
            </li>
            
          </ul>

          
          </div>
        </nav>



        <main role="main" class="col-md-10 ml-sm-auto col-lg-10 col-sm-10 px-4">
          
          {{-- Contenido de la pagina --}}
          @yield("ContenidoAdmin")
          {{-- oooooooooooooooooooooo --}}

        </main> 
      </div>
    </div>
    
    @yield("Admin-Modals")

    <script src="{{asset('jquery/jquery.slim.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/edit-modal.js')}}"></script>
    <script src="{{asset('toast/tata.js')}}"></script>
    
  @if (session('exito'))
    <script>
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
    </script>  
  @endif

  </body>
  </html>