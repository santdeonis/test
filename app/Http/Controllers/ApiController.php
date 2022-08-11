<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Book;


class ApiController extends Controller
{
    public function bookIndex()
    {
      $books = Book::leftJoin('authors', 'books.author_id', '=', 'authors.id')
      ->select('books.id', 'books.name', 'authors.name as author_name')
      ->get();
      return response()->json($books);
    }

    public function bookShow(Book $book)
    {
      return response()->json($book);
    }

    public function bookUpdate(Book $book)
    {
      $data = request()->validate([
          'name' => 'string',
          'author_id' => 'nullable|exists:authors,id',
        ]);
      $book->update($data);
      return response()->json(null, 200);
    }

    public function bookDestroy(Book $book)
    {
      $book->delete();
      return response()->json(null, 200);
    }

    public function authorIndex()
    {
      $authors = Author::select('id', 'name')
      ->get();
      foreach ($authors as $author) {
        $author->books_count = $author->booksCount();
      }
      return response()->json($authors);
    }

    public function authorShow(Author $author)
    {
      $author->books_list = $author->booksList();
      return response()->json($author);
    }

    public function authorUpdate(Author $author)
    {
      $data = request()->validate([
          'name' => 'string',
        ]);
      $author->update($data);
      return response()->json(null, 200);
    }
}
