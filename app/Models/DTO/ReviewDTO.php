<?php

namespace App\Models\DTO;

use Illuminate\Support\Carbon;

class ReviewDTO
{
    public function __construct(
        public ?string $id,
        public ?string $title,
        public ?string $slug,
        public ?string $excerpt,
        public ?string $score,
        public ?string $publishedAt,
        public ?ReviewableDTO $reviewable
    ) {}

    public static function make($review, ReviewableDTO $reviewable)
    {
        return new self(
            $review->id,
            $review['title'],
            $review['slug'],
            $review['excerpt'],
            $review['score'],
            Carbon::parse($review['published_at'])->format('d-m-Y'),
            $reviewable
        );

    }
}
