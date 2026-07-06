<?php

namespace App\Console\Commands;

use App\Models\MovingRoute;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;

class RouteSitemapGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route-sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an Route Pages XML Sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $routesitemap = Sitemap::create();
        $baseUrl = "https://mymovingjourney.com"; // Base URL for the links

        // Generating XML sitemap
        $routes = MovingRoute::orderBy('title','asc')->get()->each(function (MovingRoute $route,) use ($routesitemap, $baseUrl) {
            $routesitemap->add(
                Url::create("{$baseUrl}/moving-routes/{$route->slug}")
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });
        foreach ($routes as $route) {
            $this->info("{$baseUrl}/moving-routes/{$route->slug} Added.");
        }
        $routesitemap->writeToFile(public_path('routes.sitemap.xml'));
        $htmlSitemap = '<html><head><title>Moving Routes Sitemap</title></head><h2>Moving Routes</h2><body><ul>';
        MovingRoute::orderBy('title','asc')->get()->each(function (MovingRoute $route) use (&$htmlSitemap, $baseUrl) {
            $htmlSitemap .= "<li><a style='text-decoration: none; color:black;'  href='{$baseUrl}/moving-routes/{$route->slug}'>{$route->title}</a></li>";
        });
        $htmlSitemap .= '</ul></body></html>';
        file_put_contents(public_path('routes.sitemap.html'), $htmlSitemap);
    }
}
