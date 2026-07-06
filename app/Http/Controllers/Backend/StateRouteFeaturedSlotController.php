<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\StateRouteFeaturedSlot;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class StateRouteFeaturedSlotController extends Controller
{
    public function index(Request $request)
    {
        $this->ensureSlotsForAllRoutes();

        $selectedRouteId = $request->get('route_id'); // format: fromId-toId
        $selectedSlotStatus = $request->get('slot_status');
        $search = trim((string) $request->get('search'));

        $routeOptions = $this->routeOptions();

        $slotStats = $this->slotStats($selectedRouteId, $search);

        $routesWithSlots = $this->paginatedRouteGroups(
            request: $request,
            selectedRouteId: $selectedRouteId,
            selectedSlotStatus: $selectedSlotStatus,
            search: $search,
            perPage: 10
        );

        return view('backend.pages.route-featured-slots.index', compact(
            'routeOptions',
            'routesWithSlots',
            'selectedRouteId',
            'selectedSlotStatus',
            'slotStats',
            'search'
        ));
    }

    public function updateMany(Request $request)
    {
        $data = $request->validate([
            'slots' => ['required', 'array'],
            'slots.*.id' => ['required', 'integer', 'exists:state_route_featured_slots,id'],
            'slots.*.label' => ['nullable', 'string', 'max:100'],
            'slots.*.monthly_price' => ['required', 'numeric', 'min:1'],
            'slots.*.yearly_price' => ['required', 'numeric', 'min:1'],
            'slots.*.yearly_discount_percent' => ['nullable', 'integer', 'min:0', 'max:100'],
            'slots.*.perks' => ['nullable', 'string'],
            'slots.*.is_active' => ['nullable', 'boolean'],
        ]);

        DB::transaction(function () use ($data) {
            foreach ($data['slots'] as $slotData) {
                $slot = StateRouteFeaturedSlot::findOrFail($slotData['id']);

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

        return back()->with('success', 'State route featured ad slots updated successfully.');
    }

    private function ensureSlotsForAllRoutes(): void
    {
        $states = State::query()->select(['id', 'name', 'abv'])->orderBy('name')->get();

        foreach ($states as $fromState) {
            foreach ($states as $toState) {
                if ((int) $fromState->id === (int) $toState->id) {
                    continue;
                }

                for ($i = 1; $i <= 3; $i++) {
                    StateRouteFeaturedSlot::firstOrCreate(
                        [
                            'from_state_id' => $fromState->id,
                            'to_state_id' => $toState->id,
                            'slot_number' => $i,
                        ],
                        [
                            'label' => $i === 1 ? 'Slot 1 - Top' : 'Slot '.$i,
                            'monthly_price_cents' => $i === 1 ? 59900 : ($i === 2 ? 39900 : 29900),
                            'yearly_price_cents' => $i === 1 ? 599000 : ($i === 2 ? 399000 : 299000),
                            'yearly_discount_percent' => 17,
                            'perks' => [
                                'Sponsored label on route page',
                                'Higher visibility for verified movers',
                                'Monthly performance exposure',
                            ],
                            'is_active' => true,
                            'sort_order' => $i,
                        ]
                    );
                }
            }
        }
    }

    private function routeOptions()
    {
        return StateRouteFeaturedSlot::query()
            ->with(['fromState', 'toState'])
            ->select(['from_state_id', 'to_state_id'])
            ->distinct()
            ->get()
            ->map(function ($slot) {
                return (object) [
                    'id' => $slot->from_state_id.'-'.$slot->to_state_id,
                    'name' => ($slot->fromState->name ?? 'From State').' → '.($slot->toState->name ?? 'To State'),
                    'abv' => ($slot->fromState->abv ?? '').' → '.($slot->toState->abv ?? ''),
                ];
            })
            ->sortBy('name')
            ->values();
    }

    private function slotStats(?string $selectedRouteId, string $search): array
    {
        $slots = $this->baseSlotsQuery($selectedRouteId, $search)
            ->with(['activeSubscription', 'pendingReservation'])
            ->get();

        return [
            'total' => $slots->count(),
            'available' => $slots->filter(fn ($slot) => $this->slotFinalStatus($slot) === 'available')->count(),
            'taken' => $slots->filter(fn ($slot) => $this->slotFinalStatus($slot) === 'taken')->count(),
            'reserved' => $slots->filter(fn ($slot) => $this->slotFinalStatus($slot) === 'reserved')->count(),
            'inactive' => $slots->filter(fn ($slot) => $this->slotFinalStatus($slot) === 'inactive')->count(),
        ];
    }

    private function paginatedRouteGroups(Request $request, ?string $selectedRouteId, ?string $selectedSlotStatus, string $search, int $perPage): LengthAwarePaginator
    {
        $slots = $this->baseSlotsQuery($selectedRouteId, $search)
            ->with(['fromState', 'toState', 'activeSubscription.company', 'pendingReservation'])
            ->orderBy('from_state_id')
            ->orderBy('to_state_id')
            ->orderBy('slot_number')
            ->get();

        $groups = $slots
            ->groupBy(fn ($slot) => $slot->from_state_id.'-'.$slot->to_state_id)
            ->map(function ($routeSlots) {
                return $this->makeRouteObject($routeSlots);
            })
            ->filter(function ($route) use ($selectedSlotStatus) {
                if (! $selectedSlotStatus) {
                    return true;
                }

                return $route->featuredSlots->contains(function ($slot) use ($selectedSlotStatus) {
                    return $this->slotFinalStatus($slot) === $selectedSlotStatus;
                });
            })
            ->sortBy('name')
            ->values();

        $page = LengthAwarePaginator::resolveCurrentPage();

        return new LengthAwarePaginator(
            $groups->forPage($page, $perPage)->values(),
            $groups->count(),
            $perPage,
            $page,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );
    }

    private function baseSlotsQuery(?string $selectedRouteId, string $search)
    {
        $query = StateRouteFeaturedSlot::query();

        if ($selectedRouteId && str_contains($selectedRouteId, '-')) {
            [$fromId, $toId] = array_map('intval', explode('-', $selectedRouteId, 2));
            $query->where('from_state_id', $fromId)->where('to_state_id', $toId);
        }

        if ($search !== '') {
            $normalized = preg_replace('/\s+/', ' ', str_replace(['→', '->'], ' to ', strtolower($search)));
            $parts = preg_split('/\s+to\s+/', trim($normalized));

            if (count($parts) === 2 && trim($parts[0]) !== '' && trim($parts[1]) !== '') {
                $fromSearch = trim($parts[0]);
                $toSearch = trim($parts[1]);

                $query->whereHas('fromState', function ($sq) use ($fromSearch) {
                    $sq->where('name', 'like', "%{$fromSearch}%")
                        ->orWhere('abv', 'like', "%{$fromSearch}%");
                })->whereHas('toState', function ($sq) use ($toSearch) {
                    $sq->where('name', 'like', "%{$toSearch}%")
                        ->orWhere('abv', 'like', "%{$toSearch}%");
                });
            } else {
                $query->where(function ($q) use ($search) {
                    $q->whereHas('fromState', function ($sq) use ($search) {
                        $sq->where('name', 'like', "%{$search}%")
                            ->orWhere('abv', 'like', "%{$search}%");
                    })->orWhereHas('toState', function ($sq) use ($search) {
                        $sq->where('name', 'like', "%{$search}%")
                            ->orWhere('abv', 'like', "%{$search}%");
                    });
                });
            }
        }

        return $query;
    }

    private function makeRouteObject($routeSlots): object
    {
        $first = $routeSlots->first();

        return (object) [
            'id' => $first->from_state_id.'-'.$first->to_state_id,
            'from_state_id' => $first->from_state_id,
            'to_state_id' => $first->to_state_id,
            'fromState' => $first->fromState,
            'toState' => $first->toState,
            'name' => ($first->fromState->name ?? 'From State').' → '.($first->toState->name ?? 'To State'),
            'abv' => ($first->fromState->abv ?? '').' → '.($first->toState->abv ?? ''),
            'featuredSlots' => $routeSlots->sortBy('slot_number')->values(),
        ];
    }

    private function slotFinalStatus($slot): string
    {
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
    }
}
