<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Services\GoogleDriveService;
use App\Services\UploadService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function list() {
        return view('books');
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
        // $book->pdf_book_url = 'teste.pdf';
        $book->save();

        return redirect()->back()->with('success', 'Livro registado e armazenado com sucesso');

    }
}
