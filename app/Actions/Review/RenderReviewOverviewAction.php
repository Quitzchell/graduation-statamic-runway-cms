<?php

namespace App\Actions\Review;

use App\Actions\Abstracts\TemplateResolver;
use App\Models\DTO\MovieDTO;
use App\Models\DTO\ReviewDTO;
use App\Models\Movie;
use App\Models\Page;
use App\Models\Review;
use Illuminate\Http\JsonResponse;

class RenderReviewOverviewAction extends TemplateResolver
{
    public function execute(Page $page): JsonResponse
    {
        $templateData = $page->template[0];
        $headerItems = [
            'headerImage' => asset('storage/'.$templateData['header_image']),
            'headerTitle' => $templateData['header_title'],
        ];

        $reviewItems = Review::where('is_published', true)
            ->get()
            ->map(function (Review $review) {
                $reviewableDTO = match ($review->reviewable_type) {
                    'movie' => MovieDTO::make(Movie::find($review->movie->getKey()))
                    // todo: add something for book
                };

                return ReviewDTO::make($review, $reviewableDTO);

            });

        return $this->render($page, [
            'headerItems' => $headerItems,
            'reviewItems' => $reviewItems,
            'blocks' => $this->resolver->execute($templateData['blocks'] ?? []),
        ]);
    }
}
