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
                            <th scope="col">book_id</th>
                            <th scope="col">genre_id</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($b_gs as $b_g)
                          <tr>
                            <th scope="row">{{ $b_g->id }} </th>
                            <td> {{$b_g->book_id }} </td>
                            <td> {{$b_g->genre_id }} </td>
                            <td>
                              <div class="btn-group float-right" role="group">
                              <a href="{{ route('book_genre.edit', $b_g->id) }}" class="btn btn-warning ">ред</a>
                              <form class="" action="{{ route('book_genre.destroy', $b_g->id) }}" method="post">
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
                        <a href=" {{ route('book_genre.create') }}" class="btn btn-primary"> создать запись </a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
