<?php

namespace App\Console\Commands;

use App\Models\Genre;
use App\Models\GenreMovie;
use App\Models\Movie;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SyncMovie extends Command
{
    const API_ENDPOINT = '/api/v2.2/films/top';

    const COUNT_PAGE = 20;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-movie';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sync movie';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $progressBar = $this->output->createProgressBar(self::COUNT_PAGE);
        $progressBar->setFormat('debug');
        $progressBar->start();
        for ($i = 0; $i < self::COUNT_PAGE; $i++) {
            try {
                DB::beginTransaction();
                $response = Http::withHeaders([
                    'accept' => 'application/json',
                    'X-API-KEY' => config('app.api_token')
                ])->get(config('app.api_url') . self::API_ENDPOINT, [
                    'type' => 'TOP_AWAIT_FILMS',
                    'page' => $i
                ]);

                if ($response->failed()) {
                    throw new Exception('ERROR STATUS' . $response->body());
                }

                $movies = $response->json();

                foreach ($movies['films'] as $movie) {
                    $oldMovie = Movie::query()->whereFilmId($movie['filmId'])->exists();
                    if ($oldMovie) {
                        continue;
                    }
                    $newMovies = new Movie();
                    $newMovies->setFilmId($movie['filmId']);
                    $newMovies->setNameEn($movie['nameRu']);
                    $newMovies->setNameRu($movie['nameRu']);
                    $newMovies->setYear($movie['year']);
                    $newMovies->setFilmLength($movie['filmLength']);
                    $newMovies->setRating($movie['rating']);
                    $newMovies->setRatingVoteCount($movie['ratingVoteCount']);
                    $newMovies->setPosterUrlPreview($movie['posterUrlPreview']);
                    $newMovies->setPosterUrl($movie['posterUrl']);
                    $newMovies->setType('TOP_AWAIT_FILMS');
                    $newMovies->save();

                    $newGenre = null;
                    foreach ($movie['genres'] as $genre) {
                        $oldGenre = Genre::query()->whereName($genre['genre'])->first();
                        if (!is_null($oldGenre)) {
                            $oldGenre->setCount($oldGenre->getCount() + 1);
                            $oldGenre->save();
                            continue;
                        }
                        $newGenre = new Genre();
                        $newGenre->setName($genre['genre']);
                        $newGenre->setCount(1);
                        $newGenre->save();
                    }

                    foreach ($movie['genres'] as $genre) {
                        $genreDB = Genre::query()->where('name', '=', $genre)->first();
                        $newGenreMovie = new GenreMovie();
                        $newGenreMovie->setMovieId($newMovies->getId());
                        $newGenreMovie->setGenreId($genreDB->getId());
                        $newGenreMovie->save();
                    }
                }
                DB::commit();
                $progressBar->advance();
            } catch (Exception $e) {
                DB::rollback();
                Log::error('ERROR MESSAGE:' . $e->getMessage());
                Log::error('ERROR LINE:' . $e->getLine());
                Log::error('ERROR TRACE:' . $e->getTraceAsString());
            }
        }
        $progressBar->finish();
    }
}
