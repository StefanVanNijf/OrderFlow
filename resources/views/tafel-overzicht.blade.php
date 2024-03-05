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

<style>




.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    background-color: #f0f0f0;
    padding: 20px;
    padding-top: 0; /* No padding at the top of the container */
}

.order {
    background-color: #9DBF9E; /* The specified green color */
    color: #ffffff; /* White text */
    margin: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: calc(33.333% - 20px); /* Adjust the width as necessary */
    box-sizing: border-box;
    border-radius: 5px; /* Rounded corners */
}

.order:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.order h3 {
    font-size: 1.2em;
    margin-bottom: 0.5em;
}

.order ul {
    list-style-type: none;
    padding: 0;
}

.order ul li {
    font-size: 1em;
    margin-bottom: 0.25em;
}


/* Add additional styles here for header and footer as per your existing layout */

</style>
@endsection
