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
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">author_id</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($books as $book)
                          <tr>
                            <th scope="row">{{ $book->id }} </th>
                            <td> {{$book->name }} </td>
                            <td> {{$book->author_id }} </td>
                            <td>
                              <div class="btn-group float-right" role="group">
                              <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning ">ред</a>
                              <form class="" action="{{ route('books.destroy', $book->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="удалить">
                              </form>
                            </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="float-left">
                        <a href="{{ route('admin')}}" class="btn btn-secondary"> назад </a>
                      </div>
                      <div class="float-right">
                        <a href=" {{ route('books.create') }}" class="btn btn-primary"> создать запись </a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
