<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GenreMovie
 *
 * @property integer $id
 * @property int $movie_id
 * @property int $genre_id
 * @method static \Illuminate\Database\Eloquent\Builder|GenreMovie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GenreMovie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GenreMovie query()
 * @mixin \Eloquent
 */
class GenreMovie extends Model
{
    use HasFactory;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getMovieId(): int
    {
        return $this->movie_id;
    }

    /**
     * @param int $movie_id
     * @return GenreMovie
     */
    public function setMovieId(int $movie_id): GenreMovie
    {
        $this->movie_id = $movie_id;

        return $this;
    }

    /**
     * @return int
     */
    public function getGenreId(): int
    {
        return $this->genre_id;
    }

    /**
     * @param int $genre_id
     * @return GenreMovie
     */
    public function setGenreId(int $genre_id): GenreMovie
    {
        $this->genre_id = $genre_id;

        return $this;
    }
}
