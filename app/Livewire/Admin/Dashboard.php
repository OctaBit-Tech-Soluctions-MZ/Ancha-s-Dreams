<?php

namespace App\Livewire\Admin;

use App\Models\Book;
use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Dashboard extends Component
{
    public $courses,
            $books,
            $users,
            $orders;

    public function mount() {
        
        $this->courses = Course::count();
        $this->books = Book::count();
        $this->users = User::count();
        $this->orders = Order::where('status','pendente')->count();
    }
    
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
