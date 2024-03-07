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
    public function apiTafelOverzicht()
    {
    $orders = Order::with(['table', 'orderedMenuItems.menuItem'])->get();
    return response()->json($orders);
    }

    public function showItems($orderId)
    {
        // Fetch the order and its items based on the $orderId
        $order = Order::findOrFail($orderId);

        // Pass the order and its items to the view
        return view('order_status', compact('order'));
    }

    public function setOrderReady($orderId)
    {
        // Find the order based on the $orderId
        $order = Order::findOrFail($orderId);

        // Update the order_status to "ready"
        $order->update(['order_status' => 'Ready']);

        // Redirect back or return a response as needed
        return redirect()->route('tafelOverzicht');
    }

    public function deleteOrder($orderId)
    {
        // Find the order based on the $orderId
        $order = Order::findOrFail($orderId);

        // Check if the order status is "Ready"
        if ($order->order_status === 'Ready') {
            // Delete the order
            $order->delete();
            return redirect()->route('tafelOverzicht');
        } else {
            // If the order is not in "Ready" status, you can handle it accordingly
            return redirect()->route('tafelOverzicht')->with('error', 'Order cannot be deleted. Status is not "Ready".');
        }
    }
    public function sendOut($orderId)
    {
        // Hier kun je de logica toevoegen om de bestelling te verzenden
        // bijvoorbeeld het updaten van de status van de bestelling naar "verzonden"
        Order::destroy($orderId);

        // Vervolgens kun je de gebruiker doorverwijzen naar een andere pagina of een bericht tonen
        return redirect()->route('tafelOverzicht')->with('success', 'Order has been sent out successfully.');
    }
}
