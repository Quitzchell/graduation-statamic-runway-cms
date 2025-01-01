<?php

namespace App\Actions\Blog;

use App\Actions\Abstracts\TemplateResolver;
use App\Models\BlogPost;
use App\Models\DTO\BlogPostDTO;
use App\Models\Page;
use Illuminate\Http\JsonResponse;

class RenderBlogOverviewAction extends TemplateResolver
{
    public function execute(Page $page): JsonResponse
    {
        $templateData = $page->template[0];
        $headerItems = [
            'headerImage' => asset('storage/'.$templateData['header_image']),
            'headerTitle' => $templateData['header_title'],
        ];

        $blogPostItems = BlogPost::where('is_published', true)->get()->map(function (BlogPost $blogPost) {
            return BlogPostDTO::make($blogPost);
        });

        return $this->render($page, [
            'headerItems' => $headerItems,
            'blogPostItems' => $blogPostItems,
            'blocks' => $this->resolver->execute($templateData['blocks'] ?? []),
        ]);
    }
}
