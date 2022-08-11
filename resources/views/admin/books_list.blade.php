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
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Книга</th>
                            <th scope="col">Автор</th>
                            <th scope="col">Жанры</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($books as $book)
                          <tr>
                            <td> {{$book->name }} </td>
                            <td>
                              {{ $book->author() }}
                            </td>
                            <td>
                              @foreach ($book->genres() as $genre)
                              {{ $book->genreName($genre['genre_id']) }}
                              @endforeach
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="float-left">
                        <a href="{{ route('admin')}}" class="btn btn-secondary"> назад </a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
