<div>
    @if ($allowed)
    <div class="container">
        @foreach ($categories as $category)
        <div class="category">
            <div class="category-header">
                <h2 id="{{ $category->name }}">{{ $category->name }}</h2>
            
            </div>
            <div class="items">
                @foreach ($category->menuItems as $item)
                <div class="item">
                    <img src="{{ $item->image }}" alt="{{ $item->name }}" class="menu-item-image">
                    <div class="item-info">
                        <div class="item-name">{{ $item->name }}</div>
                        <div class="item-description">{{ $item->description }}</div>
                        <div class="item-actions">
                            <div class="item-price">€{{ number_format($item->price, 2) }}</div>
                            <button class="add-item-btn" onclick="addToCart({{ json_encode($item) }})">&#43;</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    @else
    @unless($latitude && $longitude)
    @else
    <div class="error-message">
        <h2>Er ging iets mis..</h2>
        <h3>Controleer het volgende en probeer het opnieuw:</h3>
        <p>U bent minder dan 1 kilometer van het restaurant verwijderd.</p>
        <p>U heeft geen vpn of andere applicaties die de locatie van uw apparaat kunnen beïnvloeden.</p>
        <p>U heeft locatie ingeschakeld op uw telefoon en/of in de browser.</p>
    </div>
    @endunless
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    @this.setLocation(position.coords.latitude, position.coords.longitude);
                }, function(error) {
                    console.error("Error: " + error.message);
                });
            } else {
                alert("Geolocation wordt niet ondersteund door deze browser.");
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('saveTableIdToSessionStorage', event => {
                var tableId = event.detail[0].tableId;
                sessionStorage.setItem('tableId', tableId);
            });
        });
    </script>
    <div class="cart-panel">
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

        document.addEventListener('livewire:load', function() {
            Livewire.on('cartUpdated', () => {
                cart = JSON.parse(sessionStorage.getItem('cart')) || [];
                updateCartPanel();
                updateCartCount();
            });
        });
    </script>
</div>