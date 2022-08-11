<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Book;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function booksList()
    {
      $books = Book::where('author_id', $this->id)->get();
      return $books;
    }

    public function booksCount()
    {
      return count($this->booksList());
    }


}
