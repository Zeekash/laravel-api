<?php

namespace App\Console\Commands;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;
use App\Models\CityToStateRoute;

class CityToStateRouteSitemapGenerate extends Command
{
    protected $signature = 'citytostateroute-sitemap:generate';
    protected $description = 'Automatically Generate City To State Routes XML Sitemap';

    public function handle()
    {
        $baseUrl = "https://mymovingjourney.com";
        $perFile = 1000;
        $batch   = 0;
        $total   = CityToStateRoute::count();

        $this->info("Total routes found: {$total}");

        if ($total === 0) {
            $this->info('No routes found. Nothing to generate.');
            return Command::SUCCESS;
        }

        CityToStateRoute::with([
                'cityFrom',
                'cityFrom.state',
                'stateTo'
            ])
            ->orderBy('city_from_id', 'asc')
            ->chunk($perFile, function ($routes) use (&$batch, $baseUrl) {

                $batch++;
                $routeSitemap = Sitemap::create();

                foreach ($routes as $route) {

                    if (
                        !$route->cityFrom ||
                        !$route->cityFrom->state ||
                        !$route->stateTo
                    ) {
                        continue;
                    }

                    $fromStateAbv = strtolower($route->cityFrom->state->abv);
                    $toStateAbv   = strtolower($route->stateTo->abv);

                    $fromCitySlug = $route->cityFrom->slug;
                    $toStateSlug  = $route->stateTo->slug;

                    $fullUrl = "{$baseUrl}/moving-routes/{$fromStateAbv}/{$toStateAbv}/{$fromCitySlug}-to-{$toStateSlug}";

                    $routeSitemap->add(Url::create($fullUrl)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));

                    $this->info("[Batch {$batch}] Added URL: {$fullUrl}");
                }

                $xmlName = public_path("citytostate.routes.sitemap_{$batch}.xml");
                $routeSitemap->writeToFile($xmlName);
            });

        $this->info('City to state routes xml sitemap generated successfully.');
        return Command::SUCCESS;
    }
}
