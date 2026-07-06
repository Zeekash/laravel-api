<?php

namespace App\Console\Commands;

use App\Models\BestStatePage;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;

class BestStateSitemapGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'best-state-sitemap:generate';

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
        $bestStatePageSitemap = Sitemap::create();
        $baseUrl = "https://mymovingjourney.com"; // Base URL for the links

        // Generating XML sitemap
        $best_state_pages = BestStatePage::select('best_state_pages.*')
        ->join('states', 'best_state_pages.state_id', '=', 'states.id')
        ->orderBy('states.name', 'asc')
        ->orderBy('best_state_pages.state_id', 'asc')
        ->get()->each(function (BestStatePage $bestStatePage) use ($bestStatePageSitemap, $baseUrl) {
            $bestStatePageSitemap->add(
                Url::create("{$baseUrl}/movers/{$bestStatePage->slug}")
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });

        foreach ($best_state_pages as $bestStatePage) {
            $this->info(" {$baseUrl}/movers/{$bestStatePage->slug} Added.");
        }
        $bestStatePageSitemap->writeToFile(public_path('mover-states.sitemap.xml'));

        // Generating HTML sitemap
        $htmlSitemap = '<html><head><title>Best State Sitemap</title></head><h2>Best States Page</h2><body><ul>';
        BestStatePage::select('best_state_pages.*')
        ->join('states', 'best_state_pages.state_id', '=', 'states.id')
        ->orderBy('states.name', 'asc')
        ->orderBy('best_state_pages.state_id', 'asc')
        ->get()->each(function (BestStatePage $bestStatePage) use (&$htmlSitemap, $baseUrl) {
            $htmlSitemap .= "<li><a style='text-decoration: none; color:black;' href='{$baseUrl}/movers/{$bestStatePage->slug}'>{$bestStatePage->state->name}</a></li>";
        });
        $htmlSitemap .= '</ul></body></html>';

        file_put_contents(public_path('mover-states.sitemap.html'), $htmlSitemap);
    }
}
