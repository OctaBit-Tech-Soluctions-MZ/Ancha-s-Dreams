<?php

namespace App\Livewire\Profile;

use App\Models\Order;
use App\Models\Order_item;
use App\Services\OrderItemDeliveryService;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
class OrderLivewire extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $orders = Order::with('order_items.itemable')->where('user_id', auth()->id())->orderBy('status')->paginate(5);
        return view('livewire.profile.order-livewire', compact('orders'));
    }
    public function cancelOrder($id, $value, $message)
    {
        $order = Order::with('order_items.itemable', 'users')->findOrFail($id);

        $order->update(['status' => $value]);

        request()->session()->flash('success', $message);
    }

    public function removeItem($id)
    {
        Order_item::findOrFail($id)->delete();
        return request()->session()->flash('success', 'Item Removido com sucesso');
    }
}
