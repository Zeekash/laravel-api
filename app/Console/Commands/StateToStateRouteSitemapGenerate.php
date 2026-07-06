<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;
use App\Models\StateToStateRoute;

class StateToStateRouteSitemapGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statetostateroute:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an State To State Route Pages XML Sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
{
    $routesitemap = Sitemap::create();
    $baseUrl = "https://mymovingjourney.com";

    $routes = StateToStateRoute::with(['stateFrom', 'stateTo'])
        ->orderBy('state_from_id', 'asc')
        ->get();

    $htmlSitemap = '<html><head><title>State To State Routes</title></head><body>';
    $htmlSitemap .= '<h2>State To State Routes</h2><ul>';

    foreach ($routes as $route) {
        if (!$route->stateFrom || !$route->stateTo) {
            continue;
        }

        // Convert state names to URL-friendly slugs
        $fromSlug = strtolower($route->stateFrom->abv);
        $toSlug = strtolower($route->stateTo->abv);

        $fullUrl = "{$baseUrl}/moving-routes/{$fromSlug}/{$toSlug}";

        // Add to XML sitemap
        $routesitemap->add(
            Url::create($fullUrl)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        );

        // Add to HTML sitemap
        $htmlSitemap .= "<li><a style='text-decoration: none; color: black;' href='{$fullUrl}'>{$route->stateFrom->name} to {$route->stateTo->name}</a></li>";

        // Console log
        $this->info("$fullUrl added.");
    }

    $htmlSitemap .= '</ul></body></html>';

    // Write both sitemaps
    $routesitemap->writeToFile(public_path('statetostate.routes.sitemap.xml'));
    file_put_contents(public_path('statetostate.routes.sitemap.html'), $htmlSitemap);

    $this->info('Sitemap generation complete.');
}
}
