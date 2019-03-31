<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.edit', [
            'action_route' => route('movies.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:movies',
            'name' => 'required',
            'original_name' => 'required',
            'duration_in_minutes' => 'required',
            'plot_summary' => 'required',
            'image_url' => 'required',
        ]);

        $movie = new Movie();
        $movie->slug = $request->get('slug');
        $movie->name = $request->get('name');
        $movie->original_name = $request->get('original_name');
        $movie->duration_in_minutes = $request->get('duration_in_minutes');
        $movie->plot_summary = $request->get('plot_summary');
        $movie->image_url = $request->get('image_url');
        $movie->save();

        return redirect(route('movies.index'))->with('success', __('The movie ":movie_name" has been created.', [
            'movie_name' => $movie->name,
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', [
            'action_route' => route('movies.update', $movie->slug),
            'action_method' => 'PATCH',
            'movie' => $movie,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'slug' => 'required',
            'name' => 'required',
            'original_name' => 'required',
            'duration_in_minutes' => 'required',
            'plot_summary' => 'required',
            'image_url' => 'required',
        ]);

        $movie->slug = $request->get('slug');
        $movie->name = $request->get('name');
        $movie->original_name = $request->get('original_name');
        $movie->duration_in_minutes = $request->get('duration_in_minutes');
        $movie->plot_summary = $request->get('plot_summary');
        $movie->image_url = $request->get('image_url');
        $movie->save();

        return redirect(route('movies.index'))->with('success', __('The movie ":movie_name" was saved successfully.', [
            'movie_name' => $movie->name,
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect(route('movies.index'))->with('success', __('The movie ":movie_name" was deleted successfully.', [
            'movie_name' => $movie->name,
        ]));
    }
}
