<?php

namespace App\Models\DTO;

use Illuminate\Support\Collection;
use Statamic\Entries\Entry;

class MovieDTO extends ReviewableDTO
{
    public function __construct(
        public ?string      $id,
        public ?string      $title,
        public ?int         $releaseYear,
        public ?string      $description,
        public ?string      $trailerUrl,
        public ?DirectorDTO $director,
        public ?Collection  $actors,
        public string       $type = self::MOVIE
    )
    {
    }

    public static function make(Entry $movie): self
    {
        return new self(
            $movie->id,
            $movie['title'],
            $movie['release_year'],
            $movie['description'],
            $movie['trailer_url'] ? convertToEmbedYouTubeUrl($movie['trailer_url']) : null,
            $movie['director'] ? DirectorDTO::make($movie['director']) : null,
            collect($movie['actors'])->map(fn ($actor) => ActorDTO::make($actor)),
        );
    }
}
