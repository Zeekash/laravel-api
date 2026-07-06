<?php

namespace App\Console\Commands;

use App\Models\State;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;

class StateSitemapGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'state-sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an States XML Sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         ////////////////////// State SITEMAP //////////////////////
         $statesitemap = Sitemap::create();
         $baseUrl = "https://mymovingjourney.com"; // Base URL for the links
 
         // Generating XML sitemap
         $states = State::orderBy('name','asc')->get()->each(function (State $state,) use ($statesitemap, $baseUrl) {
             $statesitemap->add(
                 Url::create("{$baseUrl}/movers-list/{$state->slug}")
                     ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
             );
         });
         foreach ($states as $state) {
             $this->info("{$baseUrl}/movers-list/{$state->slug} Added.");
         }
         $statesitemap->writeToFile(public_path('state.sitemap.xml'));
         // Generating HTML sitemap
         $htmlSitemap = '<html><head><title>States Sitemap</title></head><h2>States</h2><body><ul>';
         State::orderBy('name','asc')->get()->each(function (State $state) use (&$htmlSitemap, $baseUrl) {
             $htmlSitemap .= "<li><a style='text-decoration: none; color:black;'  href='{$baseUrl}/movers-list/{$state->slug}'>{$state->name}</a></li>";
         });
         $htmlSitemap .= '</ul></body></html>';
         file_put_contents(public_path('state.sitemap.html'), $htmlSitemap);
    }
}
