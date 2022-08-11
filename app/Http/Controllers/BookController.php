<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
  public function index()
  {
    $books = Book::all();
    return view('admin.book.index', compact('books'));
  }

  public function destroy(Book $book)
  {
    $book->delete();
    return redirect()->route('books.index');
  }

  public function create()
  {
    return view('admin.book.create');
  }

  public function store()
  {
    $data = request()->validate([
        'name' => 'string',
        'author_id' => 'nullable|exists:authors,id',
      ]);
    Book::create($data);
    return redirect()->route('books.index');
  }

  public function edit(Book $book)
  {
    return view('admin.book.edit', compact('book'));
  }

  public function update(Book $book)
  {
    $data = request()->validate([
        'name' => 'string',
        'author_id' => 'nullable|exists:authors,id',
      ]);
    $book->update($data);
    return redirect()->route('books.index');
  }
}
