<div class="header">
    <div class="header-content">
        <img src="{{ asset('img/logo.svg') }}" alt="Logo" class="logo">
        <h1 class="menu-title">Menu</h1> <!-- Moved to the left side -->
        <!-- Note the use of the asset helper -->
         <div class="cart-container">
            <span class="shopping-cart-icon" onclick="redirectToCheckout()">&#128722;<span id="cart-count" class="cart-count">0</span></span>
            <div class="cart-panel"></div>
        </div>
    </div>
</div>