<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class BestellingController extends Controller
{
    public function tafelOverzicht()
    {
        $orders = Order::with(['table', 'orderedMenuItems.menuItem'])
                        ->get();
    
        return view('tafel-overzicht', compact('orders'));
    }
}
