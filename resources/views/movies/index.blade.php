@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Movies') }}</div>

                    @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        <br />
                    @endif

                    <div class="card-body">
                        <a class="btn btn-link" href="{{ route('movies.create') }}">{{ __('New movie') }}</a>
                        @if(count($movies))
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">{{ __('Name')  }}</th>
                                    <th scope="col">{{ __('Original name')  }}</th>
                                    <th scope="col">{{ __('Duration')  }}</th>
                                    <th scope="col" colspan="3">{{ __('Slug')  }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($movies as $movie)
                                    <tr>
                                        <td><a href="{{ route('movies.show', [$movie->slug]) }}">{{ $movie->name }}</a></td>
                                        <td>{{ $movie->original_name }}</td>
                                        <td>{{ $movie->duration_in_minutes . __(' minutes') }}</td>
                                        <td>{{ $movie->slug }}</td>
                                        <td><a class="btn btn-link" href="{{ route('movies.edit', $movie->slug) }}">Edit</a></td>
                                        <td>
                                            <form action="{{ route('movies.destroy', $movie->slug) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-link" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>{{ __('There is no movies on the database.') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
