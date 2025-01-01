<?php

namespace App\Models\DTO;

use App\Models\BlogPost;
use Illuminate\Support\Carbon;

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

    public static function make(BlogPost $blogPost)
    {
        return new self(
            $blogPost->id,
            $blogPost->title,
            $blogPost->slug,
            $blogPost->excerpt,
            $blogPost->category->name,
            $blogPost->category->getKey(),
            Carbon::parse($blogPost->published_at)->format('d-m-Y'),
        );
    }
}
