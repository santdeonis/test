<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
  public function index()
  {
    $authors = Author::all();
    return view('admin.author.index', compact('authors'));
  }

  public function destroy(Author $author)
  {
    $author->delete();
    return redirect()->route('authors.index');
  }

  public function create()
  {
    return view('admin.author.create');
  }

  public function store()
  {
    $data = request()->validate([
        'name' => 'string',
        'user_id' => 'nullable|exists:users,id',
      ]);
    Author::create($data);
    return redirect()->route('authors.index');
  }

  public function edit(Author $author)
  {
    return view('admin.author.edit', compact('author'));
  }

  public function update(Author $author)
  {
    $data = request()->validate([
        'name' => 'string',
        'user_id' => 'nullable|exists:users,id',
      ]);
    $author->update($data);
    return redirect()->route('authors.index');
  }
}
