<?php

namespace App\Actions\Blog;

use App\Actions\Abstracts\ObjectResolver;
use Illuminate\Http\JsonResponse;
use Nette\InvalidArgumentException;
use Statamic\Entries\Collection;
use Statamic\Entries\Entry;

class RenderBlogDetailAction extends ObjectResolver
{
    public function execute(Entry $page, array $segments): JsonResponse
    {
        try {
            $blogPostCollection = Collection::find('blog_posts');
            $blogPostItem = $blogPostCollection
                ->queryEntries()
                ->first(fn (Entry $entry) => $entry->slug === $segments[1]);
        } catch (InvalidArgumentException $e) {
            abort(404, 'Blog post not found');
        }

        return $this->render($blogPostItem['blueprint']['handle'], [
            'title' => $blogPostItem->value('title'),
            'image' => asset('storage/'.$blogPostItem->value('image')),
            'blocks' => $this->resolver->execute($blogPostItem->value('blocks')),
        ]);
    }
}
