// JavaScript para interactuar con los brackets
document.addEventListener('DOMContentLoaded', function() {
    var bracketsContainer = document.querySelector('.brackets-container');

    // Función para generar los enfrentamientos en los brackets
    function generateBrackets(rounds) {
        bracketsContainer.innerHTML = ''; // Limpiar contenido previo

        rounds.forEach(function(round, roundIndex) {
            var roundDiv = document.createElement('div');
            roundDiv.classList.add('round');

            round.forEach(function(matchup) {
                var matchupDiv = document.createElement('div');
                matchupDiv.classList.add('matchup');
                matchupDiv.textContent = matchup.team1 + ' vs ' + matchup.team2;

                matchupDiv.addEventListener('click', function() {
                    // Aquí puedes implementar la lógica para manejar el clic en el enfrentamiento
                    // Por ejemplo, mostrar un cuadro de diálogo para ingresar el resultado
                });

                roundDiv.appendChild(matchupDiv);
            });

            bracketsContainer.appendChild(roundDiv);
        });
    }

    // Llama a la función para generar los brackets con los datos proporcionados
    generateBrackets(rounds);
});
