{{-- resources/views/menu/index.blade.php --}}
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

<script>
    let cart = [];

    function addToCart(item) {
        cart.push(item);
        updateCartPanel();
        updateCartCount();
    }

    function updateCartPanel() {
        const cartPanel = document.querySelector('.cart-panel');
        cartPanel.innerHTML = cart.map(item => `<div>${item.name} - €${item.price}</div>`).join('');
    }

    function updateCartCount() {
        const cartCount = document.getElementById('cart-count');
        cartCount.textContent = cart.length;
    }

    function redirectToCheckout() {
        sessionStorage.setItem('cart', JSON.stringify(cart));
        window.location.href = '/menu/afrekenen';
    }
</script>

@endsection
