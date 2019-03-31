@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('New Movie') }}</div>

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif

                        <form method="post" action="{{ $action_route }}">
                            @csrf
                            @method($action_method ?? 'POST')
                            <div class="form-group">
                                <label for="slug">Slug:</label>
                                <input type="text" class="form-control" name="slug" value="{{ old('slug') ?? $movie->slug }}"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Movie name:</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') ?? $movie->name }}"/>
                            </div>
                            <div class="form-group">
                                <label for="original_name">Original name:</label>
                                <input type="text" class="form-control" name="original_name" value="{{ old('original_name') ?? $movie->original_name }}"/>
                            </div>
                            <div class="form-group">
                                <label for="duration_in_minutes">Duration in minutes:</label>
                                <input type="number" class="form-control" name="duration_in_minutes" value="{{ old('duration_in_minutes') ?? $movie->duration_in_minutes }}"/>
                            </div>
                            <div class="form-group">
                                <label for="plot_summary">Plot summary:</label>
                                <textarea class="form-control" name="plot_summary">{{ old('plot_summary') ?? $movie->plot_summary }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image_url">Image url:</label>
                                <input type="url" class="form-control" name="image_url" value="{{ old('image_url') ?? $movie->image_url }}"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
