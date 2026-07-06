<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\CityToCityRoute;

class CityToCityDiffStateRouteSitemapGenerate extends Command
{
    protected $signature = 'citytocitydiffstateroute-sitemap:generate';
    protected $description = 'Generate City to City Different State Routes XML Sitemap';

    public function handle()
    {
        $baseUrl = 'https://mymovingjourney.com';
        $perFile = 1000;
        $batch   = 0;

        $total = CityToCityRoute::whereHas('cityFrom.state')
            ->whereHas('cityTo.state')
            ->whereColumn('city_from_id', '!=', 'city_to_id')
            ->count();

        if ($total === 0) {
            $this->info('No city to city routes found.');
            return Command::SUCCESS;
        }

        CityToCityRoute::with(['cityFrom.state', 'cityTo.state'])
            ->orderBy('city_from_id')
            ->chunk($perFile, function ($routes) use (&$batch, $baseUrl) {

                $batch++;
                $sitemap = Sitemap::create();

                foreach ($routes as $route) {

                    if (
                        !$route->cityFrom ||
                        !$route->cityTo ||
                        !$route->cityFrom->state ||
                        !$route->cityTo->state
                    ) {
                        continue;
                    }

                    // Cities are in the different states
                    if ($route->cityFrom->state->id === $route->cityTo->state->id) {
                        continue;
                    }

                    $fromStateAbv = strtolower($route->cityFrom->state->abv);
                    $toStateAbv   = strtolower($route->cityTo->state->abv);

                    $fromSlug = $route->cityFrom->slug;
                    $toSlug   = $route->cityTo->slug;

                    $url = "{$baseUrl}/moving-routes/{$fromStateAbv}/{$toStateAbv}/{$fromSlug}-to-{$toSlug}";

                    $sitemap->add(
                        Url::create($url)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    );

                    $this->info("[Batch {$batch}] {$url}");
                }

                $fileName = public_path("citytocitydiffstate.routes.sitemap_{$batch}.xml");
                $sitemap->writeToFile($fileName);
            });

        $this->info('City to city different states routes xml sitemap generated successfully.');
        return Command::SUCCESS;
    }
}
