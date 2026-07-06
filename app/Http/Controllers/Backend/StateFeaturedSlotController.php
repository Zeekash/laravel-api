<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\StateFeaturedSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateFeaturedSlotController extends Controller
{
    public function index(Request $request)
    {
        $selectedStateId = $request->get('state_id');
        $selectedSlotStatus = $request->get('slot_status');

        $states = State::orderBy('name')->get();

        /*
    |--------------------------------------------------------------------------
    | Global Stats - Not page-wise
    |--------------------------------------------------------------------------
    */
        $statsSlotsQuery = StateFeaturedSlot::query()
            ->with([
                'activeSubscription',
                'pendingReservation',
            ]);

        // Optional: if state filter selected, stats will show for that state only.
        // Remove this block if you always want full global stats even after filter.
        if (!empty($selectedStateId)) {
            $statsSlotsQuery->where('state_id', $selectedStateId);
        }

        $statsSlots = $statsSlotsQuery->get();

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

        $slotStats = [
            'total' => $statsSlots->count(),
            'available' => $statsSlots->filter(function ($slot) use ($slotFinalStatus) {
                return $slotFinalStatus($slot) === 'available';
            })->count(),
            'taken' => $statsSlots->filter(function ($slot) use ($slotFinalStatus) {
                return $slotFinalStatus($slot) === 'taken';
            })->count(),
            'reserved' => $statsSlots->filter(function ($slot) use ($slotFinalStatus) {
                return $slotFinalStatus($slot) === 'reserved';
            })->count(),
            'inactive' => $statsSlots->filter(function ($slot) use ($slotFinalStatus) {
                return $slotFinalStatus($slot) === 'inactive';
            })->count(),
        ];

        /*
    |--------------------------------------------------------------------------
    | Paginated State List
    |--------------------------------------------------------------------------
    */
        $query = State::query()
            ->with([
                'featuredSlots' => function ($q) {
                    $q->orderBy('slot_number');
                },
                'featuredSlots.activeSubscription.company',
                'featuredSlots.pendingReservation',
            ])
            ->orderBy('name');

        if (!empty($selectedStateId)) {
            $query->where('id', $selectedStateId);
        }

        if ($selectedSlotStatus === 'taken') {
            $query->whereHas('featuredSlots.activeSubscription');
        }

        if ($selectedSlotStatus === 'reserved') {
            $query->whereHas('featuredSlots.pendingReservation');
        }

        if ($selectedSlotStatus === 'inactive') {
            $query->whereHas('featuredSlots', function ($q) {
                $q->where('is_active', false);
            });
        }

        if ($selectedSlotStatus === 'available') {
            $query->whereHas('featuredSlots', function ($q) {
                $q->where('is_active', true)
                    ->whereDoesntHave('activeSubscription')
                    ->whereDoesntHave('pendingReservation');
            });
        }

        $statesWithSlots = $query
            ->paginate(10)
            ->appends($request->query());

        return view('backend.pages.state-featured-slots.index', compact(
            'states',
            'statesWithSlots',
            'selectedStateId',
            'selectedSlotStatus',
            'slotStats'
        ));
    }

    public function updateMany(Request $request)
    {
        $data = $request->validate([
            'slots' => ['required', 'array'],
            'slots.*.id' => ['required', 'exists:state_featured_slots,id'],
            'slots.*.label' => ['nullable', 'string', 'max:100'],
            'slots.*.monthly_price' => ['required', 'numeric', 'min:1'],
            'slots.*.yearly_price' => ['required', 'numeric', 'min:1'],
            'slots.*.yearly_discount_percent' => ['nullable', 'integer', 'min:0', 'max:100'],
            'slots.*.lead_addon_enabled' => ['nullable', 'boolean'],
            'slots.*.lead_addon_leads_count' => ['nullable', 'integer', 'min:0', 'max:1000'],
            'slots.*.lead_addon_price' => ['nullable', 'numeric', 'min:0'],
            'slots.*.lead_addon_note' => ['nullable', 'string', 'max:500'],
            'slots.*.perks' => ['nullable', 'string'],
            'slots.*.is_active' => ['nullable', 'boolean'],
        ]);

        DB::transaction(function () use ($data) {
            foreach ($data['slots'] as $slotData) {
                $slot = StateFeaturedSlot::findOrFail($slotData['id']);

                $perks = collect(preg_split('/\r\n|\r|\n/', $slotData['perks'] ?? ''))
                    ->map(fn($line) => trim($line))
                    ->filter()
                    ->values()
                    ->all();

                $slot->update([
                    'label' => $slotData['label'] ?? null,
                    'monthly_price_cents' => (int) round(((float) $slotData['monthly_price']) * 100),
                    'yearly_price_cents' => (int) round(((float) $slotData['yearly_price']) * 100),
                    'yearly_discount_percent' => (int) ($slotData['yearly_discount_percent'] ?? 0),
                    'lead_addon_enabled' => (bool) ($slotData['lead_addon_enabled'] ?? false),
                    'lead_addon_leads_count' => (int) ($slotData['lead_addon_leads_count'] ?? 5),
                    'lead_addon_price_cents' => (int) round(((float) ($slotData['lead_addon_price'] ?? 0)) * 100),
                    'lead_addon_note' => $slotData['lead_addon_note'] ?? null,
                    'perks' => $perks,
                    'is_active' => (bool) ($slotData['is_active'] ?? false),
                ]);
            }
        });

        return back()->with('success', 'State slot pricing updated successfully.');
    }
}
