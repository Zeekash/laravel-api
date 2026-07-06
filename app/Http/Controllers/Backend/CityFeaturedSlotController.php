<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CityFeaturedSlot;
use App\Models\CityPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityFeaturedSlotController extends Controller
{
    public function index(Request $request)
    {
        $this->ensureSlotsForAllCities();

        $selectedCityId = $request->get('city_page_id');
        $selectedSlotStatus = $request->get('slot_status');
        $search = trim((string) $request->get('search'));

        $cities = CityPage::query()
            ->with('state')
            ->orderBy('name')
            ->get();

        $slotFinalStatus = function ($slot) {
            if (! $slot->is_active) {
                return 'inactive';
            }

            if ($slot->activeSubscription) {
                return 'taken';
            }

            if ($slot->pendingReservation) {
                return 'reserved';
            }

            return 'available';
        };

        $statsSlotsQuery = CityFeaturedSlot::query()
            ->with(['activeSubscription', 'pendingReservation']);

        if (! empty($selectedCityId)) {
            $statsSlotsQuery->where('city_page_id', $selectedCityId);
        }

        if ($search !== '') {
            $statsSlotsQuery->whereHas('cityPage', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        $statsSlots = $statsSlotsQuery->get();

        $slotStats = [
            'total' => $statsSlots->count(),
            'available' => $statsSlots->filter(fn ($slot) => $slotFinalStatus($slot) === 'available')->count(),
            'taken' => $statsSlots->filter(fn ($slot) => $slotFinalStatus($slot) === 'taken')->count(),
            'reserved' => $statsSlots->filter(fn ($slot) => $slotFinalStatus($slot) === 'reserved')->count(),
            'inactive' => $statsSlots->filter(fn ($slot) => $slotFinalStatus($slot) === 'inactive')->count(),
        ];

        $query = CityPage::query()
            ->with([
                'state',
                'featuredSlots' => function ($q) {
                    $q->orderBy('slot_number');
                },
                'featuredSlots.activeSubscription.company',
                'featuredSlots.pendingReservation',
            ])
            ->orderBy('name');

        if (! empty($selectedCityId)) {
            $query->where('id', $selectedCityId);
        }

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        if ($selectedSlotStatus === 'taken') {
            $query->whereHas('featuredSlots.activeSubscription');
        }

        if ($selectedSlotStatus === 'reserved') {
            $query->whereHas('featuredSlots.pendingReservation');
        }

        if ($selectedSlotStatus === 'inactive') {
            $query->whereHas('featuredSlots', fn ($q) => $q->where('is_active', false));
        }

        if ($selectedSlotStatus === 'available') {
            $query->whereHas('featuredSlots', function ($q) {
                $q->where('is_active', true)
                    ->whereDoesntHave('activeSubscription')
                    ->whereDoesntHave('pendingReservation');
            });
        }

        $citiesWithSlots = $query->paginate(10)->appends($request->query());

        return view('backend.pages.city-featured-slots.index', compact(
            'cities',
            'citiesWithSlots',
            'selectedCityId',
            'selectedSlotStatus',
            'slotStats',
            'search'
        ));
    }

    public function updateMany(Request $request)
    {
        $data = $request->validate([
            'slots' => ['required', 'array'],
            'slots.*.id' => ['required', 'integer', 'exists:city_featured_slots,id'],
            'slots.*.label' => ['nullable', 'string', 'max:100'],
            'slots.*.monthly_price' => ['required', 'numeric', 'min:1'],
            'slots.*.yearly_price' => ['required', 'numeric', 'min:1'],
            'slots.*.yearly_discount_percent' => ['nullable', 'integer', 'min:0', 'max:100'],
            'slots.*.perks' => ['nullable', 'string'],
            'slots.*.is_active' => ['nullable', 'boolean'],
        ]);

        DB::transaction(function () use ($data) {
            foreach ($data['slots'] as $slotData) {
                $slot = CityFeaturedSlot::findOrFail($slotData['id']);

                $perks = collect(preg_split('/\r\n|\r|\n/', (string) ($slotData['perks'] ?? '')))
                    ->map(fn ($perk) => trim($perk))
                    ->filter()
                    ->values()
                    ->all();

                $slot->update([
                    'label' => $slotData['label'] ?? null,
                    'monthly_price_cents' => (int) round(((float) $slotData['monthly_price']) * 100),
                    'yearly_price_cents' => (int) round(((float) $slotData['yearly_price']) * 100),
                    'yearly_discount_percent' => (int) ($slotData['yearly_discount_percent'] ?? 0),
                    'perks' => $perks,
                    'is_active' => (bool) ($slotData['is_active'] ?? false),
                ]);
            }
        });

        return back()->with('success', 'City featured ad slots updated successfully.');
    }

    private function ensureSlotsForAllCities(): void
    {
        CityPage::query()->select('id')->chunkById(100, function ($cities) {
            foreach ($cities as $city) {
                for ($i = 1; $i <= 3; $i++) {
                    CityFeaturedSlot::firstOrCreate(
                        [
                            'city_page_id' => $city->id,
                            'slot_number' => $i,
                        ],
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
                }
            }
        });
    }
}

