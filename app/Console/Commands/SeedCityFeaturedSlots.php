<?php

namespace App\Console\Commands;

use App\Models\CityFeaturedSlot;
use App\Models\CityPage;
use Illuminate\Console\Command;

class SeedCityFeaturedSlots extends Command
{
    protected $signature = 'cities:seed-featured-slots';
    protected $description = 'Create 3 featured ad slots for every city page.';

    public function handle(): int
    {
        $created = 0;

        CityPage::query()->select('id')->chunkById(100, function ($cities) use (&$created) {
            foreach ($cities as $city) {
                for ($i = 1; $i <= 3; $i++) {
                    $slot = CityFeaturedSlot::firstOrCreate(
                        ['city_page_id' => $city->id, 'slot_number' => $i],
                        [
                            'label' => $i === 1 ? 'Slot 1 - Top' : 'Slot '.$i,
                            'monthly_price_cents' => $i === 1 ? 59900 : ($i === 2 ? 39900 : 29900),
                            'yearly_price_cents' => $i === 1 ? 599000 : ($i === 2 ? 399000 : 299000),
                            'yearly_discount_percent' => 17,
                            'perks' => [
                                'Sponsored label on city page',
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
        });

        $this->info("City featured slots created: {$created}");

        return self::SUCCESS;
    }
}
