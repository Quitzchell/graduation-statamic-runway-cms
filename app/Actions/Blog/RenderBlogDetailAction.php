<?php

namespace App\Actions\Blog;

use App\Actions\Abstracts\ObjectResolver;
use App\Models\BlogPost;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class RenderBlogDetailAction extends ObjectResolver
{
    public function execute(array $segments): JsonResponse
    {
        try {
            $blogPost = BlogPost::query()->where('slug', $segments[1])->firstOrFail();
        } catch (ModelNotFoundException $e) {
            abort(404, 'Blog post not found');
        }

        return $this->render(BlogPost::class, [
            'title' => $blogPost->title,
            'image' => asset('storage/'.$blogPost->image),
            'blocks' => $this->resolver->execute($blogPost['blocks']),
        ]);
    }
}
