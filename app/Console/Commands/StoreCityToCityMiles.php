<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CityToCityRoute;
use App\Services\MovingMilesCostCalculator;
use Illuminate\Support\Facades\Log;

class StoreCityToCityMiles extends Command
{
    protected $signature = 'routes:store-city-to-city-miles 
                            {--force : Recalculate even if miles already exist}';

    protected $description = 'Store city-to-city route miles using Google Directions API';

    public function handle(): int
    {
        $calculator = new MovingMilesCostCalculator();
        $force = (bool) $this->option('force');

        $query = CityToCityRoute::query()
            ->select(['id', 'city_from_id', 'city_to_id', 'miles'])
            ->with([
                'cityFrom:id,name,state_id',
                'cityFrom.state:id,abv',
                'cityTo:id,name,state_id',
                'cityTo.state:id,abv',
            ])
            ->whereHas('cityFrom')
            ->whereHas('cityTo');

        if (!$force) {
            $query->whereNull('miles');
        }

        $total = $query->count();

        if ($total === 0) {
            $this->info('✅ No city-to-city routes to process.');
            return Command::SUCCESS;
        }

        $this->info("🚚 Processing {$total} city-to-city routes...");
        $bar = $this->output->createProgressBar($total);
        $bar->start();

        foreach ($query->cursor() as $route) {

            try {
                if (!$force && !is_null($route->miles)) {
                    $bar->advance();
                    continue;
                }

                $origin = "{$route->cityFrom->name}, {$route->cityFrom->state->abv}, USA";
                $destination = "{$route->cityTo->name}, {$route->cityTo->state->abv}, USA";

                $distance = $calculator->calculateDistance($origin, $destination);

                if ($distance['miles'] > 0) {
                    $route->update([
                        'miles' => round($distance['miles'], 2),
                    ]);
                }

                // 🔥 Free memory
                $route->unsetRelations();
                unset($route);
                gc_collect_cycles();

                // ⏳ Google API rate-limit safety
                sleep(1);

            } catch (\Throwable $e) {
                Log::error('City-to-city miles error', [
                    'route_id' => $route->id ?? null,
                    'error' => $e->getMessage(),
                ]);
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('✅ City-to-city miles stored successfully.');

        return Command::SUCCESS;
    }
}
