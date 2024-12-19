<?php

namespace App\Dictionaries;

use Statamic\Dictionaries\BasicDictionary;

class Templates extends BasicDictionary
{
    protected string $valueKey = 'name';

    protected string $labelKey = 'value';

    protected function getItems(): array
    {
        return [
            ['value' => 'homepage', 'name' => 'homepage', 'method' => 'getHomepage'],
            ['value' => 'blog', 'name' => 'blog', 'method' => 'getBlog'],
            ['value' => 'review', 'name' => 'review', 'method' => 'getReview'],
        ];
    }
}
