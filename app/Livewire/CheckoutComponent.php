<?php

namespace App\Livewire;

use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderMenuItems;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CheckoutComponent extends Component
{
    protected $listeners = ['submitOrder' => 'submitOrder'];

    public function submitOrder($cartItems, $tableId)
    {
        $MenuItemsArray = json_decode($cartItems, true);
        $orderedItemsDetails = [];

        DB::transaction(function () use ($MenuItemsArray, $tableId, &$orderedItemsDetails) {
            // Create a new Order
            $order = new Order();
            $order->table_id = $tableId;
            $order->order_status = 'pending';
            $order->save(); // Save to get the ID for foreign key

            foreach ($MenuItemsArray as $menuItem) {
                // Create and save ordered menu items for the order
                $orderedMenuItem = new OrderMenuItems();
                $orderedMenuItem->menu_item_id = $menuItem['id'];
                $orderedMenuItem->quantity = $menuItem['quantity'];
                $orderedMenuItem->status = 'processing';
                $orderedMenuItem->order_id = $order->id;
                $orderedMenuItem->save();

                // Fetch the menu item's name using the relationship defined in the MenuItem model
                $menuItemName = MenuItem::find($menuItem['id'])->name;
                $orderedItemsDetails[] = "{$menuItemName} x {$menuItem['quantity']}";
            }
        });

        // Add ordered items to the session
        session()->flash('orderedItems', $orderedItemsDetails);

        return redirect()->back()->with('success', 'Bestelling geplaatst!');
    }
}
