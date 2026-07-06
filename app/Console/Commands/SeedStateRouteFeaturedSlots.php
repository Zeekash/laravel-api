<?php

namespace App\Console\Commands;

use App\Models\State;
use App\Models\StateRouteFeaturedSlot;
use Illuminate\Console\Command;

class SeedStateRouteFeaturedSlots extends Command
{
    protected $signature = 'routes:seed-featured-slots';
    protected $description = 'Create 3 featured slots for every from-state to to-state route without using a state_routes table.';

    public function handle(): int
    {
        $states = State::query()->select(['id', 'name', 'abv'])->orderBy('name')->get();
        $created = 0;

        foreach ($states as $fromState) {
            foreach ($states as $toState) {
                if ((int) $fromState->id === (int) $toState->id) {
                    continue;
                }

                for ($i = 1; $i <= 3; $i++) {
                    $slot = StateRouteFeaturedSlot::firstOrCreate(
                        [
                            'from_state_id' => $fromState->id,
                            'to_state_id' => $toState->id,
                            'slot_number' => $i,
                        ],
                        [
                            'label' => $i === 1 ? 'Slot 1 - Top' : 'Slot '.$i,
                            'monthly_price_cents' => $i === 1 ? 49900 : ($i === 2 ? 39900 : 29900),
                            'yearly_price_cents' => $i === 1 ? 499000 : ($i === 2 ? 399000 : 299000),
                            'yearly_discount_percent' => 20,
                            'perks' => [
                                'Sponsored label on route page',
                                'Higher visibility for verified movers',
                                'Monthly performance exposure',
                            ],
                            'is_active' => true,
                            'sort_order' => $i,
                        ]
                    );

                    if ($slot->wasRecentlyCreated) {
                        $created++;
                    }
                }
            }
        }

        $this->info("Route featured slots ready. New slots created: {$created}");

        return self::SUCCESS;
    }
}
