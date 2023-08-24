@extends('layout\app')

@section('content')
<div>
    <h1 class="text-center">Crear Equipo</h1>
    <div class="container d-flex justify-content-center">
        @if ($equiposRegistrados < 8)
        <form method="post" action="{{route("equipos.store")}}" class="w-50">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="nombre" id="nombre" class="form-control">
                <label for="nombre">nombre del Equipo</label>
            </div>
            <br>
            <div class="form-floating mb-3">
                <input type="text" name="programa" id="programa" class="form-control">
                <label for="programa" class="label-floating">Programa de formación</label>
            </div>
            <br>
            <div class="form-floating mb-3">
                <select id="escudo" name="escudo" class="form-select"  onchange="img()">
                    @foreach($imagenes as $escudo => $imagenes)
                    <option value="{{ $escudo }}">{{ $imagenes }}</option>
                    @endforeach
                </select>
                <label for="escudo">escudos</label>
            </div>
            <br>
            <img src="{{$escudo}}" alt="" id="imagen">
            <div class="text-center">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
        @else
        <p>Ya se han registrado 8 equipos.</p>
        @endif
    </div>
</div>
@if ($equiposRegistrados == 8)
<div class="container d-flex justify-content-center">
    <div>
        <a href="{{ route('equipos.sorteo') }}" class="btn btn-success">Realizar Sorteo</a>
    </div>
</div>
@endif
<script src="{{ asset('static/js/app.js') }}"></script>
@endsection



