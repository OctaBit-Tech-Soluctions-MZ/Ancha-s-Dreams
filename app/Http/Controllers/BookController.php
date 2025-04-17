<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function list() {
        return view('books');
    }

    public function register() {
        return view('admin.book.register');
    }
}
