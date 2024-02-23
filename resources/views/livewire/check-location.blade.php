<div>
    @if ($allowed)
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
                        <button class="add-item-btn">&#43;</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    @else
    @unless($latitude && $longitude)
    <div class="table-instructions">
        <ul>
            <h2>Welkom bij ons restaurant!</h2>
            <h4>Om te beginnen, zet uw locatie aan en klik op de knop hieronder.</h4>
        </ul>
    </div>
    <!-- <div class="location-button-container">
        <button id="getLocation">Locatie ophalen</button>
    </div> -->
    @else
    <div class="error-message">
        <h2>Er ging iets mis..</h2>
        <h3>Controleer het volgende en probeer het opnieuw:</h3>
        <p>U bent minder dan 1 kilometer van het restaurant verwijderd.</p>
        <p>U heeft geen vpn of andere applicaties die de locatie van uw apparaat kunnen beïnvloeden.</p>
        <p>U heeft locatie ingeschakeld op uw telefoon en/of in de browser.</p>
    </div>
    <!-- <div class="location-button-container">
        <button id="getLocation">Opnieuw proberen</button>
    </div> -->
    @endunless
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    @this.setLocation(position.coords.latitude, position.coords.longitude);
                }, function(error) {
                    console.error("Error: " + error.message);
                    // Handle location error or show a message to the user
                });
            } else {
                alert("Geolocation wordt niet ondersteund door deze browser.");
            }
        });
    </script>


</div>