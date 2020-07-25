{{-- vista cursos del docente --}}
{{-- extiende de la pantilla docente --}}
@extends("layouts.docente")
{{-- contenido --}}
@section("Docente-Main")
    <div class="col-12 d-flex justify-content-center">
        <div class="content content-home">
            <div class="row justify-content-center">
                <div class="title m-b-m">
                    Bienvenido 
                </div>
                <div class="title m-b-m">
                    Docente
                </div>
            </div>
                <div class="row user d-flex justify-content-center">
                    <div>¿Que deseas hacer?</div>
                </div>

                <div class="links d-flex justify-content-center">
                    <a href="{{route('docente.cursos')}}" class="mr-3">Cursos</a>
                    <a href="{{route('docente.profile')}}" class="ml-3">Usuario</a>
                </div>
            </div>
        </div>
@endsection