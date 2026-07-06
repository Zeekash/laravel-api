<?php

namespace App\Console\Commands;

use App\Models\State;
use App\Models\CityPage;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;

class StateRouteSitemapGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'state-route-sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate a State Routes Hub Pages XML Sitemap';

    public function handle()
    {
        $stateRouteSitemap = Sitemap::create();
        $baseUrl = "https://mymovingjourney.com";


        // States that have state-to-state routes
        $statesWithStateToState = State::whereHas('stateToStateRoutes')
            ->pluck('id')->toArray();

        // States that have state-to-city routes
        $statesWithStateToCity = State::whereHas('stateToCityRoutes')
            ->pluck('id')->toArray();

        // States with cities having city-to-city OR city-to-state routes
        $statesWithCitiesHavingRoutes = CityPage::where(function ($q) {
                $q->whereHas('cityToCityRoutes')
                  ->orWhereHas('cityToStateRoutes');
            })
            ->pluck('state_id')
            ->unique()
            ->toArray();

        // Merge + unique
        $allStateIds = array_unique(array_merge(
            $statesWithStateToState,
            $statesWithStateToCity,
            $statesWithCitiesHavingRoutes
        ));

        // Fetch the states
        $states = State::whereIn('id', $allStateIds)
            ->orderBy('name', 'asc')
            ->get();


        // GENERATE XML SITEMAP
        foreach ($states as $state) {
            $stateAbvLower = strtolower($state->abv);

            $stateRouteSitemap->add(
                Url::create("{$baseUrl}/moving-routes/{$stateAbvLower}")
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );

            $this->info("{$baseUrl}/moving-routes/{$stateAbvLower} Added.");
        }

        $stateRouteSitemap->writeToFile(public_path('state-route.sitemap.xml'));


        /**
         * ---------------------------------------------
         * 3. GENERATE HTML SITEMAP
         * ---------------------------------------------
         */
        $htmlSitemap = '<html><head><title>State Routes Sitemap</title></head><body><h2>State Routes</h2><ul>';

        foreach ($states as $state) {
            $stateAbvLower = strtolower($state->abv);
            $htmlSitemap .= "<li><a style='text-decoration: none; color:black;' href='{$baseUrl}/moving-routes/{$stateAbvLower}'>{$state->name} Routes</a></li>";
        }

        $htmlSitemap .= '</ul></body></html>';

        file_put_contents(public_path('state-route.sitemap.html'), $htmlSitemap);

        return Command::SUCCESS;
    }
}
