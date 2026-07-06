<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\StateToCityRoute;
use App\Services\MovingMilesCostCalculator;

class StoreStateToCityMiles extends Command
{
    protected $signature = 'routes:store-miles 
                            {--force : Recalculate miles even if already stored}';

    protected $description = 'Calculate and store miles & duration for all state-to-city routes using Google Directions API';

    public function handle(): int
    {
        $this->info('🚀 Starting state-to-city miles calculation');

        $calculator = new MovingMilesCostCalculator();
        $force = (bool) $this->option('force');

        $query = StateToCityRoute::query()
            ->when(!$force, fn ($q) => $q->whereNull('miles'))
            ->with(['stateFrom', 'cityTo.state']);

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
                    !$route->stateFrom ||
                    !$route->cityTo ||
                    !$route->cityTo->state
                ) {
                    $this->warn("⚠️  Skipping route ID {$route->id} (missing relations)");
                    $bar->advance();
                    continue;
                }

                $origin = "{$route->stateFrom->name}, USA";
                $destination = "{$route->cityTo->name}, {$route->cityTo->state->abv}, USA";

                $data = $calculator->calculateDistance($origin, $destination);

                if (
                    !is_array($data) ||
                    empty($data['miles']) ||
                    $data['miles'] <= 0
                ) {
                    $this->error("❌ Failed: {$origin} → {$destination}");
                    $bar->advance();
                    continue;
                }

                $route->update([
                    'miles' => round($data['miles'], 2),
                    'duration_seconds' => $data['duration'] ?? null,
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
        $this->newLine();
        $this->info('✅ State-to-city miles calculation completed');

        return Command::SUCCESS;
    }
}
