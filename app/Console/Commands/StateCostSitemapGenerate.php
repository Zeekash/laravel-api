<?php

namespace App\Console\Commands;

use App\Models\StateCostPage;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;

class StateCostSitemapGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'state-cost-sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $stateMoveCostSitemap = Sitemap::create();
        $baseUrl = "https://mymovingjourney.com"; // Base URL for the links

        // Generating XML sitemap
        $state_cost_pages = StateCostPage::select('state_cost_pages.*')
        ->join('states', 'state_cost_pages.state_id', '=', 'states.id')
        ->orderBy('states.name', 'asc')
        ->orderBy('state_cost_pages.state_id', 'asc')
        ->get()->each(function (StateCostPage $stateCostPage) use ($stateMoveCostSitemap, $baseUrl) {
            $stateMoveCostSitemap->add(
                Url::create("{$baseUrl}/move-cost/{$stateCostPage->slug}")
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });

        foreach ($state_cost_pages as $stateCostPage) {
            $this->info(" {$baseUrl}/move-cost/{$stateCostPage->slug} Added.");
        }
        $stateMoveCostSitemap->writeToFile(public_path('state-move-cost.sitemap.xml'));

        // Generating HTML sitemap
        $htmlSitemap = '<html><head><title>State Move Cost Sitemap</title></head><h2>State Move Cost Page</h2><body><ul>';
        StateCostPage::select('state_cost_pages.*')
        ->join('states', 'state_cost_pages.state_id', '=', 'states.id')
        ->orderBy('states.name', 'asc')
        ->orderBy('state_cost_pages.state_id', 'asc')
        ->get()->each(function (StateCostPage $stateCostPage) use (&$htmlSitemap, $baseUrl) {
            $htmlSitemap .= "<li><a style='text-decoration: none; color:black;' href='{$baseUrl}/move-cost/{$stateCostPage->slug}'>{$stateCostPage->state->name}</a></li>";
        });
        $htmlSitemap .= '</ul></body></html>';

        file_put_contents(public_path('state-move-cost.sitemap.html'), $htmlSitemap);
    }
}
