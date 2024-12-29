<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $blogPosts = [
            [
                'title' => 'Battlefield Insights: The Art of Strategy and Tactics in Warfare',
                'slug' => Str::slug('Battlefield Insights: The Art of Strategy and Tactics in Warfare'),
                'excerpt' => 'Today I wish to share with you some profound insights into the military strategies and tactics that have shaped the course of history on the battlefield. Warfare, as you may know, is not merely about brute strength; it is a complex dance of strategy, deception, and swift maneuvering. Allow me to elucidate the principles that have guided my campaigns and shaped my successes.',
                'image' => 'napoleon-war-advice.webp',
                'category_id' => 1,
                'published_at' => Carbon::parse('1806-02-07'),
                'is_published' => true,
                'blocks' => json_encode([
                    [
                        'id' => 'm59irp3k',
                        'text' => '<p>One of the most critical aspects of any military campaign is a comprehensive understanding of the terrain. The battlefield is more than just a physical space; it is a living entity that can be manipulated to your advantage. When preparing for battle, I always conduct a meticulous reconnaissance of the land, noting the elevation, natural obstacles, and potential choke points. A well-informed commander can use the terrain to funnel enemy forces into a disadvantageous position or create advantageous flanking maneuvers.</p>',
                        'type' => 'paragraph',
                        'title' => 'Understanding the Terrain',
                        'enabled' => true,
                        'namespace' => 'common',
                    ],
                    [
                        'id' => 'm59islpj',
                        'text' => '<p>Sun Tzu wisely stated, &quot;All warfare is based on deception.&quot; This principle is at the heart of effective military strategy. The element of surprise can turn the tide of battle in an instant. Whether it is by feigning weakness in one area while launching a surprise attack in another or by utilizing unexpected formations, maintaining the element of surprise forces the enemy to react rather than act. In my campaigns, I have frequently employed deceptive tactics to mislead my opponents, creating openings for decisive strikes.</p>',
                        'type' => 'paragraph',
                        'title' => 'The Element of Surprise',
                        'enabled' => true,
                        'namespace' => 'common',
                    ],
                    [
                        'id' => 'm59jw6q2',
                        'type' => 'image',
                        'image' => 'napoleon-war.jpg',
                        'enabled' => true,
                        'namespace' => 'common',
                    ],
                    [
                        'id' => 'm59jwuhq',
                        'text' => '<p>An army marches on its stomach, or so the saying goes. Logistics is the backbone of any successful military operation. Supply lines must be secured, provisions must be adequate, and reinforcements must be timely. A well-fed and well-equipped army is a formidable force. In my campaigns, I have always prioritized logistics, ensuring that my troops are well-provisioned and that our supply lines remain uninterrupted. This focus on logistics allows for sustained campaigns and rapid movements without the hindrance of scarcity.</p>',
                        'type' => 'paragraph',
                        'title' => 'The Importance of Logistics',
                        'enabled' => true,
                        'namespace' => 'common',
                    ],
                    [
                        'id' => 'm59k14ih',
                        'text' => '<p>Effective communication and unity of command are essential for successful military operations. In the chaos of battle, it is vital that every unit understands its role within the larger strategy. A divided command can lead to confusion and missed opportunities. I have always emphasized the importance of a clear chain of command and open lines of communication among my generals. When every soldier knows their purpose and trusts in their leaders, the army moves as one cohesive unit, capable of executing complex maneuvers with precision.</p>',
                        'type' => 'paragraph',
                        'title' => 'Unity of Command',
                        'enabled' => true,
                        'namespace' => 'common',
                    ],
                    [
                        'id' => 'm59k1kjk',
                        'text' => '<p>No plan survives contact with the enemy, and adaptability is a hallmark of effective military strategy. The ability to reassess and modify one’s tactics in response to changing circumstances is crucial. In my campaigns, I have encountered unforeseen challenges and adversaries who did not behave as expected. It is in these moments that a commander must remain calm and collected, ready to pivot and adjust the strategy on the fly. The best-laid plans must be flexible, allowing for adjustments that capitalize on emerging opportunities.</p>',
                        'type' => 'paragraph',
                        'title' => 'Adaptability on the Battlefield',
                        'enabled' => true,
                        'namespace' => 'common',
                    ],
                    [
                        'id' => 'm59k1vkc',
                        'text' => '<p>Finally, let us not forget the most vital aspect of any military campaign: the soldiers themselves. An army is composed of individuals, each with their own strengths, weaknesses, and motivations. Understanding the morale of your troops and fostering a sense of unity and purpose can significantly impact their performance on the battlefield. I have always believed in leading by example, inspiring my soldiers with courage and conviction. A motivated army is an unstoppable force, willing to endure hardships for the promise of victory.</p>',
                        'type' => 'paragraph',
                        'title' => 'The Human Element',
                        'enabled' => true,
                        'namespace' => 'common',
                    ],
                    [
                        'id' => 'm59k2f17',
                        'text' => '<p>In conclusion, military strategy and tactics are not merely theoretical concepts; they are dynamic practices that require constant learning and adaptation. As you navigate the complexities of warfare, remember the importance of terrain, surprise, logistics, communication, adaptability, and the human element. These principles have served me well throughout my campaigns, and I hope they provide you with valuable insights as you delve into the art of military strategy.</p><p>Until next time, may your strategies be bold, and your victories resounding!</p><p>Napoleon Bonaparte<br><em>Commander, Strategist, and Enthusiast of the Art of War</em></p>',
                        'type' => 'paragraph',
                        'title' => 'Conclusion',
                        'enabled' => true,
                        'namespace' => 'common',
                    ],
                ]),
            ],
        ];

        foreach ($blogPosts as $blogPost) {
            BlogPost::create($blogPost);
        }
    }
}
