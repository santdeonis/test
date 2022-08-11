<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Author;
use App\Models\BookGenre;
use App\Models\Genre;


class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
      'name',
      'author_id',
    ];

    public function author()
    {
      if (is_null($this->author_id))
      {
        return 'Нет автора';
      }
      else
      {
        $author = Author::where('id', $this->author_id)->get();
        return $author[0]['name'];
      }
    }

    public function genres()
    {
      $genres = BookGenre::where('book_id', $this->id)->get();
      return $genres;
    }

    public function genreName($id)
    {
      $genre = Genre::where('id', $id)->get();
      return $genre[0]['name'];
    }
}
