@extends('layouts.app')

@section('content')

<div class="qr-message">
    QR-code succesvol gescand!
</div>

<div class="container">
    @foreach ($categories as $category)
        <div class="category">
            <div class="category-header">
                <h2>{{ $category->name }}</h2>
            </div>
            <div class="items">
                @foreach ($category->menuItems as $item)
                    <div class="item">
                        <div class="item-info">
                            <div class="item-name">{{ $item->name }}</div>
                            <div class="item-description">{{ $item->description }}</div>
                        </div>
                        <div class="item-actions">
                            <div class="item-price">€{{ number_format($item->price, 2) }}</div>
                            <button class="add-item-btn" onclick="addToCart({{ json_encode($item) }})">&#43;</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

<div class="footer">
    @terrasje 2024 rechten
</div>

<script>
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

    function addToCart(item) {
        const existingItem = cart.find(cartItem => cartItem.id === item.id);
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            item.quantity = 1;
            cart.push(item);
        }
        sessionStorage.setItem('cart', JSON.stringify(cart));
        updateCartPanel();
        updateCartCount();
    }

    function updateCartPanel() {
        const cartPanel = document.querySelector('.cart-panel');
        cartPanel.innerHTML = cart.map(item => `<div>${item.name} x ${item.quantity} - €${(item.price * item.quantity).toFixed(2)}</div>`).join('');
    }

    function updateCartCount() {
        const cartCount = document.getElementById('cart-count');
        cartCount.textContent = cart.reduce((total, item) => total + item.quantity, 0);
    }

    function redirectToCheckout() {
        sessionStorage.setItem('cart', JSON.stringify(cart));
        window.location.href = '/menu/afrekenen';
    }

    // Initial update on page load
    updateCartPanel();
    updateCartCount();
</script>
@endsection
