<?php

namespace App\Console\Commands;

use Spatie\Sitemap\Sitemap;
use App\Models\ResourcePage;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;

class ResourceSitemapGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resource-sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an Resource Pages XML Sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $resourcesitemap = Sitemap::create();
        $baseUrl = "https://mymovingjourney.com"; // Base URL for the links

        // Generating XML sitemap
        $resources = ResourcePage::all()->each(function (ResourcePage $resource,) use ($resourcesitemap, $baseUrl) {
            $resourcesitemap->add(
                Url::create("{$baseUrl}/resource/{$resource->slug}")
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });
        foreach ($resources as $resource) {
            $this->info("{$baseUrl}/resource/{$resource->slug} Added.");
        }
        $resourcesitemap->writeToFile(public_path('resources.sitemap.xml'));
        $htmlSitemap = '<html><head><title>Moving Resrouces Sitemap</title></head><h2>Moving Resources</h2><body><ul>';
        ResourcePage::all()->each(function (ResourcePage $resource) use (&$htmlSitemap, $baseUrl) {
            $htmlSitemap .= "<li><a style='text-decoration: none; color:black;'  href='{$baseUrl}/resource/{$resource->slug}'>{$resource->title}</a></li>";
        });
        $htmlSitemap .= '</ul></body></html>';
        file_put_contents(public_path('resources.sitemap.html'), $htmlSitemap);
    }
}
