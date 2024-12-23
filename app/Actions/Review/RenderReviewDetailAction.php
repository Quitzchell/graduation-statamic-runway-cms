<?php

namespace App\Actions\Review;

use App\Actions\Abstracts\ObjectResolver;
use App\Models\DTO\MovieDTO;
use App\Models\DTO\ReviewDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Statamic\Entries\Collection;
use Statamic\Entries\Entry;

class RenderReviewDetailAction extends ObjectResolver
{
    public function execute(Entry $page, array $segments): JsonResponse
    {
        try {
            $reviewItem = Entry::query()
                ->where('collection', 'reviews')
                ->where('slug', $segments[1])
                ->first();

            $reviewable = $reviewItem['reviewable'];
            $reviewableDTO = match ($reviewable['blueprint']['handle']) {
                'movie' => MovieDTO::make($reviewable),
                // 'book' => BookDTO::make($reviewable),
                default => null,
            };
        } catch (ModelNotFoundException $e) {
            abort(404, 'Review not found');
        }

        return $this->render($reviewItem['blueprint']['handle'], [
            'title' => $reviewItem->value('title'),
            'image' => asset('storage/' . $reviewItem->value('image')),
            'reviewItem' => $reviewableDTO,
            'blocks' => $this->resolver->execute($reviewItem->value('blocks')),
        ]);
    }
}
