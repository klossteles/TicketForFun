<?php

namespace Tests\Feature;

use App\Movie;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Support\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexMoviePageTest extends TestCase
{
    use RefreshDatabase;

    public function testGivenNoMovies_ShouldShowEmptyMessage()
    {
        $response = $this->get('/movies');

        $response->assertStatus(200);
        $response->assertSee('There is no movies on the database');

        $this->assertSeeNewButton($response);
    }

    public function testGivenSeveralMovies_ShouldShowTableWithTheirData()
    {
        [$movie1, $movie2, $movie3] = $this->createFakeMovie($quantity = 3);

        $response = $this->get('/movies');

        $response->assertStatus(200);

        $this->assertSeeNewButton($response);
        $this->assertMovieIsOnResponse($response, $movie1);
        $this->assertMovieIsOnResponse($response, $movie2);
        $this->assertMovieIsOnResponse($response, $movie3);
    }

    private function createFakeMovie(int $quantity): Collection
    {
        $movies = factory(Movie::class, $quantity)->make();
        foreach ($movies as $movie) {
            /** @var Movie $movie */
            $movie->save();
        }
        return $movies;
    }

    private function assertMovieIsOnResponse(TestResponse $response, Movie $movie): void
    {
        $response->assertSee($movie->slug);
        $response->assertSee($movie->name);
        $response->assertSee($movie->original_name);
        $response->assertSee($movie->duration_in_minutes);
        $response->assertSee('Edit');
        $response->assertSee("movies/{$movie->slug}/edit");
    }

    private function assertSeeNewButton(TestResponse $response): void
    {
        $response->assertSee('New movie');
        $response->assertSee('/movies/create');
    }
}
