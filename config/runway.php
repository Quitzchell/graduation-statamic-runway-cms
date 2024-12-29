<?php

use App\Models\Actor;
use App\Models\BlogPost;
use App\Models\Book;
use App\Models\Category;
use App\Models\Director;
use App\Models\Movie;
use App\Models\Review;

return [

    /*
    |--------------------------------------------------------------------------
    | Resources
    |--------------------------------------------------------------------------
    |
    | Configure the resources (models) you'd like to be available in Runway.
    |
    */

    'resources' => [
        BlogPost::class => [
            'name' => 'Blog Post',
            'title_field' => 'title',
        ],
        Category::class => [
            'name' => 'Category',
            'title_field' => 'name',
        ],
        Movie::class => [
            'name' => 'Movies',
            'title_field' => 'title',
        ],
        Actor::class => [
            'name' => 'Actors',
            'title_field' => 'full_name',
        ],
        Director::class => [
            'name' => 'Directors',
            'title_field' => 'full_name',
        ],
        Book::class => [
            'name' => 'Books',
            'title_field' => 'title',
        ],
        Review::class => [
            'name' => 'Reviews',
            'title_field' => 'title',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Runway URIs Table
    |--------------------------------------------------------------------------
    |
    | When using Runway's front-end routing functionality, Runway will store model
    | URIs in a table to enable easy "URI -> model" lookups. If needed, you can
    | customize the table name here.
    |
    */

    'uris_table' => 'runway_uris',

    /*
    |--------------------------------------------------------------------------
    | Disable Migrations?
    |--------------------------------------------------------------------------
    |
    | Should Runway's migrations be disabled?
    | (eg. not automatically run when you next vendor:publish)
    |
    */

    'disable_migrations' => false,

];
