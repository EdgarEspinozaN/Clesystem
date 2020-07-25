{{-- vista cursos del docente --}}
{{-- extiende de la pantilla docente --}}
@extends("layouts.docente")
{{-- contenido --}}
@section("Docente-Main")
    <div class="col-12">
        {{-- titulo de la tabla de los cursos --}}
        @section("Titulo-Tabla", "Cursos")
        {{-- ocultar boton agregar --}}
        @section("Abrir-Modal")
            style="display:none;"
        @endsection
        {{-- columnas de las tablas --}}
        @section("Columnas-Tabla")
            <th scope="col">Curso</th>
            <th scope="col">Nivel</th>
            <th scope="col">Aula</th>
            <th scope="col">Dia</th>
            <th scope="col">Hora</th>
            <th scope="col">Acciones</th>
        @endsection
        {{-- contenido de la tabla --}}
        @section("Contenido-Tabla")
            @php 
                use Carbon\Carbon; 
                
            @endphp
            @foreach($cursos as $curso)
                @php
                    $hora1 = Carbon::createFromTimeString($curso->horario->hora_inicio);
                    $hora2 = Carbon::createFromTimeString($curso->horario->hora_fin);
                @endphp
                <tr>
                    <td>{{$curso->curso}}</td>
                    <td>{{$curso->nivel->nivel}}</td>
                    <td>{{$curso->aula->aula}}</td>
                    <td>{{$curso->horario->dia}}</td>
                    <td>{{$hora1->format('H:i')." - ".$hora2->format('H:i')}}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <div class="btn-group">
                                <button class="btn btn-outline-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item btn Ver" href="/docente/curso/{{$curso->id_curso}}"><i class="fas fa-eye"></i> Lista</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endsection
        {{-- importacion de la tabla --}}
        @include("Tablas.tabla3")
    </div>
@endsection