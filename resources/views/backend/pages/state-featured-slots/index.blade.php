@extends('backend.layouts.master')

@section('admin-content')
@php
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

    $totalSlots = $slotStats['total'] ?? 0;
    $availableSlots = $slotStats['available'] ?? 0;
    $takenSlots = $slotStats['taken'] ?? 0;
    $reservedSlots = $slotStats['reserved'] ?? 0;
    $inactiveSlots = $slotStats['inactive'] ?? 0;
@endphp

<style>
    :root{
        --sf-primary:#2563eb;
        --sf-primary-dark:#1d4ed8;
        --sf-soft:#eff6ff;
        --sf-dark:#0f172a;
        --sf-muted:#64748b;
        --sf-border:#e2e8f0;
        --sf-bg:#f8fafc;
        --sf-green:#16a34a;
        --sf-red:#dc2626;
        --sf-orange:#f97316;
    }

    .sf-wrap{
        background:linear-gradient(180deg,#f8fafc 0%,#ffffff 100%);
        padding:22px;
        border-radius:24px;
    }

    .sf-hero{
        background:
            radial-gradient(circle at top right,rgba(37,99,235,.18),transparent 34%),
            linear-gradient(135deg,#0f172a,#1e293b);
        border-radius:24px;
        padding:26px;
        color:#fff;
        margin-bottom:20px;
        box-shadow:0 18px 45px rgba(15,23,42,.16);
    }

    .sf-hero-top{
        display:flex;
        justify-content:space-between;
        gap:18px;
        align-items:flex-start;
        flex-wrap:wrap;
    }

    .sf-kicker{
        display:inline-flex;
        align-items:center;
        gap:8px;
        font-size:12px;
        font-weight:800;
        color:#bfdbfe;
        background:rgba(255,255,255,.08);
        border:1px solid rgba(255,255,255,.14);
        border-radius:999px;
        padding:7px 11px;
        margin-bottom:12px;
    }

    .sf-title{
        margin:0;
        font-size:28px;
        line-height:1.15;
        font-weight:900;
        letter-spacing:-.03em;
    }

    .sf-sub{
        margin:8px 0 0;
        color:#cbd5e1;
        font-size:14px;
        max-width:720px;
    }

    .sf-save-main{
        border:0;
        border-radius:14px;
        padding:12px 18px;
        font-weight:900;
        color:#fff;
        background:linear-gradient(135deg,var(--sf-primary),#06b6d4);
        box-shadow:0 12px 25px rgba(37,99,235,.28);
        white-space:nowrap;
    }

    .sf-stats{
        display:grid;
        grid-template-columns:repeat(4,minmax(0,1fr));
        gap:12px;
        margin-top:22px;
    }

    .sf-stat{
        background:rgba(255,255,255,.08);
        border:1px solid rgba(255,255,255,.12);
        border-radius:18px;
        padding:14px;
    }

    .sf-stat span{
        display:block;
        color:#cbd5e1;
        font-size:12px;
        font-weight:700;
        margin-bottom:5px;
    }

    .sf-stat strong{
        font-size:24px;
        line-height:1;
        font-weight:900;
    }

    .sf-panel{
        background:#fff;
        border:1px solid var(--sf-border);
        border-radius:22px;
        box-shadow:0 12px 35px rgba(15,23,42,.06);
        padding:18px;
        margin-bottom:18px;
    }

    .sf-filter{
        display:flex;
        gap:12px;
        align-items:end;
        flex-wrap:wrap;
    }

    .sf-field{
        display:flex;
        flex-direction:column;
        gap:7px;
    }

    .sf-field label,
    .sf-label{
        font-size:12px;
        font-weight:900;
        color:#334155;
        text-transform:uppercase;
        letter-spacing:.04em;
    }

    .sf-select,
    .sf-input,
    .sf-textarea{
        width:100%;
        border:1px solid #cbd5e1;
        border-radius:13px;
        padding:10px 12px;
        background:#fff;
        color:#0f172a;
        outline:none;
        transition:.18s ease;
    }

    .sf-select:focus,
    .sf-input:focus,
    .sf-textarea:focus{
        border-color:var(--sf-primary);
        box-shadow:0 0 0 4px rgba(37,99,235,.12);
    }

    .sf-textarea{
        min-height:96px;
        resize:vertical;
    }

    .sf-btn{
        border:0;
        border-radius:13px;
        padding:11px 16px;
        font-weight:900;
        background:var(--sf-primary);
        color:#fff;
        transition:.18s ease;
        text-decoration:none;
        display:inline-flex;
        align-items:center;
        justify-content:center;
    }

    .sf-btn:hover{
        background:var(--sf-primary-dark);
        transform:translateY(-1px);
        color:#fff;
        text-decoration:none;
    }

    .sf-btn-light{
        border:1px solid var(--sf-border);
        background:#fff;
        color:#0f172a;
    }

    .sf-btn-light:hover{
        background:#f8fafc;
        color:#0f172a;
    }

    .sf-alert{
        border-radius:16px;
        padding:13px 15px;
        font-weight:800;
        margin-bottom:16px;
    }

    .sf-alert-success{
        background:#dcfce7;
        color:#166534;
        border:1px solid #bbf7d0;
    }

    .sf-toolbar{
        position:sticky;
        top:12px;
        z-index:20;
        background:rgba(255,255,255,.88);
        backdrop-filter:blur(14px);
        border:1px solid var(--sf-border);
        border-radius:18px;
        padding:12px;
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:12px;
        margin-bottom:16px;
        box-shadow:0 10px 30px rgba(15,23,42,.08);
    }

    .sf-toolbar-title{
        font-weight:900;
        color:#0f172a;
    }

    .sf-toolbar-note{
        font-size:12px;
        color:#64748b;
        margin-top:2px;
    }

    .sf-state-card{
        background:#fff;
        border:1px solid var(--sf-border);
        border-radius:24px;
        box-shadow:0 14px 35px rgba(15,23,42,.06);
        margin-bottom:18px;
        overflow:hidden;
    }

    .sf-state-head{
        padding:18px;
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:14px;
        background:linear-gradient(180deg,#ffffff,#f8fafc);
        border-bottom:1px solid var(--sf-border);
    }

    .sf-state-left{
        display:flex;
        align-items:center;
        gap:13px;
    }

    .sf-state-avatar{
        width:48px;
        height:48px;
        border-radius:16px;
        display:flex;
        align-items:center;
        justify-content:center;
        background:var(--sf-soft);
        color:var(--sf-primary);
        font-weight:1000;
        border:1px solid #bfdbfe;
    }

    .sf-state-name{
        margin:0;
        font-size:19px;
        font-weight:950;
        color:#0f172a;
        letter-spacing:-.02em;
    }

    .sf-state-meta{
        color:#64748b;
        font-size:13px;
        margin-top:3px;
    }

    .sf-state-counts{
        display:flex;
        gap:8px;
        flex-wrap:wrap;
        justify-content:flex-end;
    }

    .sf-pill{
        display:inline-flex;
        align-items:center;
        gap:6px;
        border-radius:999px;
        padding:7px 10px;
        font-size:12px;
        font-weight:900;
        border:1px solid transparent;
    }

    .sf-pill.available{background:#dcfce7;color:#166534;border-color:#bbf7d0}
    .sf-pill.taken{background:#fee2e2;color:#991b1b;border-color:#fecaca}
    .sf-pill.reserved{background:#ffedd5;color:#9a3412;border-color:#fed7aa}
    .sf-pill.inactive{background:#f1f5f9;color:#475569;border-color:#e2e8f0}

    .sf-slot-grid{
        padding:18px;
        display:grid;
        grid-template-columns:repeat(3,minmax(0,1fr));
        gap:16px;
    }

    .sf-slot-card{
        border:1px solid var(--sf-border);
        border-radius:22px;
        background:#fff;
        padding:16px;
        position:relative;
        transition:.18s ease;
    }

    .sf-slot-card:hover{
        box-shadow:0 16px 35px rgba(15,23,42,.08);
        transform:translateY(-2px);
    }

    .sf-slot-card.is-taken{
        border-color:#fecaca;
        background:linear-gradient(180deg,#fff,#fff7f7);
    }

    .sf-slot-card.is-reserved{
        border-color:#fed7aa;
        background:linear-gradient(180deg,#fff,#fff9f2);
    }

    .sf-slot-card.is-free{
        border-color:#bbf7d0;
        background:linear-gradient(180deg,#fff,#f8fff9);
    }

    .sf-slot-card.is-inactive{
        opacity:.78;
        background:#f8fafc;
    }

    .sf-slot-top{
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        gap:10px;
        margin-bottom:14px;
    }

    .sf-slot-title{
        margin:0;
        color:#0f172a;
        font-size:17px;
        font-weight:950;
    }

    .sf-slot-small{
        color:#64748b;
        font-size:12px;
        margin-top:4px;
    }

    .sf-badge{
        display:inline-flex;
        border-radius:999px;
        padding:6px 10px;
        font-size:11px;
        font-weight:950;
        white-space:nowrap;
    }

    .sf-badge.ok{background:#dcfce7;color:#166534}
    .sf-badge.bad{background:#fee2e2;color:#991b1b}
    .sf-badge.warn{background:#ffedd5;color:#9a3412}
    .sf-badge.muted{background:#e2e8f0;color:#475569}

    .sf-grid-2{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:12px;
    }

    .sf-form-block{
        margin-top:12px;
    }

    .sf-addon-box{
        margin-top:14px;
        border:1px solid #bfdbfe;
        background:#eff6ff;
        border-radius:18px;
        padding:14px;
    }

    .sf-checkline{
        display:flex;
        align-items:center;
        gap:10px;
        font-weight:950;
        color:#0f172a;
        margin-bottom:12px;
    }

    .sf-checkline input{
        width:18px;
        height:18px;
        accent-color:var(--sf-primary);
    }

    .sf-addon-note{
        margin-top:10px;
    }

    .sf-total-preview{
        margin-top:14px;
        border-radius:16px;
        background:#0f172a;
        color:#fff;
        padding:13px 14px;
        display:flex;
        justify-content:space-between;
        gap:10px;
        align-items:center;
    }

    .sf-total-preview span{
        color:#cbd5e1;
        font-size:12px;
        font-weight:800;
    }

    .sf-total-preview strong{
        font-size:18px;
        font-weight:1000;
    }

    .sf-switch{
        margin-top:14px;
        padding-top:14px;
        border-top:1px solid var(--sf-border);
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:10px;
    }

    .sf-switch label{
        margin:0;
        font-weight:950;
        color:#0f172a;
    }

    .sf-switch input{
        width:20px;
        height:20px;
        accent-color:var(--sf-primary);
    }

    .sf-company{
        margin-top:9px;
        font-size:12px;
        color:#64748b;
        line-height:1.45;
    }

    .sf-pagination{
        margin-top:18px;
    }

    .sf-empty{
        padding:35px;
        text-align:center;
        border:1px dashed #cbd5e1;
        border-radius:22px;
        color:#64748b;
        background:#fff;
    }

    @media(max-width:1199px){
        .sf-slot-grid{grid-template-columns:repeat(2,minmax(0,1fr))}
        .sf-stats{grid-template-columns:repeat(2,minmax(0,1fr))}
    }

    @media(max-width:767px){
        .sf-wrap{padding:14px}
        .sf-hero{padding:20px}
        .sf-title{font-size:23px}
        .sf-slot-grid{grid-template-columns:1fr}
        .sf-grid-2{grid-template-columns:1fr}
        .sf-toolbar,.sf-state-head{align-items:flex-start;flex-direction:column}
        .sf-save-main,.sf-btn{width:100%}
        .sf-stats{grid-template-columns:1fr}
    }
</style>

<div class="sf-wrap">

    <div class="sf-hero">
        <div class="sf-hero-top">
            <div>
                <div class="sf-kicker">★ Sponsored states management</div>
                <h1 class="sf-title">State Featured Ad Slots</h1>
                <p class="sf-sub">
                    Manage monthly/yearly pricing, lead add-ons, perks, availability, and active sponsored slots for every state.
                </p>
            </div>

            <button class="sf-save-main" type="submit" form="sfSlotsForm">
                Save All Changes
            </button>
        </div>

        <div class="sf-stats">
            <div class="sf-stat">
                <span>Total Slots</span>
                <strong>{{ $totalSlots }}</strong>
            </div>
            <div class="sf-stat">
                <span>Available</span>
                <strong>{{ $availableSlots }}</strong>
            </div>
            <div class="sf-stat">
                <span>Taken</span>
                <strong>{{ $takenSlots }}</strong>
            </div>
            <div class="sf-stat">
                <span>Reserved / Inactive</span>
                <strong>{{ $reservedSlots + $inactiveSlots }}</strong>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="sf-alert sf-alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="sf-panel">
        <form class="sf-filter" method="GET">
            <div class="sf-field" style="min-width:280px">
                <label>Filter State</label>
                <select class="sf-select" name="state_id">
                    <option value="">All states</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}" @selected($selectedStateId == $state->id)>
                            {{ $state->name }} ({{ $state->abv }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="sf-field" style="min-width:230px">
                <label>Slot Status</label>
                <select class="sf-select" name="slot_status">
                    <option value="">All slot states</option>
                    <option value="taken" @selected(($selectedSlotStatus ?? '') === 'taken')>
                        Taken slots only
                    </option>
                    <option value="available" @selected(($selectedSlotStatus ?? '') === 'available')>
                        Available slots only
                    </option>
                    <option value="reserved" @selected(($selectedSlotStatus ?? '') === 'reserved')>
                        Reserved slots only
                    </option>
                    <option value="inactive" @selected(($selectedSlotStatus ?? '') === 'inactive')>
                        Inactive slots only
                    </option>
                </select>
            </div>

            <button class="sf-btn" type="submit">Apply Filter</button>

            @if(!empty($selectedStateId) || !empty($selectedSlotStatus))
                <a class="sf-btn sf-btn-light" href="{{ url()->current() }}">Clear</a>
            @endif
        </form>
    </div>

    <form method="POST" action="{{ route('admin.state-featured-slots.updateMany') }}" id="sfSlotsForm">
        @csrf

        <div class="sf-toolbar">
            <div>
                <div class="sf-toolbar-title">Bulk slot editor</div>
                <div class="sf-toolbar-note">Edit multiple states and slots, then save once.</div>
            </div>
            <button class="sf-btn" type="submit">Save Changes</button>
        </div>

        @forelse($statesWithSlots as $state)
            @php
                $stateTaken = $state->featuredSlots->filter(function ($slot) use ($slotFinalStatus) {
                    return $slotFinalStatus($slot) === 'taken';
                })->count();

                $stateReserved = $state->featuredSlots->filter(function ($slot) use ($slotFinalStatus) {
                    return $slotFinalStatus($slot) === 'reserved';
                })->count();

                $stateInactive = $state->featuredSlots->filter(function ($slot) use ($slotFinalStatus) {
                    return $slotFinalStatus($slot) === 'inactive';
                })->count();

                $stateAvailable = $state->featuredSlots->filter(function ($slot) use ($slotFinalStatus) {
                    return $slotFinalStatus($slot) === 'available';
                })->count();
            @endphp

            <section class="sf-state-card">
                <div class="sf-state-head">
                    <div class="sf-state-left">
                        <div class="sf-state-avatar">{{ $state->abv }}</div>
                        <div>
                            <h2 class="sf-state-name">{{ $state->name }}, {{ $state->abv }}</h2>
                            <div class="sf-state-meta">3 sponsored slots available per state</div>
                        </div>
                    </div>

                    <div class="sf-state-counts">
                        <span class="sf-pill available">{{ $stateAvailable }} Available</span>
                        <span class="sf-pill taken">{{ $stateTaken }} Taken</span>
                        @if($stateReserved > 0)
                            <span class="sf-pill reserved">{{ $stateReserved }} Reserved</span>
                        @endif
                        @if($stateInactive > 0)
                            <span class="sf-pill inactive">{{ $stateInactive }} Inactive</span>
                        @endif
                    </div>
                </div>

                <div class="sf-slot-grid">
                    @foreach($state->featuredSlots as $slot)
                        @php
                            $key = $slot->id;
                            $taken = $slot->activeSubscription;
                            $reserved = $slot->pendingReservation;
                            $finalStatus = $slotFinalStatus($slot);

                            if ($finalStatus === 'inactive') {
                                $cardClass = 'is-inactive';
                                $badgeClass = 'muted';
                                $badgeText = 'Inactive';
                            } elseif ($finalStatus === 'taken') {
                                $cardClass = 'is-taken';
                                $badgeClass = 'bad';
                                $badgeText = 'Taken';
                            } elseif ($finalStatus === 'reserved') {
                                $cardClass = 'is-reserved';
                                $badgeClass = 'warn';
                                $badgeText = 'Reserved';
                            } else {
                                $cardClass = 'is-free';
                                $badgeClass = 'ok';
                                $badgeText = 'Available';
                            }

                            $monthlyPrice = old("slots.$key.monthly_price", number_format($slot->monthly_price_cents / 100, 2, '.', ''));
                            $yearlyPrice = old("slots.$key.yearly_price", number_format($slot->yearly_price_cents / 100, 2, '.', ''));
                            $leadEnabled = old("slots.$key.lead_addon_enabled", ($slot->lead_addon_enabled ?? true) ? 1 : 0);
                            $leadCount = old("slots.$key.lead_addon_leads_count", $slot->lead_addon_leads_count ?: 5);
                            $leadPrice = old("slots.$key.lead_addon_price", number_format(($slot->lead_addon_price_cents ?? 10000) / 100, 2, '.', ''));
                            $isActive = old("slots.$key.is_active", $slot->is_active ? 1 : 0);
                        @endphp

                        <article class="sf-slot-card {{ $cardClass }}" data-slot-card>
                            <input type="hidden" name="slots[{{ $key }}][id]" value="{{ $slot->id }}">

                            <div class="sf-slot-top">
                                <div>
                                    <h3 class="sf-slot-title">Slot {{ $slot->slot_number }}</h3>
                                    <div class="sf-slot-small">
                                        {{ $slot->slot_number == 1 ? 'Top placement slot' : 'Sponsored placement slot' }}
                                    </div>
                                </div>

                                <span class="sf-badge {{ $badgeClass }}">{{ $badgeText }}</span>
                            </div>

                            @if($taken)
                                <div class="sf-company">
                                    <strong>Company:</strong>
                                    {{ optional($taken->company)->company_name ?? optional($taken->company)->name ?? 'Company' }}
                                </div>
                            @elseif($reserved)
                                <div class="sf-company">
                                    <strong>Reserved until:</strong>
                                    {{ $reserved->reserved_until?->format('M d, h:i A') }}
                                </div>
                            @endif

                            <div class="sf-form-block">
                                <label class="sf-label">Slot Label</label>
                                <input
                                    class="sf-input"
                                    name="slots[{{ $key }}][label]"
                                    value="{{ old("slots.$key.label", $slot->label) }}"
                                    placeholder="Example: Slot 1 - Top"
                                >
                            </div>

                            <div class="sf-grid-2 sf-form-block">
                                <div>
                                    <label class="sf-label">Monthly Price $</label>
                                    <input
                                        class="sf-input"
                                        type="number"
                                        step="0.01"
                                        min="1"
                                        name="slots[{{ $key }}][monthly_price]"
                                        value="{{ $monthlyPrice }}"
                                        data-monthly-price
                                    >
                                </div>

                                <div>
                                    <label class="sf-label">Yearly Price $</label>
                                    <input
                                        class="sf-input"
                                        type="number"
                                        step="0.01"
                                        min="1"
                                        name="slots[{{ $key }}][yearly_price]"
                                        value="{{ $yearlyPrice }}"
                                    >
                                </div>
                            </div>

                            <div class="sf-form-block">
                                <label class="sf-label">Yearly Discount %</label>
                                <input
                                    class="sf-input"
                                    type="number"
                                    min="0"
                                    max="100"
                                    name="slots[{{ $key }}][yearly_discount_percent]"
                                    value="{{ old("slots.$key.yearly_discount_percent", $slot->yearly_discount_percent) }}"
                                >
                            </div>

                            <div class="sf-addon-box">
                                <input type="hidden" name="slots[{{ $key }}][lead_addon_enabled]" value="0">

                                <label class="sf-checkline">
                                    <input
                                        type="checkbox"
                                        name="slots[{{ $key }}][lead_addon_enabled]"
                                        value="1"
                                        data-lead-enabled
                                        @checked((int) $leadEnabled === 1)
                                    >
                                    Enable leads add-on
                                </label>

                                <div class="sf-grid-2">
                                    <div>
                                        <label class="sf-label">Leads</label>
                                        <input
                                            class="sf-input"
                                            type="number"
                                            min="0"
                                            name="slots[{{ $key }}][lead_addon_leads_count]"
                                            value="{{ $leadCount }}"
                                        >
                                    </div>

                                    <div>
                                        <label class="sf-label">Add-on Price $</label>
                                        <input
                                            class="sf-input"
                                            type="number"
                                            step="0.01"
                                            min="0"
                                            name="slots[{{ $key }}][lead_addon_price]"
                                            value="{{ $leadPrice }}"
                                            data-lead-price
                                        >
                                    </div>
                                </div>

                                <div class="sf-addon-note">
                                    <label class="sf-label">Add-on Note</label>
                                    <input
                                        class="sf-input"
                                        name="slots[{{ $key }}][lead_addon_note]"
                                        value="{{ old("slots.$key.lead_addon_note", $slot->lead_addon_note ?: '$20 deducted per quote or booking. Quote $200 → $180 · Booked $250 → $230.') }}"
                                        placeholder="Add-on short note"
                                    >
                                </div>
                            </div>

                            <div class="sf-form-block">
                                <label class="sf-label">Perks</label>
                                <textarea
                                    class="sf-textarea"
                                    name="slots[{{ $key }}][perks]"
                                    placeholder="One perk per line"
                                >{{ old("slots.$key.perks", implode("\n", $slot->perks ?? [])) }}</textarea>
                            </div>

                            <div class="sf-total-preview">
                                <span>Monthly total preview</span>
                                <strong data-total-preview>$0.00/mo</strong>
                            </div>

                            <div class="sf-switch">
                                <label>Slot Active</label>
                                <input type="hidden" name="slots[{{ $key }}][is_active]" value="0">
                                <input
                                    type="checkbox"
                                    name="slots[{{ $key }}][is_active]"
                                    value="1"
                                    @checked((int) $isActive === 1)
                                >
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @empty
            <div class="sf-empty">
                No states found for the selected filter.
            </div>
        @endforelse

        <div class="sf-toolbar">
            <div>
                <div class="sf-toolbar-title">Ready to update slots?</div>
                <div class="sf-toolbar-note">All pricing, add-ons, perks, and active statuses will be saved together.</div>
            </div>
            <button class="sf-btn" type="submit">Save All Changes</button>
        </div>
    </form>

    <div class="sf-pagination">
        {{ $statesWithSlots->links() }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const money = function (value) {
            const amount = Number(value || 0);
            return '$' + amount.toFixed(2) + '/mo';
        };

        const refreshCard = function (card) {
            const monthlyInput = card.querySelector('[data-monthly-price]');
            const leadCheckbox = card.querySelector('[data-lead-enabled]');
            const leadPriceInput = card.querySelector('[data-lead-price]');
            const preview = card.querySelector('[data-total-preview]');

            if (!monthlyInput || !leadCheckbox || !leadPriceInput || !preview) {
                return;
            }

            const monthly = parseFloat(monthlyInput.value || 0);
            const leadPrice = leadCheckbox.checked ? parseFloat(leadPriceInput.value || 0) : 0;

            preview.textContent = money(monthly + leadPrice);
        };

        document.querySelectorAll('[data-slot-card]').forEach(function (card) {
            refreshCard(card);

            card.addEventListener('input', function () {
                refreshCard(card);
            });

            card.addEventListener('change', function () {
                refreshCard(card);
            });
        });
    });
</script>
@endsection