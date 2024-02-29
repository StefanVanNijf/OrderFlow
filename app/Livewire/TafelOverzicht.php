<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class TafelOverzicht extends Component
{
    public function render()
    {
        $orders = Order::with(['table', 'orderedMenuItems.menuItem'])->get();
        return view('livewire.tafel-overzicht', ['orders' => $orders]);
    }
}