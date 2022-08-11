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
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($genres as $genre)
                          <tr>
                            <th scope="row">{{ $genre->id }} </th>
                            <td> {{$genre->name }} </td>
                            <td>
                              <div class="btn-group float-right" role="group">
                              <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning ">ред</a>
                              <form class="" action="{{ route('genres.destroy', $genre->id) }}" method="post">
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
                        <a href=" {{ route('genres.create') }}" class="btn btn-primary"> создать запись </a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
