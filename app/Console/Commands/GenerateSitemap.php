<?php

namespace App\Console\Commands;

use App\Models\Company;
use Corcel\Model\Post;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        // $postsitemap = Sitemap::create();
        // $baseUrl = "https://mymovingjourney.com"; // Base URL for the links

        // // Generating XML sitemap
        // Post::where('post_status', 'publish')->get()->each(function (Post $post) use ($postsitemap, $baseUrl) {
        //     $postsitemap->add(
        //         Url::create("{$baseUrl}/moving-resources/{$post->post_name}")
        //             ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        //     );
        // });

        // $postsitemap->writeToFile(public_path('blog.sitemap.xml'));

        // // Generating HTML sitemap
        // $htmlSitemap = '<html><head><title>Blogs Sitemap</title></head><h1>Blogs Sitemap</h1><body><ul>';
        // Post::where('post_status', 'publish')->get()->each(function (Post $post) use (&$htmlSitemap, $baseUrl) {
        //     $htmlSitemap .= "<li><a style='text-decoration: none; color:black;' href='{$baseUrl}/moving-resources/{$post->post_name}'>{$post->post_title}</a></li>";
        // });
        // $htmlSitemap .= '</ul></body></html>';

        // file_put_contents(public_path('blog.sitemap.html'), $htmlSitemap);

        $companysitmap = Sitemap::create();
        $baseUrl = "https://mymovingjourney.com"; // Base URL for the links

        // Generating XML sitemap
        $comps = Company::where('is_email_verified', 1)->get()->each(function (Company $company) use ($companysitmap, $baseUrl) {
            $companysitmap->add(
                Url::create("{$baseUrl}/mover/{$company->slug}")
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });

        foreach ($comps as $comp) {
            $this->info("{$baseUrl}/mover/{$comp->slug} Added.");
        } 

        $companysitmap->writeToFile(public_path('company.sitemap.xml'));

        // Generating HTML sitemap
        $htmlSitemap = '<html><head><title>Company Sitemap</title></head><h2>Moving Companies</h2><body><ul>';
        Company::where('is_email_verified', 1)->get()->each(function (Company $company) use (&$htmlSitemap, $baseUrl) {
            $htmlSitemap .= "<li><a style='text-decoration: none; color:black;'  href='{$baseUrl}/mover/{$company->slug}'>{$company->company_name}</a></li>";
        });
        $htmlSitemap .= '</ul></body></html>';

        file_put_contents(public_path('company.sitemap.html'), $htmlSitemap);
    }
}
