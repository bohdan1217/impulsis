<?php

namespace App\Repositories;

use App\Book;

class BookRepository extends Repository {

    public function __construct(Book $book) {
        $this->model = $book;
    }

}

?>