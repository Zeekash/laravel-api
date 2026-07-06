<?php

namespace App\Console\Commands;

use App\Models\Post;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;

class BlogSitemapGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog-sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate a Blog XML Sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         $postsitemap = Sitemap::create();
        $baseUrl = "https://mymovingjourney.com"; // Base URL for the links

        // Generating XML sitemap
        $posts = Post::where('is_published', '1')->get()->each(function (Post $post) use ($postsitemap, $baseUrl) {
            $postsitemap->add(
                Url::create("{$baseUrl}/blogs/{$post->slug}")
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });

        foreach ($posts as $post) {
            $this->info(" {$baseUrl}/blogs/{$post->slug} Added.");
        }
        $postsitemap->writeToFile(public_path('blog.sitemap.xml'));

        // Generating HTML sitemap
        $htmlSitemap = '<html><head><title>Blogs Sitemap</title></head><h2>Blogs</h2><body><ul>';
        Post::where('is_published', '1')->get()->each(function (Post $post) use (&$htmlSitemap, $baseUrl) {
            $htmlSitemap .= "<li><a style='text-decoration: none; color:black;' href='{$baseUrl}/blogs/{$post->slug}'>{$post->title}</a></li>";
        });
        $htmlSitemap .= '</ul></body></html>';

        file_put_contents(public_path('blog.sitemap.html'), $htmlSitemap);
    }
}
