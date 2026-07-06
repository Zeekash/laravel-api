<?php

namespace App\Console\Commands;

use App\Models\PostCategory;
use Illuminate\Console\Command;

class BlogLiveUrlsGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog-live-url:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $baseUrl = "https://mymovingjourney.com"; // Base URL for the links

        // Fetch all categories with their posts
        $categories = PostCategory::with(['posts' => function ($query) {
            $query->where('is_published', 1);
        }])->get();

        // Start building the HTML sitemap with noindex, nofollow
        $htmlSitemap = '<html>
                    <head>
                        <title>Blogs Sitemap</title>
                        <meta name="robots" content="noindex, nofollow">
                    </head>
                    <body>';

        foreach ($categories as $category) {
            $htmlSitemap .= "<h2>" . htmlspecialchars($category->name) . "</h2><ul>";

            foreach ($category->posts as $post) {
                $htmlSitemap .= "<li><a style='text-decoration: none; color:black;' href='{$baseUrl}/blogs/{$post->slug}'>{$post->title}</a></li>";
            }

            $htmlSitemap .= "</ul>";
        }

        $htmlSitemap .= '</body></html>';

        // Save HTML sitemap
        file_put_contents(public_path('blog-live-urls.html'), $htmlSitemap);
    }
}
