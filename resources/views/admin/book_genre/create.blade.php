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
                    <form action=" {{ route('book_genre.store') }}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="">book_id</label>
                        <input type="text" class="form-control" name="book_id" value="{{ old('book_id') }}">
                      </div>
                      <div class="form-group">
                        <label for="">genre_id</label>
                        <input type="text" class="form-control" name="genre_id" value="{{ old('genre_id') }}">
                      </div>
                      <button type="submit" class="btn btn-primary float-right" name="bookSubmit"> создать </button>
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
