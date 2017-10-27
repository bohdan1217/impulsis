<?php

namespace App\Repositories;

use App\Author;

class AuthorRepository extends Repository {

    public function __construct(Author $author) {
        $this->model = $author;
    }

}

?>