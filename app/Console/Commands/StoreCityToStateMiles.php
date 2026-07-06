<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CityToStateRoute;
use App\Services\MovingMilesCostCalculator;

class StoreCityToStateMiles extends Command
{
    protected $signature = 'routes:store-city-to-state-miles 
                            {--force : Recalculate miles even if already stored}';

    protected $description = 'Calculate and store miles for city-to-state routes using Google Directions API';

    public function handle(): int
    {
        $this->info('🚀 Starting city-to-state miles calculation');

        $calculator = new MovingMilesCostCalculator();
        $force = (bool) $this->option('force');

        $query = CityToStateRoute::query()
            ->when(!$force, fn ($q) => $q->whereNull('miles'))
            ->with(['cityFrom.state', 'stateTo']);

        $total = $query->count();

        if ($total === 0) {
            $this->info('✅ No routes to process');
            return Command::SUCCESS;
        }

        $this->info("🔍 Processing {$total} routes");
        $bar = $this->output->createProgressBar($total);
        $bar->start();

        $query->chunk(25, function ($routes) use ($calculator, $bar) {

            foreach ($routes as $route) {

                if (
                    !$route->cityFrom ||
                    !$route->cityFrom->state ||
                    !$route->stateTo
                ) {
                    $this->warn("⚠️  Skipping route ID {$route->id} (missing relations)");
                    $bar->advance();
                    continue;
                }

                $origin = "{$route->cityFrom->name}, {$route->cityFrom->state->abv}, USA";
                $destination = "{$route->stateTo->name}, USA";

                $data = $calculator->calculateDistance($origin, $destination);

                if (empty($data['miles']) || $data['miles'] <= 0) {
                    $this->error("❌ Failed: {$origin} → {$destination}");
                    $bar->advance();
                    continue;
                }

                $route->update([
                    'miles' => round($data['miles'], 2),
                ]);

                $this->line(
                    "✔ Route {$route->id}: {$origin} → {$destination} ({$route->miles} miles)"
                );

                // 🔥 Google API rate-limit protection
                sleep(1);

                $bar->advance();
            }
        });

        $bar->finish();
        $this->info('✅ City-to-state miles calculation completed');

        return Command::SUCCESS;
    }
}
