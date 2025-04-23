<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Services\GoogleDriveService;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        $category = $request->categories;
        $order_by = $request->order_by;

        if($search || $category || $order_by){
            $books = Book::when($search, function ($query, $search) {
                        return $query->where([
                            ['name', 'like', '%'.$search.'%'],
                            //['categoria', $category]
                        ]);
                    })->when($request->order_by, function ($query, $orderBy) {
                        $allowedColumns = ['name', 'created_at'];
                        if (in_array($orderBy, $allowedColumns)) {
                            return $query->orderBy($orderBy);
                        }
                        return $query;
                    })->paginate(5);
        }else {
            $books = Book::paginate(5);
        }
        $categories = Category::all('name');
        return view('books', compact('books', 'categories'));
    }

    public function register() {
        return view('admin.book.register');
    }

    public function store(BookRequest $request) {

        if ($request->hasFile('book_photo')) {
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
            $requestPhoto = $request->file('book_photo');
            $path = 'assets/img/books';
            $fileDefault = 'default.png';
            $imageName = UploadService::upload($requestPhoto,$path,$fileDefault, $allowedExtensions);
        }

        $book = new Book();
        $gds = new GoogleDriveService();
        $book_path = $request->book->getPathName();
        $mimeType = mime_content_type($book_path);
        $book_drive = $gds->uploadFile($book_path, $request->title, $mimeType);
        $book->title = $request->title;
        $book->image_path = $imageName;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->pdf_book_url = $book_drive->webContentLink;
        $book->associate_course = 0;
        $book->create_by = Auth::id();
        $book->price = $request->price;
        // $book->pdf_book_url = 'teste.pdf';
        $book->save();

        return redirect()->back()->with('success', 'Livro registado e armazenado com sucesso');

    }
}
