<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\User;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample tags
        $tags = [
            ['name' => 'Web Design', 'slug' => 'web-design', 'color' => '#3B82F6'],
            ['name' => 'Branding', 'slug' => 'branding', 'color' => '#10B981'],
            ['name' => 'Typography', 'slug' => 'typography', 'color' => '#F59E0B'],
            ['name' => 'UI/UX', 'slug' => 'ui-ux', 'color' => '#8B5CF6'],
            ['name' => 'Creative', 'slug' => 'creative', 'color' => '#EF4444'],
            ['name' => 'Innovative', 'slug' => 'innovative', 'color' => '#06B6D4'],
        ];

        foreach ($tags as $tag) {
            BlogTag::create($tag);
        }

        // Get the first user as author
        $author = User::first();

        if (!$author) {
            $author = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Create sample blog posts
        $blogPosts = [
            [
                'title' => 'The Role of Color Psychology in Branding',
                'slug' => 'color-psychology-branding',
                'excerpt' => 'Understanding how colors influence consumer behavior and brand perception.',
                'content' => '<p>Color psychology plays a crucial role in branding and marketing. Different colors evoke specific emotions and can significantly impact how consumers perceive your brand.</p><p>Red, for example, is often associated with energy, passion, and urgency, making it perfect for brands that want to create excitement or encourage immediate action. Blue, on the other hand, conveys trust, stability, and professionalism, which is why many financial institutions and tech companies use it in their branding.</p><p>When choosing colors for your brand, consider your target audience, industry, and the emotions you want to evoke. A well-thought-out color palette can help you stand out from competitors and create a memorable brand identity.</p>',
                'featured_image' => 'images/post-1.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'meta_title' => 'Color Psychology in Branding - How Colors Influence Consumer Behavior',
                'meta_description' => 'Learn how color psychology affects branding and consumer behavior. Discover the best colors for your brand identity.',
                'tags' => ['Branding', 'Creative', 'Innovative']
            ],
            [
                'title' => 'Typography Tips for Effective Visual Communication',
                'slug' => 'typography-tips-visual-communication',
                'excerpt' => 'Master the art of typography to create compelling and readable designs.',
                'content' => '<p>Typography is a critical component of design that goes beyond simply choosing fonts. It shapes how your audience perceives your message and interacts with your content.</p><p>Effective typography not only enhances readability but also conveys tone, establishes hierarchy, and strengthens visual appeal. Mastering typography can transform your designs into clear, compelling, and memorable experiences.</p><p>Fonts should align with the theme and purpose of your content. A modern sans-serif font may reflect innovation, while a classic serif font conveys elegance and reliability.</p>',
                'featured_image' => 'images/post-2.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(3),
                'meta_title' => 'Typography Tips for Effective Visual Communication',
                'meta_description' => 'Master typography principles to enhance readability and create compelling visual designs.',
                'tags' => ['Typography', 'UI/UX', 'Creative']
            ],
            [
                'title' => 'Breaking Down the Design Process From Concept to Completion',
                'slug' => 'design-process-concept-completion',
                'excerpt' => 'A comprehensive guide to the design process from initial concept to final delivery.',
                'content' => '<p>The design process is a systematic approach to solving visual problems and creating effective solutions. It involves several key stages that help designers organize their thoughts and create better outcomes.</p><p>From research and ideation to prototyping and final delivery, each stage plays a crucial role in the success of a design project. Understanding this process can help both designers and clients work more effectively together.</p><p>Research is the foundation of any successful design project. Understanding your audience, competitors, and market trends helps inform design decisions and ensures your solution meets real needs.</p>',
                'featured_image' => 'images/post-3.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(1),
                'meta_title' => 'Design Process Guide - From Concept to Completion',
                'meta_description' => 'Learn the complete design process from research to final delivery. Master the stages of effective design.',
                'tags' => ['Web Design', 'UI/UX', 'Innovative']
            ],
        ];

        foreach ($blogPosts as $post) {
            $tags = $post['tags'];
            unset($post['tags']);
            
            $post['author_id'] = $author->id;
            $blog = Blog::create($post);
            
            // Attach tags
            foreach ($tags as $tagName) {
                $tag = BlogTag::where('name', $tagName)->first();
                if ($tag) {
                    $blog->tags()->attach($tag->id);
                }
            }
            
            // Calculate reading time
            $blog->calculateReadingTime();
        }
    }
}
