<?php

namespace App\Console\Commands;

use App\Models\ResourceFeaturedSlot;
use App\Models\ResourcePage;
use Illuminate\Console\Command;

class SeedResourceFeaturedSlots extends Command
{
    protected $signature = 'resources:seed-featured-slots';
    protected $description = 'Create 3 featured ad slots for every resource page.';

    public function handle(): int
    {
        $created = 0;

        ResourcePage::query()->select('id')->chunkById(100, function ($resources) use (&$created) {
            foreach ($resources as $resource) {
                for ($i = 1; $i <= 3; $i++) {
                    $slot = ResourceFeaturedSlot::firstOrCreate(
                        ['resource_page_id' => $resource->id, 'slot_number' => $i],
                        [
                            'label' => $i === 1 ? 'Slot 1 - Top' : 'Slot '.$i,
                            'monthly_price_cents' => $i === 1 ? 59900 : ($i === 2 ? 39900 : 29900),
                            'yearly_price_cents' => $i === 1 ? 599000 : ($i === 2 ? 399000 : 299000),
                            'yearly_discount_percent' => 17,
                            'perks' => [
                                'Sponsored label on resource page',
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

        $this->info("Resource featured slots created: {$created}");

        return self::SUCCESS;
    }
}
