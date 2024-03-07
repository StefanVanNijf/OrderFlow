<div class="header">
    <div class="header-content">
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/logo.svg') }}" alt="Logo" class="logo">
        </a>
        <div class="cart-container">
            <span class="shopping-cart-icon" onclick="redirectToCheckout()">&#128722;<span id="cart-count" class="cart-count">0</span></span>
            <div class="cart-panel"></div>
        </div>
    </div>
</div>