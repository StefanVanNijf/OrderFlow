{{-- resources/views/menu/afrekenen.blade.php --}}
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
<div class="container">
    <h2>Je bestelling</h2>
    <div id="order-items" class="order-items">
        <!-- Items zullen hier worden ingevoegd door het JavaScript-script hieronder -->
    </div>
    <div class="order-total">
        Totaal: €<span id="total-price">0.00</span>
    </div>
    <div class="checkout-button">
        <button onclick="location.href='/betalen'" type="button">Afrekenen</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const orderItemsContainer = document.getElementById('order-items');
        const totalPriceElement = document.getElementById('total-price');
        let totalPrice = 0;

        const cart = JSON.parse(sessionStorage.getItem('cart')) || [];
        cart.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.classList.add('item');
            itemElement.innerHTML = `
                <div>${item.name}</div>
                <div>€${parseFloat(item.price).toFixed(2)}</div>
            `;
            orderItemsContainer.appendChild(itemElement);
            totalPrice += parseFloat(item.price);
        });

        totalPriceElement.textContent = totalPrice.toFixed(2);
    });
</script>
@endsection
