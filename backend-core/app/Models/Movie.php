<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GenreMovie
 *
 * @property integer $id
 * @property int $film_id
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property int|null $year
 * @property string|null $film_length
 * @property string|null $rating
 * @property integer $rating_vote_count
 * @property string $poster_url
 * @property string $poster_url_preview
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereFilmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereFilmLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie wherePosterUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie wherePosterUrlPreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereRatingVoteCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereYear($value)
 * @mixin \Eloquent
 */
class Movie extends Model
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
    public function getFilmId(): int
    {
        return $this->film_id;
    }

    /**
     * @param int $film_id
     * @return Movie
     */
    public function setFilmId(int $film_id): Movie
    {
        $this->film_id = $film_id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNameRu(): string|null
    {
        return $this->name_ru;
    }

    /**
     * @param string|null $name_ru
     * @return Movie
     */
    public function setNameRu(string|null $name_ru): Movie
    {
        $this->name_ru = $name_ru;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNameEn(): string|null
    {
        return $this->name_en;
    }

    /**
     * @param string|null $name_en
     * @return Movie
     */
    public function setNameEn(string|null $name_en): Movie
    {
        $this->name_en = $name_en;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getYear(): int|null
    {
        return $this->year;
    }

    /**
     * @param int|null $year
     * @return Movie
     */
    public function setYear(int|null $year): Movie
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return string
     */
    public function getFilmLength(): string
    {
        return $this->film_length;
    }

    /**
     * @param string|null $film_length
     * @return Movie
     */
    public function setFilmLength(string|null $film_length): Movie
    {
        $this->film_length = $film_length;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRating(): string|null
    {
        return $this->rating;
    }

    /**
     * @param string|null $rating
     * @return Movie
     */
    public function setRating(string|null $rating): Movie
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @return int
     */
    public function getRatingVoteCount(): int
    {
        return $this->rating_vote_count;
    }

    /**
     * @param int $rating_vote_count
     * @return Movie
     */
    public function setRatingVoteCount(int $rating_vote_count): Movie
    {
        $this->rating_vote_count = $rating_vote_count;

        return $this;
    }

    /**
     * @return string
     */
    public function getPosterUrl(): string
    {
        return $this->poster_url;
    }

    /**
     * @param string $poster_url
     * @return Movie
     */
    public function setPosterUrl(string $poster_url): Movie
    {
        $this->poster_url = $poster_url;

        return $this;
    }

    /**
     * @return string
     */
    public function getPosterUrlPreview(): string
    {
        return $this->poster_url_preview;
    }

    /**
     * @param string $poster_url_preview
     * @return Movie
     */
    public function setPosterUrlPreview(string $poster_url_preview): Movie
    {
        $this->poster_url_preview = $poster_url_preview;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Movie
     */
    public function setType(string $type): Movie
    {
        $this->type = $type;

        return $this;
    }
}
