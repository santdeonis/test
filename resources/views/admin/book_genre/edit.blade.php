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
                    <form action=" {{ route('book_genre.update', $b_g->id) }}" method="post">
                      @csrf
                      @method('patch')
                      <div class="form-group">
                        <label for="">book_id</label>
                        <input type="text" class="form-control" name="book_id" value="{{ $b_g->book_id }}">
                      </div>
                      <div class="form-group">
                        <label for="">genre_id</label>
                        <input type="text" class="form-control" name="genre_id" value="{{ $b_g->genre_id }}">
                      </div>
                      <button type="submit" class="btn btn-primary float-right" name="bookGenreSubmit"> принять </button>
                    </form>
                      <div class="float-left">
                        <a href="{{ route('book_genre.index')}}" class="btn btn-secondary"> назад </a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
