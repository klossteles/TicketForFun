@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><span class="font-weight-bold">{{ $movie->name }}</span> <span class="font-italic font-weight-light" style="color: #aaa">({{ $movie->original_name }})</span></div>

                    <div class="card-body">
                        <dl>
                            <dt>Duration</dt>
                            <dd>{{ $movie->duration_in_minutes }} minutes</dd>
                            <dt>Release Year</dt>
                            <dd>1996</dd>
                        </dl>

                        <img src="{{ $movie->image_url }}">
                        <p>{{ $movie->plot_summary }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
