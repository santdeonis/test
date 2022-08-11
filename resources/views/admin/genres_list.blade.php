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
                            <th scope="col">Название</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($genres as $genre)
                          <tr>
                            <td> {{$genre->name }} </td>
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
