<div>
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success dismissible">
            {{ session('success') }}
            <span class="alert-close" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>

        @else
        <h2>Uw bestelling</h2>
        <div id="order-items" class="checkout order-items">
            <!-- Items zullen hier worden ingevoegd door het JavaScript-script hieronder -->
        </div>
        <div class="order-total">
            Totaal: €<span id="total-price">0.00</span>
        </div>
        <div>
            <button type="button" id="submitOrder">Plaats Bestelling</button>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('submitOrder').addEventListener('click', function() {
                    var cartItems = sessionStorage.getItem('cart');
                    var tableId = sessionStorage.getItem('tableId');
                    Livewire.dispatch('submitOrder', {
                        cartItems: cartItems,
                        tableId: tableId
                    });

                    sessionStorage.removeItem('cart');
                });
            });
        </script>
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
                        itemElement.classList.add('checkout-item');
                        itemElement.innerHTML = `
                    <div>${item.name} x ${item.quantity}</div>
                    <div>€${(item.price * item.quantity).toFixed(2)}</div>
                    <div class="checkout-buttons-container">
                    <button class="checkout-buttons subtract-quantity" data-index="${index}">-</button>
                    <button class="checkout-buttons add-quantity" data-index="${index}">+</button>
                    <button class="checkout-buttons remove-item" data-index="${index}">🗑</button>
                    </div>
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
                    itemElement.classList.add('checkout-item');
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
    </div>
    @endif

</div>