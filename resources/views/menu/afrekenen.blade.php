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
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    updateOrderItems();

    function updateOrderItems() {
        orderItemsContainer.innerHTML = ''; // Clear current items
        let totalPrice = 0;

        cart.forEach((item, index) => {
            const itemElement = document.createElement('div');
            itemElement.classList.add('item');
            itemElement.innerHTML = `
                <div>${item.name} x ${item.quantity}</div>
                <div>€${(item.price * item.quantity).toFixed(2)}</div>
                <button class="subtract-quantity" data-index="${index}">-</button>
                <button class="add-quantity" data-index="${index}">+</button>
                <button class="remove-item" data-index="${index}">🗑</button>
            `;
            orderItemsContainer.appendChild(itemElement);
            totalPrice += item.price * item.quantity;
        });

        totalPriceElement.textContent = totalPrice.toFixed(2);
    }
});

document.addEventListener('click', function(event) {
    if (event.target.matches('.add-quantity')) {
        changeItemQuantity(parseInt(event.target.dataset.index), 1);
    } else if (event.target.matches('.subtract-quantity')) {
        changeItemQuantity(parseInt(event.target.dataset.index), -1);
    } else if (event.target.matches('.remove-item')) {
        removeItem(parseInt(event.target.dataset.index));
    }
});

function changeItemQuantity(index, delta) {
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    if (cart[index].quantity + delta > 0) {
        cart[index].quantity += delta;
    } else {
        cart.splice(index, 1); // Remove the item if the quantity would become 0
    }
    sessionStorage.setItem('cart', JSON.stringify(cart));
    updateOrderItems();
}

function removeItem(index) {
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    cart.splice(index, 1);
    sessionStorage.setItem('cart', JSON.stringify(cart));
    updateOrderItems();
}

function updateOrderItems() {
    const orderItemsContainer = document.getElementById('order-items');
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    orderItemsContainer.innerHTML = ''; // Clear current items
    let totalPrice = 0;

    cart.forEach((item, index) => {
        const itemElement = document.createElement('div');
        itemElement.classList.add('item');
        itemElement.innerHTML = `
            <div>${item.name} x ${item.quantity}</div>
            <div>€${(item.price * item.quantity).toFixed(2)}</div>
            <button class="subtract-quantity" data-index="${index}">-</button>
            <button class="add-quantity" data-index="${index}">+</button>
            <button class="remove-item" data-index="${index}">🗑</button>
        `;
        orderItemsContainer.appendChild(itemElement);
        totalPrice += item.price * item.quantity;
    });

    const totalPriceElement = document.getElementById('total-price');
    totalPriceElement.textContent = totalPrice.toFixed(2);
}
</script>
@endsection

