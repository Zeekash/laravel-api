<?php

namespace App\Console\Commands;

use App\Models\State;
use App\Models\StateFeaturedSlot;
use Illuminate\Console\Command;

class SeedStateFeaturedSlots extends Command
{
    protected $signature = 'states:seed-featured-slots';
    protected $description = 'Create 3 featured ad slots for each state if they do not exist.';

    public function handle(): int
    {
        $defaultPrices = [
            1 => ['label' => '1st slot', 'monthly' => 59900, 'yearly' => 599000, 'discount' => 17],
            2 => ['label' => '2nd slot', 'monthly' => 39900, 'yearly' => 399000, 'discount' => 17],
            3 => ['label' => '3rd slot', 'monthly' => 29900, 'yearly' => 299000, 'discount' => 17],
        ];

        $count = 0;

        State::query()->chunkById(100, function ($states) use ($defaultPrices, &$count) {
            foreach ($states as $state) {
                foreach ([1, 2, 3] as $slotNumber) {
                    $price = $defaultPrices[$slotNumber];
                    StateFeaturedSlot::firstOrCreate(
                        ['state_id' => $state->id, 'slot_number' => $slotNumber],
                        [
                            'label' => $price['label'],
                            'monthly_price_cents' => $price['monthly'],
                            'yearly_price_cents' => $price['yearly'],
                            'yearly_discount_percent' => $price['discount'],
                            'perks' => [
                                'Sponsored label on state page',
                                'Higher visibility for verified movers',
                                'Monthly performance exposure',
                            ],
                            'is_active' => true,
                        ]
                    );
                    $count++;
                }
            }
        });

        $this->info("Featured slots checked/created: {$count}");
        return self::SUCCESS;
    }
}
