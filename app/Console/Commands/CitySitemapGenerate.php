<?php

namespace App\Console\Commands;

use App\Models\CityPage;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Sitemap;
use Illuminate\Console\Command;

class CitySitemapGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'city-sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an Cities XML Sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cityPageSitemap = Sitemap::create();
        $baseUrl = "https://mymovingjourney.com"; // Base URL for the links

        // Generating XML sitemap
        $city_pages = CityPage::orderBy('name','asc')->get()->each(function (CityPage $cityPage,) use ($cityPageSitemap, $baseUrl) {
            $cityPageSitemap->add(
                Url::create("{$baseUrl}/movers/{$cityPage->state->slug}/{$cityPage->slug}")
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });
        foreach ($city_pages as $cityPage) {
            $this->info("{$baseUrl}/movers/{$cityPage->state->slug}/{$cityPage->slug} Added.");
        }
        $cityPageSitemap->writeToFile(public_path('city.sitemap.xml'));

        $htmlSitemap = '<html><head><title>Cities Sitemap</title></head><h2>Cities</h2><body><ul>';
        CityPage::orderBy('name','asc')->get()->each(function (CityPage $cityPage) use (&$htmlSitemap, $baseUrl) {
            $htmlSitemap .= "<li><a style='text-decoration: none; color:black;'  href='{$baseUrl}/movers/{$cityPage->state->slug}/{$cityPage->slug}'>{$cityPage->name}</a></li>";
        });
        $htmlSitemap .= '</ul></body></html>';
        file_put_contents(public_path('city.sitemap.html'), $htmlSitemap);
    }
}
