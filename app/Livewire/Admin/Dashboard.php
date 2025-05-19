<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\OrderItemDeliveryService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Dashboard extends Component
{
    public $courses,
        $books,
        $users,
        $orders_count,
        $order_total,
        $pendente,
        $cancelado,
        $concluido;

    public function mount()
    {

        $this->courses = Course::count();
        $this->books = Product::where('type', 'Livro')->count();
        $this->users = User::count();
        $this->order_total = Order::count();
        $this->orders_count = Order::where('status', 'pendente')->count();
        $this->pendente = (Order::where('status', 'pendente')->count() * 100) / $this->order_total;
        $this->cancelado = (Order::where('status', 'cancelado')->count() * 100) / $this->order_total;
        $this->concluido = (Order::where('status', 'concluido')->count() * 100) / $this->order_total;
    }

    public function render()
    {
        $orders = Order::with('order_items.itemable', 'users')->paginate(10);
        return view('livewire.admin.dashboard', compact('orders'));
    }

    public function confirmOrder($id, $value, $message)
    {
        $order = Order::with('order_items.itemable')->findOrFail($id);
        if($value == 'concluido'){
            $service = new OrderItemDeliveryService();

            foreach ($order->order_items as $item) {
                $service->deliver($item, $order->user_id);
            }
        }

        $order->update(['status' => $value]);

        request()->session()->flash('success', $message);
    }
}
