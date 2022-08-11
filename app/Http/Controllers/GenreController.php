<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
      $genres = Genre::all();
      return view('admin.genre.index', compact('genres'));
    }

    public function destroy(Genre $genre)
    {
      $genre->delete();
      return redirect()->route('genres.index');
    }

    public function create()
    {
      return view('admin.genre.create');
    }

    public function store()
    {
      $data = request()->validate([
          'name' => 'string',
        ]);
      Genre::create($data);
      return redirect()->route('genres.index');
    }

    public function edit(Genre $genre)
    {
      return view('admin.genre.edit', compact('genre'));
    }

    public function update(Genre $genre)
    {
      $data = request()->validate([
          'name' => 'string',
        ]);
      $genre->update($data);
      return redirect()->route('genres.index');
    }
}
