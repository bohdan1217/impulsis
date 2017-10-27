<?php

namespace App\Http\Controllers\API;

use App\Book;
use App\Http\Controllers\SiteController;
use Illuminate\Http\Request;

class BookApiController extends SiteController
{
    //
    private $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function index()
    {
        $book = $this->book->paginate(3);
        return response()->json($book);
    }
}
