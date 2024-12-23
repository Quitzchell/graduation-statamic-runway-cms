<?php

namespace App\Actions\Blog;

use App\Actions\Abstracts\TemplateResolver;
use App\Models\DTO\BlogPostDTO;
use Illuminate\Http\JsonResponse;
use Statamic\Entries\Collection;
use Statamic\Entries\Entry;

class RenderBlogOverviewAction extends TemplateResolver
{
    public function execute(Entry $page): JsonResponse
    {
        $headerItems = [
            'headerImage' => asset('storage/'.$page->value('header_image')[0]),
            'headerTitle' => $page->get('header_title'),
        ];

        $blogPostCollection = Collection::find('blog_posts');
        $blogPostItems = $blogPostCollection
            ->queryEntries()
            ->get()
            ->map(fn ($blogPost) => BlogPostDTO::make($blogPost));

        return $this->render($page, [
            'headerItems' => $headerItems,
            'blogPostItems' => $blogPostItems,
            'blocks' => $this->resolver->execute($page->value('blocks') ?? []),
        ]);
    }
}
