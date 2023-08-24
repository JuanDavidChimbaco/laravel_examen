@extends('layout\app')

@section('content')
<link rel="stylesheet" href="{{ asset('static/css/jquery.bracket.min.css') }}">
<div class="container">
        <h2 class="text-center">Enfrentamientos del Sorteo</h2>
    <br>
    <div class="row">

        <div class="tournament-container"></div>

        @foreach ($torneoData['teams'] as $index => $matchup)
        <div class="matchup">
            <span>{{ $matchup[0] }}</span>
            <input type="number" class="result-input" data-match-index="{{ $index }}" data-result-index="0">
            VS
            <input type="number" class="result-input" data-match-index="{{ $index }}" data-result-index="1">
            <span>{{ $matchup[1] }}</span>
        </div>
    @endforeach
    <script src="{{ asset('static/js/jquery.bracket.min.js') }}"></script>
    <script>
        var torneoData = {!! json_encode($torneoData) !!};

        // Inicializar el torneo en el contenedor
        var tournament;

        function initializeTournament() {
            tournament = $('.tournament-container').bracket({
                init: torneoData
            });
        }

        initializeTournament();

        // Escuchar eventos de cambio en los inputs de resultados
        $('.result-input').on('input', function () {
            var matchIndex = $(this).data('match-index');
            var resultIndex = $(this).data('result-index');
            var newValue = $(this).val();

            // Actualizar el resultado en la estructura del torneo
            torneoData.results[matchIndex][0][resultIndex] = parseInt(newValue) || null;

            $('.tournament-container').empty();
                tournament = $('.tournament-container').bracket({
            init: torneoData
        });
        });
    </script>

</div>
</div>
@endsection
