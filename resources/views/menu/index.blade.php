{{-- resources/views/menu/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="header">
    <div class="header-content">
        <h1 class="menu-title">Menu</h1> <!-- Verplaatst naar de linkerzijde -->
        <span class="shopping-cart-icon">&#128722;</span> <!-- Unicode winkelwagen symbool, nu rechts -->
    </div>
    
</div>
<div class="qr-message">
        QR-code succesvol gescand! <!-- Het bericht in het midden van de header, stijl toegepast via CSS -->
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
                            <button class="add-item-btn">&#43;</button> <!-- Unicode plus symbool -->
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
@endsection
