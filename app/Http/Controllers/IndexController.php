<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Genre;
use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Repositories\GenreRepository;
use Illuminate\Http\Request;

use Validator;

class IndexController extends SiteController
{

    public function __construct(AuthorRepository $a_rep, BookRepository $b_rep, GenreRepository $g_rep)
    {
        parent::__construct();

        $this->a_rep = $a_rep;
        $this->b_rep = $b_rep;
        $this->g_rep = $g_rep;

        $this->template = env('THEME') . '.index';
    }


    public function index(Request $request)
    {

        $name = $request->input('book');


        $books = $this->getBooks($name);


        $content = view(env('THEME') . '.content_books')->with(['books' => $books, 'name' => $name])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        $this->keywords = "Library Impulsis";
        $this->meta_desc = "Library Impulsis";
        $this->title = "Library Impulsis";


        return $this->renderOutput();
    }




    public function getBooks($name)
    {
        if ($name) {
            $where = ['title',$name];
        } else {
            $where = FALSE;
        }

        $books = $this->b_rep->get(['id', 'title', 'author', 'genre', 'language', 'publication', 'image', 'isbn'], FALSE, TRUE, $where);

        return $books;
    }


    public function getAuthors()
    {
        $where = FALSE;
        $authors = $this->a_rep->get(['id', 'name'], FALSE, TRUE, $where);

        return $authors;
    }


    public function getGenres()
    {
        $where = FALSE;
        $genres = $this->g_rep->get(['id', 'name'], FALSE, TRUE, $where);

        return $genres;
    }


    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->except('_token');

            $validator = Validator::make($input, [
                'title' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->route('bookAdd')->withErrors($validator)->withInput();
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $input['image'] = $file->getClientOriginalName();

                $file->move(public_path() . '/assets/img', $input['image']);
            }

            $books = new Book();

            $books->fill($input);

            if ($books->save()) {
                return redirect('/')->with('status', 'Book create');
            }
        }

        $authors = $this->getAuthors();
        $genres = $this->getGenres();


        $content = view(env('THEME').'.content_book_add')->with(['authors' => $authors, 'genres' => $genres,])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        $this->keywords = "Create new book";
        $this->meta_desc = "Create new book";
        $this->title = "Create new book";

        return $this->renderOutput();

    }

    public function show($id = FALSE )
    {
        $book = $this->b_rep->one($id);


        $content = view(env('THEME').'.content_book_show')->with('book', $book)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        $old = $book->toArray();

        $this->keywords = "Book - ". $old['title'];
        $this->meta_desc = "Book - ". $old['title'];
        $this->title = "Book - ". $old['title'];

        return $this->renderOutput();

    }

    public function edit(Book $book, Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->except('_token');

            $validator = Validator::make($input, [
                'title' => 'required|max:255',
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('bookEdit', ['page' => $input['id']])
                    ->withErrors($validator);
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $file->move(public_path() . '/assets/img', $file->getClientOriginalName());
                $input['image'] = $file->getClientOriginalName();
            } else {
                $input['image'] = $input['old_image'];
            }

            unset($input['old_image']);

            $book->fill($input);

            if ($book->update()) {
                return redirect('/')->with('status', 'Book '.$input['title'].' updated');
            }
        }

        $authors = $this->getAuthors();
        $genres = $this->getGenres();

        $old = $book->toArray();


        $content = view(env('THEME').'.content_book_edit')->with(['authors' => $authors, 'genres' => $genres,'data' => $old])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        $this->keywords = "Edit book - " . $old['title'];
        $this->meta_desc = "Edit book - " . $old['title'];
        $this->title = "Edit book - " . $old['title'];

        return $this->renderOutput();

    }

}

