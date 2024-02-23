<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introvert Dining</title>

    <!-- Voeg de link naar je CSS-bestand toe -->
<<<<<<< Updated upstream
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/menu.css', 'resources/css/checkout.css'])
=======
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/menu.css'])
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/table.css'])
>>>>>>> Stashed changes
</head>
@include('layouts.header')

<body>
    <!-- Navigatiebalk -->
    <nav>
        <!-- Navigatielinks -->
    </nav>

    <!-- Hoofdinhoudssectie -->
    <div class="content">
        @yield('content')
    </div>

    @include('layouts.footer')
</body>
</html>
