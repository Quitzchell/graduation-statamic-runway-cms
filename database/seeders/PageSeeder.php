<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'name' => 'Home',
                'slug' => 'home',
                'template' => json_encode([
                    [
                        "id" => "m5b8ryh5",
                        "type" => "homepage",
                        "blocks" => [
                            [
                                "id" => "m5b8ustg",
                                "text" => "<p>I am Napoleon Bonaparte, exiled here on the remote island of Saint Helena. Once, I commanded vast armies, reshaped nations, and navigated the turbulent waters of European politics. Today, however, I find myself in the serene isolation of this distant land, where the ocean whispers tales of glory and defeat.</p><p>As I pen my thoughts for you, dear readers, I invite you into my world—a realm of ambition, strategy, and, yes, introspection. Here, I shall share my reflections on leadership, the nature of power, and the lessons learned from both triumphs and trials.</p><p>Join me as I explore the intricate tapestry of history, the weight of legacy, and the fleeting nature of fame. Whether you seek inspiration, knowledge, or simply the musings of a man who once stood at the pinnacle of power, I welcome you to my journey.</p><p>À bientôt,<br>Napoleon</p>",
                                "type" => "paragraph",
                                "title" => "Bonjour à tous,",
                                "enabled" => true,
                                "namespace" => "common"
                            ],
                            [
                                "id" => "m5bbf9ra",
                                "text" => "<p>I invite you to join me on a new conquest, not of nations but of cinema and literature! Much as I once sought to reshape Europe, I now seek to navigate the vast empire of film, and I need you by my side. Do you dare follow me, loyal subjects, in this new adventure? Then visit my reviews page into the world of film and literature!</p>",
                                "type" => "call_to_action",
                                "title" => "A new conquest",
                                "enabled" => true,
                                "namespace" => "common",
                                "page_id" => 1,
                                "button_text" => "Read more"
                            ],
                            [
                                "id" => "m5bculsd",
                                "text" => "<p>Visit me at Les Invalides, where I, Napoleon Bonaparte, rest. Stand before me, and discuss the ambition, triumphs, and sacrifices that shaped our history.</p>",
                                "type" => "map",
                                "title" => "I await your visit",
                                "enabled" => true,
                                "namespace" => "common",
                                "google_maps" => [
                                    "coordinates" => [
                                        "lat" => 48.85433450000001,
                                        "lng" => 2.3134029
                                    ],
                                    "formatted_address" => "75007 Paris, France"
                                ]
                            ]
                        ],
                        "enabled" => true,
                        "header_image" => ["napoleon-on-horseback.jpg"],
                        "header_title" => "La gloire est éphémère, mais l'oubli est éternel."
                    ]
                ]),
            ],
            [
                'name' => 'Blog',
                'slug' => 'blog',
                'template' => json_encode([
                    [
                        "id" => "m5bcvzhs",
                        "type" => "blog",
                        "enabled" => true,
                        "header_image" => ["napoleon-reading.jpg"],
                        "header_title" => "Entries"
                    ]
                ]),
            ],
            [
                'name' => 'Reviews',
                'slug' => 'reviews',
                'template' => json_encode([
                    [
                        "id" => "m5bdewvm",
                        "type" => "review",
                        "enabled" => true,
                        "header_image" => ["napoleon-reviews.jpg"],
                        "header_title" => "Reviews"
                    ]
                ]),
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
