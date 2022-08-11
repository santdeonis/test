<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Book;

class AdminController extends Controller
{
    public function index()
    {
      return view('admin.admin');
    }

    public function genresList()
    {
      $genres = Genre::all();
      return view('admin.genres_list', compact('genres'));
    }

    public function authorsList()
    {
      $authors = Author::all();
      return view('admin.authors_list', compact('authors'));
    }

    public function booksList()
    {
      $books = Book::all();
      return view('admin.books_list', compact('books'));
    }
}
