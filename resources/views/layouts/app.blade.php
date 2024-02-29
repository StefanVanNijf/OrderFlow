<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Terras</title>
    <link rel="icon" href="{{ asset('img/logo.svg') }}" type="image/x-icon">


    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/menu.css', 'resources/css/checkout.css'])
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/table.css'])
    

</head>
@include('layouts.header')

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
