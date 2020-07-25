<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/docente.css')}}">
    <link rel="stylesheet" href="{{asset('css/tabla3.css')}}">
</head>
<body>
    @auth
    @php
    $user = Auth::user()->id_usuario;
    $docente = App\Docente::where('id_usuario_D', $user)->get()->first();
    @endphp 
    @endauth
    {{-- navbar fixed --}}
    <nav class="navbar navbar-dark justify-content-end">
        <a class="navbar-brand">Coordinción de lenguas extranjeras</a>
        <div class="ml-auto mr-1 user-name">{{$docente->persona->nombre." ".$docente->persona->ape_pat." ".$docente->persona->ape_mat}}</div>
        <div class="flex-grow-0" id="navbarSupportedContent">
            <div class="dropdown">
              <button class="btn btn-outline-light dropdown-toggle drop-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                  <a href="{{route('docente.cursos')}}" class="dropdown-item {{(\Request::route()->getName() == 'docente.cursos' || \Request::route()->getName() == 'docente.curso.lista') ? 'active' : ''}}">{{__('Cursos')}}</a>
                    <a class="dropdown-item {{(\Request::route()->getName() == 'docente.profile') ? 'active' : ''}}" href="{{ route('docente.profile') }}">{{ __('Perfil') }}</a>
                    @auth
                        <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth
                </div>
        </div>
    </div>
</nav>
{{-- end navbar fixed --}}
{{-- contenido  --}}
<main role="main">
    @yield("Docente-Main")
</main>
{{-- final del contenido --}}
{{-- modales --}}
@yield("Docente-Modal")
{{-- final modales --}}
{{-- scripts --}}
<script src="{{asset('jquery/jquery.slim.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('toast/tata.js')}}"></script>
<script src="{{asset('js/docente/modals.js')}}"></script>
<script src="{{asset('js/funciones.js')}}"></script>
@yield("Docente-script")
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
{{-- end scripts --}}
</body>
</html>