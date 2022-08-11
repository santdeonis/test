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
                    <form action=" {{ route('authors.update', $author->id) }}" method="post">
                      @csrf
                      @method('patch')
                      <div class="form-group">
                        <label for="">name</label>
                        <input type="text" class="form-control" name="name" value="{{ $author->name }}">
                      </div>
                      <div class="form-group">
                        <label for="">user_id</label>
                        <input type="text" class="form-control" name="user_id" value="{{ $author->user_id }}">
                      </div>
                      <button type="submit" class="btn btn-primary float-right" name="authorSubmit"> принять </button>
                    </form>
                      <div class="float-left">
                        <a href="{{ route('authors.index')}}" class="btn btn-secondary"> назад </a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
