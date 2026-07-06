<?php

namespace App\Console\Commands;

use App\Models\CityPage;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;

class CityRouteSitemapGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'city-route-sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate a City Routes Hub Pages XML HTML Sitemap';

    public function handle()
    {
        $cityRouteSitemap = Sitemap::create();
        $baseUrl = "https://mymovingjourney.com";

        // Fetch cities that have city-to-city OR city-to-state routes
        $citiesWithRoutes = CityPage::where(function ($query) {
                $query->has('cityToCityRoutes')
                      ->orWhereHas('cityToStateRoutes');
            })
            ->with('state')
            ->orderBy('name', 'asc')
            ->get();

        $this->info("Found " . $citiesWithRoutes->count() . " cities with moving routes.");

        // GENERATE XML SITEMAP
        foreach ($citiesWithRoutes as $city) {
            $stateAbv = strtolower($city->state->abv);
            $citySlug = $city->slug;

            $url = "{$baseUrl}/moving-routes/{$stateAbv}/{$citySlug}";

            $cityRouteSitemap->add(Url::create($url)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));

            $this->info("{$url} Added.");
        }

        $cityRouteSitemap->writeToFile(public_path('city-route.sitemap.xml'));

        // GENERATE HTML SITEMAP
        $htmlSitemap = '<html><head><title>City Routes Sitemap</title></head><body><h2>City Routes</h2><ul>';

        foreach ($citiesWithRoutes as $city) {
            $stateAbv = strtolower($city->state->abv);
            $citySlug = $city->slug;
            $url = "{$baseUrl}/moving-routes/{$stateAbv}/{$citySlug}";
            
            $htmlSitemap .= "<li><a style='text-decoration: none; color:black;' href='{$url}'>Moving from {$city->city_name}, {$city->state->abv}</a></li>";
        }

        $htmlSitemap .= '</ul></body></html>';

        file_put_contents(public_path('city-route.sitemap.html'), $htmlSitemap);

        return Command::SUCCESS;
    }
}