<?php

namespace App\Actions\Review;

use App\Actions\Abstracts\TemplateResolver;
use App\Models\DTO\MovieDTO;
use App\Models\DTO\ReviewDTO;
use Illuminate\Http\JsonResponse;
use Statamic\Entries\Entry;
use Statamic\Facades\Collection;

class RenderReviewOverviewAction extends TemplateResolver
{
    public function execute(Entry $page): JsonResponse
    {
        $headerItems = [
            'headerImage' => asset('storage/'.$page->value('header_image')[0]),
            'headerTitle' => $page->value('header_title'),
        ];

        $reviewCollection = Collection::find('reviews');
        $reviewItems = $reviewCollection
            ->queryEntries()
            ->get()
            ->map(function ($review) {
                $reviewable = $review['reviewable'];

                $reviewableDTO = match ($reviewable['blueprint']['handle']) {
                    'movie' => MovieDTO::make($reviewable),
                    // 'book' => BookDTO::make($reviewable),
                    default => null,
                };

                return ReviewDTO::make($review, $reviewableDTO);
            });

                return $this->render($page, [
                    'headerItems' => $headerItems,
                    'reviewItems' => $reviewItems,
                    'blocks' => $this->resolver->execute($page->value('blocks') ?? []),
                ]);
    }
}
