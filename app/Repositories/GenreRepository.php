<?php

namespace App\Repositories;

use App\Genre;

class GenreRepository extends Repository {

    public function __construct(Genre $genre) {
        $this->model = $genre;
    }

}

?>