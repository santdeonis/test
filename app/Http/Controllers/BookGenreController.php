<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookGenre;

class BookGenreController extends Controller
{
  public function index()
  {
    $b_gs = BookGenre::all();
    return view('admin.book_genre.index', compact('b_gs'));
  }

  public function destroy(BookGenre $b_g)
  {
    $b_g->delete();
    return redirect()->route('book_genre.index');
  }

  public function create()
  {
    return view('admin.book_genre.create');
  }

  public function store()
  {
    $data = request()->validate([
        'book_id' => 'required|exists:books,id',
        'genre_id' => 'required|exists:genres,id',
      ]);
    BookGenre::create($data);
    return redirect()->route('book_genre.index');
  }

  public function edit(BookGenre $b_g)
  {
    return view('admin.book_genre.edit', compact('b_g'));
  }

  public function update(BookGenre $b_g)
  {
    $data = request()->validate([
      'book_id' => 'required|exists:books,id',
      'genre_id' => 'required|exists:genres,id',
      ]);
    $b_g->update($data);
    return redirect()->route('book_genre.index');
  }
}
