<?php

namespace App\Models\DTO;

use Illuminate\Support\Carbon;
use Statamic\Entries\Entry;

class BlogPostDTO
{
    public function __construct(
        public ?string $id,
        public ?string $title,
        public ?string $slug,
        public ?string $excerpt,
        public ?string $categoryName,
        public ?string $categoryId,
        public ?string $publishedAt,
    ) {}

    public static function make(Entry $blogPost)
    {
        return new self(
            $blogPost->id,
            $blogPost['title'],
            $blogPost['slug'],
            $blogPost['excerpt'],
            $blogPost['category_id']['title'],
            $blogPost['category_id']['id'],
            Carbon::parse($blogPost['published_at'])->format('d-m-Y'),
        );
    }
}
