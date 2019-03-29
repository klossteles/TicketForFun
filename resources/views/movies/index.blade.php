@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Movies') }}</div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('Name')  }}</th>
                                <th scope="col">{{ __('Original name')  }}</th>
                                <th scope="col">{{ __('Duration')  }}</th>
                                <th scope="col">{{ __('Slug')  }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($movies as $movie)
                                <tr>
                                    <td>{{ $movie->name }}</td>
                                    <td>{{ $movie->original_name }}</td>
                                    <td>{{ $movie->duration_in_minutes }} minutes</td>
                                    <td><a href="{{ route('movies.edit', [$movie->slug]) }}">{{ $movie->slug }}</a></td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
