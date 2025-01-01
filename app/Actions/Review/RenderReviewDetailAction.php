<?php

namespace App\Actions\Review;

use App\Actions\Abstracts\ObjectResolver;
use App\Models\DTO\MovieDTO;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use InvalidArgumentException;

class RenderReviewDetailAction extends ObjectResolver
{
    public function execute(array $segments): JsonResponse
    {
        try {
            $review = Review::query()->firstWhere('slug', $segments[1]);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Review not found');
        }

        $reviewableDTO = match ($review->reviewable_type) {
            'movie' => MovieDTO::make(Movie::find($review->movie->getKey())),
            // $reviewable instanceof Book => BookDTO::from($reviewable),
            default => throw new InvalidArgumentException('Unknown reviewable type'),
        };

        return $this->render(Review::class, [
            'title' => $review->title,
            'image' => asset('storage/'.$review->image),
            'reviewItem' => $reviewableDTO,
            'blocks' => $this->resolver->execute($review['blocks'] ?? []),
        ]);
    }
}
