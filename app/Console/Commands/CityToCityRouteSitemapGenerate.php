<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\CityToCityRoute;

class CityToCityRouteSitemapGenerate extends Command
{
    protected $signature = 'citytocityroute-sitemap:generate';
    protected $description = 'Generate City to City Same State Routes XML Sitemap';

    public function handle()
    {
        $baseUrl = 'https://mymovingjourney.com';
        $perFile = 1000;
        $batch   = 0;

        $total = CityToCityRoute::whereHas('cityFrom.state', function ($q) {
            $q->whereColumn('states.id', 'city_pages.state_id');
        })->count();

        if ($total === 0) {
            $this->info('No city to city routes found.');
            return Command::SUCCESS;
        }

        CityToCityRoute::with(['cityFrom.state', 'cityTo.state'])
            ->whereHas('cityFrom.state', function ($q) {
                $q->whereColumn('states.id', 'city_pages.state_id');
            })
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

                    // SAME STATE ONLY
                    if ($route->cityFrom->state->id !== $route->cityTo->state->id) {
                        continue;
                    }

                    $stateAbv = strtolower($route->cityFrom->state->abv);
                    $fromSlug = $route->cityFrom->slug;
                    $toSlug   = $route->cityTo->slug;

                    $url = "{$baseUrl}/moving-routes/{$stateAbv}/{$fromSlug}-to-{$toSlug}";

                    $sitemap->add(
                        Url::create($url)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    );

                    $this->info("[Batch {$batch}] {$url}");
                }

                $fileName = public_path("citytocity.routes.sitemap_{$batch}.xml");
                $sitemap->writeToFile($fileName);
            });

        $this->info('City to city same state routes xml sitemap generated successfully.');
        return Command::SUCCESS;
    }
}
