<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CLE Login</title>
  {{-- Styles --}}
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
  <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">

</head>
<body>
  {{-- contenido --}}
  <div class="login-form col-md-6 col-lg-4 col-sm-8 col-10">
    @yield("login-content")
  </div>
  {{-- fin contenido --}}
  {{-- scripts --}}
  <script src="{{asset('jquery/jquery.min.js')}}"></script>
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script> 
  <script src="{{asset('js/validation.js')}}"></script> 
  <script src="{{asset('js/funciones.js')}}"></script>
  {{-- end scripts --}}
</body>
</html> 