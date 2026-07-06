@extends('backend.layouts.master')

@section('admin-content')
@php
    $slotFinalStatus = function ($slot) {
        if (! $slot->is_active) return 'inactive';
        if ($slot->activeSubscription) return 'taken';
        if ($slot->pendingReservation) return 'reserved';
        return 'available';
    };

    $totalSlots = $slotStats['total'] ?? 0;
    $availableSlots = $slotStats['available'] ?? 0;
    $takenSlots = $slotStats['taken'] ?? 0;
    $reservedSlots = $slotStats['reserved'] ?? 0;
    $inactiveSlots = $slotStats['inactive'] ?? 0;
@endphp

<style>
    .cf-wrap{background:#f8fafc;padding:22px;border-radius:24px}.cf-hero{background:linear-gradient(135deg,#0f172a,#1e3a8a);border-radius:24px;padding:26px;color:#fff;margin-bottom:20px;box-shadow:0 18px 45px rgba(15,23,42,.18)}.cf-hero-top{display:flex;justify-content:space-between;gap:18px;align-items:flex-start;flex-wrap:wrap}.cf-kicker{display:inline-flex;background:rgba(255,255,255,.10);border:1px solid rgba(255,255,255,.18);border-radius:999px;padding:7px 11px;color:#bfdbfe;font-weight:900;font-size:12px;margin-bottom:12px}.cf-title{font-size:28px;font-weight:950;margin:0;letter-spacing:-.03em}.cf-sub{color:#dbeafe;margin:8px 0 0}.cf-main-btn{border:0;border-radius:14px;padding:13px 18px;background:linear-gradient(135deg,#2563eb,#06b6d4);color:#fff;font-weight:950;box-shadow:0 12px 25px rgba(37,99,235,.3)}.cf-stats{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:12px;margin-top:22px}.cf-stat{background:rgba(255,255,255,.10);border:1px solid rgba(255,255,255,.14);border-radius:18px;padding:14px}.cf-stat span{display:block;color:#dbeafe;font-size:12px;font-weight:800;margin-bottom:6px}.cf-stat strong{font-size:25px;font-weight:950}.cf-panel,.cf-city-card{background:#fff;border:1px solid #e2e8f0;border-radius:22px;box-shadow:0 12px 35px rgba(15,23,42,.06);padding:18px;margin-bottom:18px}.cf-filter{display:flex;gap:12px;align-items:end;flex-wrap:wrap}.cf-field{display:flex;flex-direction:column;gap:7px}.cf-label,.cf-field label{font-size:12px;font-weight:900;color:#334155;text-transform:uppercase;letter-spacing:.04em}.cf-input,.cf-select,.cf-textarea{width:100%;border:1px solid #cbd5e1;border-radius:13px;padding:10px 12px;background:#fff;color:#0f172a;outline:none}.cf-input:focus,.cf-select:focus,.cf-textarea:focus{border-color:#2563eb;box-shadow:0 0 0 4px rgba(37,99,235,.12)}.cf-textarea{min-height:96px;resize:vertical}.cf-btn{border:0;border-radius:13px;padding:11px 16px;font-weight:950;background:#2563eb;color:#fff;text-decoration:none;display:inline-flex;align-items:center;justify-content:center}.cf-btn:hover{background:#1d4ed8;color:#fff;text-decoration:none}.cf-btn-light{border:1px solid #e2e8f0;background:#fff;color:#0f172a}.cf-btn-light:hover{background:#f8fafc;color:#0f172a}.cf-alert{border-radius:16px;padding:13px 15px;font-weight:800;margin-bottom:16px}.cf-alert-success{background:#dcfce7;color:#166534;border:1px solid #bbf7d0}.cf-toolbar{position:sticky;top:12px;z-index:20;background:rgba(255,255,255,.9);backdrop-filter:blur(14px);border:1px solid #e2e8f0;border-radius:18px;padding:12px;display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:16px;box-shadow:0 10px 30px rgba(15,23,42,.08)}.cf-toolbar-title{font-weight:950;color:#0f172a}.cf-toolbar-note{font-size:12px;color:#64748b;margin-top:2px}.cf-city-card{padding:0;overflow:hidden}.cf-city-head{padding:18px;display:flex;justify-content:space-between;align-items:center;gap:14px;background:linear-gradient(180deg,#fff,#f8fafc);border-bottom:1px solid #e2e8f0}.cf-city-left{display:flex;align-items:center;gap:13px}.cf-city-avatar{width:52px;height:52px;border-radius:16px;display:flex;align-items:center;justify-content:center;background:#eff6ff;color:#2563eb;font-weight:1000;border:1px solid #bfdbfe}.cf-city-name{margin:0;font-size:20px;font-weight:950;color:#0f172a}.cf-city-meta{font-size:13px;color:#64748b;margin-top:3px}.cf-pills{display:flex;gap:8px;flex-wrap:wrap;justify-content:flex-end}.cf-pill{border-radius:999px;padding:7px 10px;font-size:12px;font-weight:950;border:1px solid transparent}.cf-pill.available{background:#dcfce7;color:#166534;border-color:#bbf7d0}.cf-pill.taken{background:#fee2e2;color:#991b1b;border-color:#fecaca}.cf-pill.reserved{background:#ffedd5;color:#9a3412;border-color:#fed7aa}.cf-pill.inactive{background:#f1f5f9;color:#475569;border-color:#e2e8f0}.cf-slot-grid{padding:18px;display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px}.cf-slot-card{border:1px solid #e2e8f0;border-radius:22px;background:#fff;padding:16px;transition:.18s ease}.cf-slot-card:hover{box-shadow:0 16px 35px rgba(15,23,42,.08);transform:translateY(-2px)}.cf-slot-card.is-taken{border-color:#fecaca;background:linear-gradient(180deg,#fff,#fff7f7)}.cf-slot-card.is-reserved{border-color:#fed7aa;background:linear-gradient(180deg,#fff,#fff9f2)}.cf-slot-card.is-free{border-color:#bbf7d0;background:linear-gradient(180deg,#fff,#f8fff9)}.cf-slot-card.is-inactive{opacity:.76;background:#f8fafc}.cf-slot-top{display:flex;justify-content:space-between;align-items:flex-start;gap:10px;margin-bottom:14px}.cf-slot-title{margin:0;color:#0f172a;font-size:17px;font-weight:950}.cf-slot-small{color:#64748b;font-size:12px;margin-top:4px}.cf-badge{display:inline-flex;border-radius:999px;padding:6px 10px;font-size:11px;font-weight:950;white-space:nowrap}.cf-badge.ok{background:#dcfce7;color:#166534}.cf-badge.bad{background:#fee2e2;color:#991b1b}.cf-badge.warn{background:#ffedd5;color:#9a3412}.cf-badge.muted{background:#e2e8f0;color:#475569}.cf-grid-2{display:grid;grid-template-columns:1fr 1fr;gap:12px}.cf-block{margin-top:12px}.cf-company{margin-top:9px;font-size:12px;color:#64748b;line-height:1.45}.cf-total-preview{margin-top:14px;border-radius:16px;background:#0f172a;color:#fff;padding:13px 14px;display:flex;justify-content:space-between;align-items:center}.cf-total-preview span{color:#cbd5e1;font-size:12px;font-weight:800}.cf-total-preview strong{font-size:18px;font-weight:950}.cf-switch{margin-top:14px;padding-top:14px;border-top:1px solid #e2e8f0;display:flex;align-items:center;justify-content:space-between}.cf-switch label{font-weight:950;color:#0f172a}.cf-switch input{width:20px;height:20px;accent-color:#2563eb}.cf-empty{padding:35px;text-align:center;border:1px dashed #cbd5e1;border-radius:22px;color:#64748b;background:#fff}@media(max-width:1199px){.cf-slot-grid{grid-template-columns:repeat(2,1fr)}.cf-stats{grid-template-columns:repeat(2,1fr)}}@media(max-width:767px){.cf-wrap{padding:14px}.cf-title{font-size:23px}.cf-slot-grid,.cf-grid-2{grid-template-columns:1fr}.cf-toolbar,.cf-city-head{align-items:flex-start;flex-direction:column}.cf-main-btn,.cf-btn{width:100%}.cf-stats{grid-template-columns:1fr}}
</style>

<div class="cf-wrap">
    <div class="cf-hero">
        <div class="cf-hero-top">
            <div>
                <div class="cf-kicker">★ Sponsored cities management</div>
                <h1 class="cf-title">City Featured Ad Slots</h1>
                <p class="cf-sub">Manage monthly/yearly pricing, discounts, perks, availability, and active sponsored slots for each city.</p>
            </div>
            <button class="cf-main-btn" type="submit" form="cfSlotsForm">Save All Changes</button>
        </div>

        <div class="cf-stats">
            <div class="cf-stat"><span>Total Slots</span><strong>{{ $totalSlots }}</strong></div>
            <div class="cf-stat"><span>Available</span><strong>{{ $availableSlots }}</strong></div>
            <div class="cf-stat"><span>Taken</span><strong>{{ $takenSlots }}</strong></div>
            <div class="cf-stat"><span>Reserved / Inactive</span><strong>{{ $reservedSlots + $inactiveSlots }}</strong></div>
        </div>
    </div>

    @if(session('success')) <div class="cf-alert cf-alert-success">{{ session('success') }}</div> @endif

    <div class="cf-panel">
        <form class="cf-filter" method="GET">
            <div class="cf-field" style="min-width:260px">
                <label>Search City</label>
                <input class="cf-input" name="search" value="{{ $search }}" placeholder="Miami, Tampa, New York...">
            </div>

            <div class="cf-field" style="min-width:260px">
                <label>Filter City</label>
                <select class="cf-select" name="city_page_id">
                    <option value="">All cities</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" @selected($selectedCityId == $city->id)>
                            {{ $city->name }}@if(optional($city->state)->abv), {{ optional($city->state)->abv }}@endif
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="cf-field" style="min-width:220px">
                <label>Slot Status</label>
                <select class="cf-select" name="slot_status">
                    <option value="">All slot states</option>
                    <option value="taken" @selected(($selectedSlotStatus ?? '') === 'taken')>Taken slots only</option>
                    <option value="available" @selected(($selectedSlotStatus ?? '') === 'available')>Available slots only</option>
                    <option value="reserved" @selected(($selectedSlotStatus ?? '') === 'reserved')>Reserved slots only</option>
                    <option value="inactive" @selected(($selectedSlotStatus ?? '') === 'inactive')>Inactive slots only</option>
                </select>
            </div>

            <button class="cf-btn" type="submit">Apply Filter</button>

            @if(!empty($selectedCityId) || !empty($selectedSlotStatus) || !empty($search))
                <a class="cf-btn cf-btn-light" href="{{ url()->current() }}">Clear</a>
            @endif
        </form>
    </div>

    <form method="POST" action="{{ route('admin.city-featured-slots.updateMany') }}" id="cfSlotsForm">
        @csrf

        <div class="cf-toolbar">
            <div>
                <div class="cf-toolbar-title">Bulk slot editor</div>
                <div class="cf-toolbar-note">Edit city slots and save all changes once.</div>
            </div>
            <button class="cf-btn" type="submit">Save Changes</button>
        </div>

        @forelse($citiesWithSlots as $city)
            @php
                $cityTaken = $city->featuredSlots->filter(fn ($slot) => $slotFinalStatus($slot) === 'taken')->count();
                $cityReserved = $city->featuredSlots->filter(fn ($slot) => $slotFinalStatus($slot) === 'reserved')->count();
                $cityInactive = $city->featuredSlots->filter(fn ($slot) => $slotFinalStatus($slot) === 'inactive')->count();
                $cityAvailable = $city->featuredSlots->filter(fn ($slot) => $slotFinalStatus($slot) === 'available')->count();
                $stateAbv = optional($city->state)->abv ?? optional($city->state)->abbr ?? '';
            @endphp

            <section class="cf-city-card">
                <div class="cf-city-head">
                    <div class="cf-city-left">
                        <div class="cf-city-avatar">{{ $stateAbv ?: strtoupper(substr($city->name, 0, 2)) }}</div>
                        <div>
                            <h2 class="cf-city-name">{{ $city->name }}@if($stateAbv), {{ $stateAbv }}@endif</h2>
                            <div class="cf-city-meta">3 sponsored slots available per city</div>
                        </div>
                    </div>

                    <div class="cf-pills">
                        <span class="cf-pill available">{{ $cityAvailable }} Available</span>
                        <span class="cf-pill taken">{{ $cityTaken }} Taken</span>
                        @if($cityReserved > 0)<span class="cf-pill reserved">{{ $cityReserved }} Reserved</span>@endif
                        @if($cityInactive > 0)<span class="cf-pill inactive">{{ $cityInactive }} Inactive</span>@endif
                    </div>
                </div>

                <div class="cf-slot-grid">
                    @foreach($city->featuredSlots as $slot)
                        @php
                            $key = $slot->id;
                            $taken = $slot->activeSubscription;
                            $reserved = $slot->pendingReservation;
                            $finalStatus = $slotFinalStatus($slot);

                            if ($finalStatus === 'inactive') { $cardClass = 'is-inactive'; $badgeClass = 'muted'; $badgeText = 'Inactive'; }
                            elseif ($finalStatus === 'taken') { $cardClass = 'is-taken'; $badgeClass = 'bad'; $badgeText = 'Taken'; }
                            elseif ($finalStatus === 'reserved') { $cardClass = 'is-reserved'; $badgeClass = 'warn'; $badgeText = 'Reserved'; }
                            else { $cardClass = 'is-free'; $badgeClass = 'ok'; $badgeText = 'Available'; }

                            $monthlyPrice = old("slots.$key.monthly_price", number_format($slot->monthly_price_cents / 100, 2, '.', ''));
                            $yearlyPrice = old("slots.$key.yearly_price", number_format($slot->yearly_price_cents / 100, 2, '.', ''));
                            $isActive = old("slots.$key.is_active", $slot->is_active ? 1 : 0);
                        @endphp

                        <article class="cf-slot-card {{ $cardClass }}" data-slot-card>
                            <input type="hidden" name="slots[{{ $key }}][id]" value="{{ $slot->id }}">

                            <div class="cf-slot-top">
                                <div>
                                    <h3 class="cf-slot-title">Slot {{ $slot->slot_number }}</h3>
                                    <div class="cf-slot-small">{{ $slot->slot_number == 1 ? 'Top placement slot' : 'Sponsored placement slot' }}</div>
                                </div>
                                <span class="cf-badge {{ $badgeClass }}">{{ $badgeText }}</span>
                            </div>

                            @if($taken)
                                <div class="cf-company"><strong>Company:</strong> {{ optional($taken->company)->company_name ?? optional($taken->company)->name ?? 'Company' }}</div>
                            @elseif($reserved)
                                <div class="cf-company"><strong>Reserved until:</strong> {{ $reserved->reserved_until?->format('M d, h:i A') }}</div>
                            @endif

                            <div class="cf-block">
                                <label class="cf-label">Slot Label</label>
                                <input class="cf-input" name="slots[{{ $key }}][label]" value="{{ old("slots.$key.label", $slot->label) }}" placeholder="Example: Slot 1 - Top">
                            </div>

                            <div class="cf-grid-2 cf-block">
                                <div>
                                    <label class="cf-label">Monthly Price $</label>
                                    <input class="cf-input" type="number" step="0.01" min="1" name="slots[{{ $key }}][monthly_price]" value="{{ $monthlyPrice }}" data-monthly-price>
                                </div>
                                <div>
                                    <label class="cf-label">Yearly Price $</label>
                                    <input class="cf-input" type="number" step="0.01" min="1" name="slots[{{ $key }}][yearly_price]" value="{{ $yearlyPrice }}">
                                </div>
                            </div>

                            <div class="cf-block">
                                <label class="cf-label">Yearly Discount %</label>
                                <input class="cf-input" type="number" min="0" max="100" name="slots[{{ $key }}][yearly_discount_percent]" value="{{ old("slots.$key.yearly_discount_percent", $slot->yearly_discount_percent) }}">
                            </div>

                            <div class="cf-block">
                                <label class="cf-label">Perks</label>
                                <textarea class="cf-textarea" name="slots[{{ $key }}][perks]" placeholder="One perk per line">{{ old("slots.$key.perks", implode("\n", $slot->perks ?? [])) }}</textarea>
                            </div>

                            <div class="cf-total-preview">
                                <span>Monthly price preview</span>
                                <strong data-total-preview>$0.00/mo</strong>
                            </div>

                            <div class="cf-switch">
                                <label>Slot Active</label>
                                <input type="hidden" name="slots[{{ $key }}][is_active]" value="0">
                                <input type="checkbox" name="slots[{{ $key }}][is_active]" value="1" @checked((int) $isActive === 1)>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @empty
            <div class="cf-empty">No cities found for the selected filter.</div>
        @endforelse

        <div class="cf-toolbar">
            <div>
                <div class="cf-toolbar-title">Ready to update city slots?</div>
                <div class="cf-toolbar-note">All pricing, discounts, perks, and active statuses will be saved together.</div>
            </div>
            <button class="cf-btn" type="submit">Save All Changes</button>
        </div>
    </form>

    <div style="margin-top:18px">{{ $citiesWithSlots->links() }}</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function money(value) {
            return '$' + Number(value || 0).toFixed(2) + '/mo';
        }

        document.querySelectorAll('[data-slot-card]').forEach(function (card) {
            const monthly = card.querySelector('[data-monthly-price]');
            const preview = card.querySelector('[data-total-preview]');
            const refresh = function () {
                if (monthly && preview) preview.textContent = money(monthly.value);
            };
            refresh();
            card.addEventListener('input', refresh);
        });
    });
</script>
@endsection
