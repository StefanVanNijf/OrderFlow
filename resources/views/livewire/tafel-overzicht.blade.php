<div wire:poll.5s class="container">

    @foreach ($orders as $order)
        <div class="order">
            <a href="{{ route('order.items', ['orderId' => $order->id]) }}">
                <h3>Tafel {{ $order->table->id }} - Status: {{ $order->order_status }}</h3>
            </a>
            <ul>
                @foreach ($order->orderedMenuItems as $item)
                    <li>
                        {{ $item->menuItem->name }} x {{ $item->quantity }}
                        @if ($order->order_status === 'Ready')
                            <form action="{{ route('delete.order', ['orderId' => $order->id]) }}" method="post" class="delete-form">
                                @csrf
                                @method('delete')
                                <button type="submit">Delete Order</button>
                            </form>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
