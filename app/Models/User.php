<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Author;
use App\Models\Book;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    * Checking for the role and return bool
    *@param string $role
    *@return bool
    */
    public function hasRole(string $role): bool
    {
      return $this->getAttribute('role') === $role;
    }

    public function AuthorId()
    {
      $authorId = Author::where('user_id', $this->id)->get();
      return $authorId[0]['id'];
    }

    public function isAuthor(Author $author)
    {
      return $this->AuthorId() === $author->id;
    }

    public function isOwner(Book $book)
    {
      return $this->AuthorId() === $book->author_id;
    }
}
