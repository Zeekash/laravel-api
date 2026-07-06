@extends('backend.layouts.master')

@section('admin-content')
@php
    $slotFinalStatus = function ($slot) {
        if (! $slot->is_active) return 'inactive';
        if ($slot->activeSubscription) return 'taken';
        if ($slot->pendingReservation) return 'reserved';
        return 'available';
    };
@endphp
<style>
    .rs-wrap{background:#f8fafc;border-radius:24px;padding:22px}.rs-hero{background:linear-gradient(135deg,#0f172a,#1e3a8a);border-radius:24px;padding:24px;color:#fff;margin-bottom:18px}.rs-hero-top{display:flex;justify-content:space-between;gap:14px;align-items:start;flex-wrap:wrap}.rs-title{font-size:28px;font-weight:950;margin:0}.rs-sub{color:#dbeafe;margin:8px 0 0}.rs-stats{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:12px;margin-top:20px}.rs-stat{background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);border-radius:16px;padding:14px}.rs-stat span{display:block;font-size:12px;color:#bfdbfe;font-weight:900;text-transform:uppercase;margin-bottom:8px}.rs-stat strong{font-size:24px}.rs-card{background:#fff;border:1px solid #e2e8f0;border-radius:22px;padding:18px;margin-bottom:16px;box-shadow:0 12px 30px rgba(15,23,42,.05)}.rs-filter{display:flex;gap:10px;align-items:end;flex-wrap:wrap}.rs-field label{display:block;font-size:12px;font-weight:900;color:#334155;margin-bottom:7px;text-transform:uppercase}.rs-input,.rs-select,.rs-textarea{width:100%;border:1px solid #cbd5e1;border-radius:12px;padding:10px 12px;background:#fff}.rs-textarea{min-height:88px}.rs-btn{border:0;background:#2563eb;color:#fff;border-radius:12px;padding:11px 16px;font-weight:900;text-decoration:none;display:inline-flex}.rs-btn.light{background:#fff;color:#0f172a;border:1px solid #cbd5e1}.rs-route-head{display:flex;justify-content:space-between;align-items:center;gap:12px;border-bottom:1px solid #e2e8f0;padding-bottom:14px;margin-bottom:16px}.rs-route-title{font-size:19px;font-weight:950;margin:0}.rs-pills{display:flex;gap:8px;flex-wrap:wrap}.rs-pill{border-radius:999px;padding:7px 10px;font-size:12px;font-weight:900}.rs-pill.ok{background:#dcfce7;color:#166534}.rs-pill.bad{background:#fee2e2;color:#991b1b}.rs-pill.warn{background:#ffedd5;color:#9a3412}.rs-pill.muted{background:#e2e8f0;color:#475569}.rs-slot-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:14px}.rs-slot{border:1px solid #e2e8f0;border-radius:18px;padding:15px;background:#fff}.rs-slot.available{border-color:#bbf7d0;background:#f8fff9}.rs-slot.taken{border-color:#fecaca;background:#fff7f7}.rs-slot.reserved{border-color:#fed7aa;background:#fff9f2}.rs-slot.inactive{opacity:.75;background:#f8fafc}.rs-slot-top{display:flex;justify-content:space-between;gap:10px;margin-bottom:12px}.rs-slot-title{font-weight:950}.rs-grid-2{display:grid;grid-template-columns:1fr 1fr;gap:10px}.rs-form-block{margin-top:10px}.rs-switch{display:flex;align-items:center;justify-content:space-between;border-top:1px solid #e2e8f0;margin-top:12px;padding-top:12px;font-weight:900}.rs-toolbar{position:sticky;top:10px;z-index:10;background:rgba(255,255,255,.9);backdrop-filter:blur(10px);border:1px solid #e2e8f0;border-radius:18px;padding:12px;display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:16px;box-shadow:0 10px 25px rgba(15,23,42,.08)}@media(max-width:1100px){.rs-slot-grid{grid-template-columns:1fr}.rs-stats{grid-template-columns:repeat(2,1fr)}}@media(max-width:700px){.rs-stats,.rs-grid-2{grid-template-columns:1fr}.rs-btn,.rs-field{width:100%}.rs-route-head,.rs-toolbar{align-items:start;flex-direction:column}}
</style>

<div class="rs-wrap">
    <div class="rs-hero">
        <div class="rs-hero-top">
            <div>
                <div style="font-weight:900;color:#bfdbfe;margin-bottom:8px">★ Sponsored route management</div>
                <h1 class="rs-title">State Route Featured Ad Slots</h1>
                <p class="rs-sub">Manage 3 sponsored subscription slots for every state-to-state route. No state_routes table is used.</p>
            </div>
            <button class="rs-btn" type="submit" form="routeSlotsForm">Save All Changes</button>
        </div>
        <div class="rs-stats">
            <div class="rs-stat"><span>Total Slots</span><strong>{{ $slotStats['total'] ?? 0 }}</strong></div>
            <div class="rs-stat"><span>Available</span><strong>{{ $slotStats['available'] ?? 0 }}</strong></div>
            <div class="rs-stat"><span>Taken</span><strong>{{ $slotStats['taken'] ?? 0 }}</strong></div>
            <div class="rs-stat"><span>Reserved / Inactive</span><strong>{{ ($slotStats['reserved'] ?? 0) + ($slotStats['inactive'] ?? 0) }}</strong></div>
        </div>
    </div>

    @if(session('success'))<div class="rs-card" style="background:#dcfce7;color:#166534;font-weight:900">{{ session('success') }}</div>@endif

    <div class="rs-card">
        <form class="rs-filter" method="GET">
            <div class="rs-field" style="min-width:260px"><label>Search route</label><input class="rs-input" name="search" value="{{ $search }}" placeholder="Florida to New York"></div>
            <div class="rs-field" style="min-width:280px"><label>Route</label><select class="rs-select" name="route_id"><option value="">All routes</option>@foreach($routeOptions as $route)<option value="{{ $route->id }}" @selected($selectedRouteId == $route->id)>{{ $route->name }}</option>@endforeach</select></div>
            <div class="rs-field" style="min-width:200px"><label>Slot Status</label><select class="rs-select" name="slot_status"><option value="">All</option><option value="taken" @selected(($selectedSlotStatus ?? '') === 'taken')>Taken only</option><option value="available" @selected(($selectedSlotStatus ?? '') === 'available')>Available only</option><option value="reserved" @selected(($selectedSlotStatus ?? '') === 'reserved')>Reserved only</option><option value="inactive" @selected(($selectedSlotStatus ?? '') === 'inactive')>Inactive only</option></select></div>
            <button class="rs-btn" type="submit">Apply Filter</button>
            @if($search || $selectedRouteId || $selectedSlotStatus)<a class="rs-btn light" href="{{ url()->current() }}">Clear</a>@endif
        </form>
    </div>

    <form id="routeSlotsForm" method="POST" action="{{ route('admin.route-featured-slots.updateMany') }}">
        @csrf
        <div class="rs-toolbar"><div><strong>Bulk slot editor</strong><div style="color:#64748b;font-size:12px">Edit all visible slots and save once.</div></div><button class="rs-btn" type="submit">Save Changes</button></div>

        @forelse($routesWithSlots as $route)
            @php
                $routeTaken = $route->featuredSlots->filter(fn($slot) => $slotFinalStatus($slot) === 'taken')->count();
                $routeReserved = $route->featuredSlots->filter(fn($slot) => $slotFinalStatus($slot) === 'reserved')->count();
                $routeInactive = $route->featuredSlots->filter(fn($slot) => $slotFinalStatus($slot) === 'inactive')->count();
                $routeAvailable = $route->featuredSlots->filter(fn($slot) => $slotFinalStatus($slot) === 'available')->count();
            @endphp
            <section class="rs-card">
                <div class="rs-route-head">
                    <div><h2 class="rs-route-title">{{ $route->name }}</h2><div style="color:#64748b;font-size:13px">{{ $route->abv }}</div></div>
                    <div class="rs-pills"><span class="rs-pill ok">{{ $routeAvailable }} Available</span><span class="rs-pill bad">{{ $routeTaken }} Taken</span>@if($routeReserved)<span class="rs-pill warn">{{ $routeReserved }} Reserved</span>@endif @if($routeInactive)<span class="rs-pill muted">{{ $routeInactive }} Inactive</span>@endif</div>
                </div>
                <div class="rs-slot-grid">
                    @foreach($route->featuredSlots as $slot)
                        @php
                            $key = $slot->id; $taken = $slot->activeSubscription; $reserved = $slot->pendingReservation; $finalStatus = $slotFinalStatus($slot);
                            $badge = ['available'=>'ok','taken'=>'bad','reserved'=>'warn','inactive'=>'muted'][$finalStatus] ?? 'muted';
                        @endphp
                        <article class="rs-slot {{ $finalStatus }}">
                            <input type="hidden" name="slots[{{ $key }}][id]" value="{{ $slot->id }}">
                            <div class="rs-slot-top"><div><div class="rs-slot-title">Slot {{ $slot->slot_number }}</div><div style="font-size:12px;color:#64748b">{{ $slot->slot_number == 1 ? 'Top placement' : 'Sponsored placement' }}</div></div><span class="rs-pill {{ $badge }}">{{ ucfirst($finalStatus) }}</span></div>
                            @if($taken)<div style="font-size:12px;color:#64748b;margin-bottom:8px"><strong>Company:</strong> {{ optional($taken->company)->company_name ?? optional($taken->company)->name ?? 'Company' }}</div>@endif
                            @if($reserved)<div style="font-size:12px;color:#64748b;margin-bottom:8px"><strong>Reserved until:</strong> {{ optional($reserved->reserved_until)->format('M d, h:i A') }}</div>@endif
                            <div class="rs-form-block"><label>Label</label><input class="rs-input" name="slots[{{ $key }}][label]" value="{{ old("slots.$key.label", $slot->label) }}"></div>
                            <div class="rs-grid-2 rs-form-block"><div><label>Monthly $</label><input class="rs-input" type="number" step="0.01" min="1" name="slots[{{ $key }}][monthly_price]" value="{{ old("slots.$key.monthly_price", number_format($slot->monthly_price_cents / 100, 2, '.', '')) }}"></div><div><label>Yearly $</label><input class="rs-input" type="number" step="0.01" min="1" name="slots[{{ $key }}][yearly_price]" value="{{ old("slots.$key.yearly_price", number_format($slot->yearly_price_cents / 100, 2, '.', '')) }}"></div></div>
                            <div class="rs-form-block"><label>Yearly Discount %</label><input class="rs-input" type="number" min="0" max="100" name="slots[{{ $key }}][yearly_discount_percent]" value="{{ old("slots.$key.yearly_discount_percent", $slot->yearly_discount_percent) }}"></div>
                            <div class="rs-form-block"><label>Perks</label><textarea class="rs-textarea" name="slots[{{ $key }}][perks]">{{ old("slots.$key.perks", implode("\n", $slot->perks ?? [])) }}</textarea></div>
                            <div class="rs-switch"><label>Slot Active</label><span><input type="hidden" name="slots[{{ $key }}][is_active]" value="0"><input type="checkbox" name="slots[{{ $key }}][is_active]" value="1" @checked($slot->is_active)></span></div>
                        </article>
                    @endforeach
                </div>
            </section>
        @empty
            <div class="rs-card">No routes found.</div>
        @endforelse
        <div class="rs-toolbar"><div><strong>Ready to save?</strong><div style="color:#64748b;font-size:12px">All visible route slots will update together.</div></div><button class="rs-btn" type="submit">Save All Changes</button></div>
    </form>

    {{ $routesWithSlots->links() }}
</div>
@endsection
