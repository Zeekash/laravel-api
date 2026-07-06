<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ResourceFeaturedSlot;
use App\Models\ResourcePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResourceFeaturedSlotController extends Controller
{
    public function index(Request $request)
    {
        $this->ensureSlotsForAllResources();

        $selectedResourceId = $request->get('resource_page_id');
        $selectedSlotStatus = $request->get('slot_status');
        $search = trim((string) $request->get('search'));

        $resources = ResourcePage::query()
            ->orderBy('title')
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

        $statsSlotsQuery = ResourceFeaturedSlot::query()
            ->with(['activeSubscription', 'pendingReservation']);

        if (! empty($selectedResourceId)) {
            $statsSlotsQuery->where('resource_page_id', $selectedResourceId);
        }

        if ($search !== '') {
            $statsSlotsQuery->whereHas('resourcePage', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
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

        $query = ResourcePage::query()
            ->with([
                'featuredSlots' => function ($q) {
                    $q->orderBy('slot_number');
                },
                'featuredSlots.activeSubscription.company',
                'featuredSlots.pendingReservation',
            ])
            ->orderBy('title');

        if (! empty($selectedResourceId)) {
            $query->where('id', $selectedResourceId);
        }

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
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

        $resourcesWithSlots = $query->paginate(10)->appends($request->query());

        return view('backend.pages.resource-featured-slots.index', compact(
            'resources',
            'resourcesWithSlots',
            'selectedResourceId',
            'selectedSlotStatus',
            'slotStats',
            'search'
        ));
    }

    public function updateMany(Request $request)
    {
        $data = $request->validate([
            'slots' => ['required', 'array'],
            'slots.*.id' => ['required', 'integer', 'exists:resource_featured_slots,id'],
            'slots.*.label' => ['nullable', 'string', 'max:100'],
            'slots.*.monthly_price' => ['required', 'numeric', 'min:1'],
            'slots.*.yearly_price' => ['required', 'numeric', 'min:1'],
            'slots.*.yearly_discount_percent' => ['nullable', 'integer', 'min:0', 'max:100'],
            'slots.*.perks' => ['nullable', 'string'],
            'slots.*.is_active' => ['nullable', 'boolean'],
        ]);

        DB::transaction(function () use ($data) {
            foreach ($data['slots'] as $slotData) {
                $slot = ResourceFeaturedSlot::findOrFail($slotData['id']);

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

        return back()->with('success', 'Resource featured ad slots updated successfully.');
    }

    private function ensureSlotsForAllResources(): void
    {
        ResourcePage::query()->select('id')->chunkById(100, function ($resources) {
            foreach ($resources as $resource) {
                for ($i = 1; $i <= 3; $i++) {
                    ResourceFeaturedSlot::firstOrCreate(
                        [
                            'resource_page_id' => $resource->id,
                            'slot_number' => $i,
                        ],
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
                }
            }
        });
    }
}
