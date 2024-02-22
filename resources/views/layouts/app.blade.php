<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jouw App Titel</title>
    <!-- Voeg de link naar je CSS-bestand toe -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/menu.css', 'resources/css/checkout.css'])
</head>
<body>
    <!-- Navigatiebalk -->
    <nav>
        <!-- Navigatielinks -->
    </nav>

    <!-- Hoofdinhoudssectie -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Voettekst -->
    <footer>
        <!-- Voettekstinhoud -->
    </footer>
</body>
</html>
