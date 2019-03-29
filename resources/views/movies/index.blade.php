@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Movies') }}</div>

                    <div class="card-body">
                        <a class="btn btn-link" href="{{ route('movies.create') }}">{{ __('New movie') }}</a>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('Name')  }}</th>
                                <th scope="col">{{ __('Original name')  }}</th>
                                <th scope="col">{{ __('Duration')  }}</th>
                                <th scope="col" colspan="2">{{ __('Slug')  }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($movies as $movie)
                                <tr>
                                    <td><a href="{{ route('movies.show', [$movie->slug]) }}">{{ $movie->name }}</a></td>
                                    <td>{{ $movie->original_name }}</td>
                                    <td>{{ $movie->duration_in_minutes . __(' minutes') }}</td>
                                    <td>{{ $movie->slug }}</td>
                                    <td><a href="{{ route('movies.edit', [$movie->slug]) }}">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
