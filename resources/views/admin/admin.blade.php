@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin panel') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="list-group">
                      Таблицы:
                        <a href="{{ route('books.index')}}" class="list-group-item list-group-item-action">
                          Books
                         </a>
                        <a href="{{ route('authors.index')}}" class="list-group-item list-group-item-action">
                          Authors
                         </a>
                        <a href="{{ route('genres.index')}}" class="list-group-item list-group-item-action">
                          Genres
                        </a>
                        <a href="{{ route('book_genre.index')}}" class="list-group-item list-group-item-action">
                          Book_genre
                        </a>
                    </div>
                    <div class="list-group">
                      Запросы:
                      <a href="{{ route('genres_list')}}" class="list-group-item list-group-item-action">
                        Список жанров
                       </a>
                       <a href="{{ route('authors_list')}}" class="list-group-item list-group-item-action">
                         Список авторов
                       </a>
                       <a href="{{ route('books_list')}}" class="list-group-item list-group-item-action">
                         Список книг
                       </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
