@extends('layouts.app')

@section('content')



<section id="overons">
    <h2>Over Ons</h2>
    <p>Kom meer te weten over onze passie voor koken en onze missie om unieke smaken te leveren.</p>
</section>

<section id="menu">
    <h2>Ons Menu</h2>
    <div class="menu-items">
        <!-- Dynamische menukaart komt hier -->
    </div>
</section>

<section id="contact">
    <h2>Contact</h2>
    <p>Vind ons hier of neem contact op voor meer informatie.</p>
    <!-- Optioneel: interactieve kaart -->
</section>

<script>
// JavaScript voor interactieve galerij (zeer basisvoorbeeld)
document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelector('.menu-items');
    fetch('/api/menu')
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                const div = document.createElement('div');
                div.className = 'menu-item';
                div.innerHTML = `
                    <h3>${item.name}</h3>
                    <p>€${item.price}</p>
                    <div class="item-description">${item.description}</div>
                `;
                // Voeg hier eventueel een animatie of interactie toe
                div.addEventListener('mouseenter', function() {
                    this.querySelector('.item-description').style.display = 'block';
                });
                div.addEventListener('mouseleave', function() {
                    this.querySelector('.item-description').style.display = 'none';
                });

                menuItems.appendChild(div);
            });
        });
});


</script>

@endsection
