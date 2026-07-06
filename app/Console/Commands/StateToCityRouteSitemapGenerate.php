<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;
use App\Models\StateToCityRoute;

class StateToCityRouteSitemapGenerate extends Command
{
    protected $signature = 'statetocityroute-sitemap:generate';
    protected $description = 'Automatically Generate State To City Routes XML Sitemap';

    public function handle()
    {
        $baseUrl = "https://mymovingjourney.com";
        $perFile = 1000;
        $batch = 0;
        $total = StateToCityRoute::count();

        $this->info("Total routes found: {$total}");

        if ($total === 0) {
            $this->info('No routes found. Nothing to generate.');
            return 0;
        }

        // Chunk of 1000 
        StateToCityRoute::with(['stateFrom', 'cityTo', 'cityTo.state'])
            ->orderBy('state_from_id', 'asc')
            ->chunk($perFile, function ($routes) use (&$batch, $baseUrl) {

                $batch++;

                $routeSitemap = Sitemap::create();

                foreach ($routes as $route) {

                    if (!$route->stateFrom || !$route->cityTo || !$route->cityTo->state) {
                        continue;
                    }

                    $fromStateAbv = strtolower($route->stateFrom->abv);
                    $toStateAbv = strtolower($route->cityTo->state->abv);
                    $fromSlug    = $route->stateFrom->slug;
                    $toSlug      = $route->cityTo->slug;

                    $fullUrl = "{$baseUrl}/moving-routes/{$fromStateAbv}/{$toStateAbv}/{$fromSlug}-to-{$toSlug}";

                    $routeSitemap->add(
                        Url::create($fullUrl)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    );

                    $this->info("[Batch {$batch}] Added URL: {$fullUrl}");
                }

                $xmlName  = public_path("statetocity.routes.sitemap_{$batch}.xml");

                $routeSitemap->writeToFile($xmlName);

            });

        $this->info('State to city routes xml sitemap generated successfully.');
        return 0;
    }
}
