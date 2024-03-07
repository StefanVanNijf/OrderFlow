{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="home-container">
    <!-- Hero section met achtergrondafbeelding -->
    <section class="hero-section" style="background-image: url('{{ asset('img/home.webp') }}');">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1>A Premium And Authentic Experience</h1>
                <p>Geniet van onze unieke sfeer en excellente service.</p>
                <a href="#qr-instructions" class="btn btn-primary">Hoe te bestellen</a>
            </div>
        </div>
    </section>

    <!-- Instructies voor QR-code -->
    <section id="qr-instructions" class="qr-instructions">
        <div class="qr-instructions-content">
            <h2>Scan en Bestel</h2>
            <p>Scan de QR-code op uw tafel om te bestellen.</p>
            <img src="{{ asset('img/qr.jpg') }}" alt="QR Code Instructies" class="qr-code-instruction-image">
            <!-- Voeg meer instructies of stappen hier toe indien nodig -->
        </div>
    </section>
</div>
@endsection

