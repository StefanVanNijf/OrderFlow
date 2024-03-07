@extends('layouts.app')

@section('content')
    @livewire('tafel-overzicht')

    <script>
        function fetchTafels() {
            $.ajax({
                url: '/api/tafel-overzicht', // Je moet een API-route maken die deze data teruggeeft
                type: 'GET',
                success: function(data) {
                    // Verwerk en toon de gegevens op de pagina
                    // Bijvoorbeeld: $('#tafelsContainer').html(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Roep de functie regelmatig aan, bijvoorbeeld elke 5 seconden
        setInterval(fetchTafels, 5000);

    </script>
@endsection