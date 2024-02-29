@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($orders as $order)
        <div class="order">
            <h3>Tafel {{ $order->table->id }} - Status: {{ $order->order_status }}</h3>
            <ul>
                @foreach ($order->orderedMenuItems as $item)
                    <li>{{ $item->menuItem->name }} x {{ $item->quantity }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
@endsection
