@extends('company.layouts.master')

@section('content')
<style>
    :root {
        --sfa-page: #f5f7fb;
        --sfa-white: #ffffff;
        --sfa-card: #ffffff;
        --sfa-soft: #f8fafc;
        --sfa-line: #e2e8f0;
        --sfa-line-strong: #cbd5e1;
        --sfa-text: #0f172a;
        --sfa-muted: #64748b;
        --sfa-blue: #2563eb;
        --sfa-blue-soft: #eff6ff;
        --sfa-green: #10b981;
        --sfa-green-soft: #ecfdf5;
        --sfa-red: #ef4444;
        --sfa-red-soft: #fef2f2;
        --sfa-orange: #f59e0b;
        --sfa-shadow: 0 18px 50px rgba(15, 23, 42, .08);
    }

    .state-ad-wrap {
        background: var(--sfa-page);
        color: var(--sfa-text);
        border-radius: 22px;
        padding: 26px;
        min-height: calc(100vh - 120px);
    }

    .state-ad-panel {
        background: var(--sfa-white);
        border: 1px solid var(--sfa-line);
        border-radius: 22px;
        padding: 24px;
        box-shadow: var(--sfa-shadow);
    }

    .state-ad-head {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 16px;
        margin-bottom: 20px;
    }

    .state-kicker {
        color: var(--sfa-blue);
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .state-ad-title {
        font-size: 28px;
        line-height: 1.15;
        font-weight: 900;
        margin: 0;
        color: var(--sfa-text);
    }

    .state-ad-sub {
        color: var(--sfa-muted);
        margin: 8px 0 0;
        font-size: 14px;
    }

    .state-stats {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .state-stat-pill {
        background: var(--sfa-soft);
        border: 1px solid var(--sfa-line);
        border-radius: 999px;
        padding: 8px 12px;
        font-size: 13px;
        color: var(--sfa-muted);
        font-weight: 700;
    }

    .alert-state-ok,
    .alert-state-bad {
        border-radius: 14px;
        padding: 12px 14px;
        margin-bottom: 14px;
        font-weight: 700;
    }

    .alert-state-ok {
        background: var(--sfa-green-soft);
        border: 1px solid #a7f3d0;
        color: #065f46;
    }

    .alert-state-bad {
        background: var(--sfa-red-soft);
        border: 1px solid #fecaca;
        color: #991b1b;
    }

    .my-slots-title {
        font-size: 16px;
        margin: 20px 0 12px;
        font-weight: 900;
        color: var(--sfa-text);
    }

    .my-slots {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 22px;
    }

    .my-slot {
        background: linear-gradient(135deg, #eff6ff, #ffffff);
        border: 1px solid #bfdbfe;
        border-radius: 16px;
        padding: 15px;
        color: var(--sfa-text);
    }

    .cancel-btn {
        width: 100%;
        border: 1px solid var(--sfa-line-strong);
        background: var(--sfa-white);
        color: var(--sfa-text);
        border-radius: 10px;
        padding: 9px 12px;
        font-weight: 800;
        margin-top: 10px;
    }

    .cancel-btn:hover {
        border-color: var(--sfa-red);
        color: var(--sfa-red);
    }

    .state-ad-search-wrap {
        position: relative;
        margin-top: 18px;
    }

    .state-ad-search {
        width: 100%;
        border: 1px solid var(--sfa-line-strong);
        background: var(--sfa-white);
        color: var(--sfa-text);
        border-radius: 14px;
        padding: 14px 16px 14px 44px;
        outline: none;
        font-size: 14px;
        transition: .2s;
    }

    .state-ad-search:focus {
        border-color: var(--sfa-blue);
        box-shadow: 0 0 0 4px rgba(37, 99, 235, .10);
    }

    .search-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--sfa-muted);
        font-size: 16px;
    }

    .state-ad-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 14px;
        margin-top: 18px;
    }

    .state-ad-card {
        border: 1px solid var(--sfa-line);
        background: var(--sfa-card);
        border-radius: 16px;
        padding: 18px;
        text-align: left;
        color: var(--sfa-text);
        cursor: pointer;
        transition: .18s ease;
        min-height: 118px;
        box-shadow: 0 10px 24px rgba(15, 23, 42, .04);
        position: relative;
        overflow: hidden;
    }

    .state-ad-card:before {
        content: "";
        position: absolute;
        inset: 0 0 auto 0;
        height: 4px;
        background: linear-gradient(90deg, var(--sfa-blue), var(--sfa-green));
        opacity: 0;
        transition: .18s ease;
    }

    .state-ad-card:hover {
        border-color: var(--sfa-blue);
        transform: translateY(-2px);
        box-shadow: 0 18px 35px rgba(37, 99, 235, .12);
    }

    .state-ad-card:hover:before {
        opacity: 1;
    }

    .state-ad-card.full {
        background: #f8fafc;
    }

    .state-name-row {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        align-items: flex-start;
    }

    .state-name {
        font-size: 16px;
        font-weight: 900;
        color: var(--sfa-text);
    }

    .state-badge {
        border-radius: 999px;
        padding: 4px 8px;
        font-size: 11px;
        font-weight: 900;
        white-space: nowrap;
    }

    .state-badge.available {
        background: var(--sfa-green-soft);
        color: #047857;
    }

    .state-badge.full {
        background: #f1f5f9;
        color: #64748b;
    }

    .state-meta {
        color: var(--sfa-muted);
        font-size: 13px;
        margin-top: 8px;
    }

    .state-free {
        color: #047857;
        background: var(--sfa-green-soft);
        border: 1px solid #a7f3d0;
        display: inline-flex;
        border-radius: 999px;
        padding: 5px 9px;
        font-size: 12px;
        font-weight: 900;
        margin-top: 12px;
    }

    .state-full {
        color: #64748b;
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        display: inline-flex;
        border-radius: 999px;
        padding: 5px 9px;
        font-size: 12px;
        font-weight: 900;
        margin-top: 12px;
    }

    .sf-modal {
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, .62);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 99999;
        padding: 18px;
    }

    .sf-modal.show {
        display: flex;
    }

    .sf-dialog {
        width: min(600px, 100%);
        background: var(--sfa-white);
        border: 1px solid var(--sfa-line);
        border-radius: 22px;
        color: var(--sfa-text);
        padding: 22px;
        box-shadow: 0 30px 100px rgba(15, 23, 42, .30);
    }

    .sf-modal-top {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        align-items: flex-start;
    }

    .sf-modal-title {
        margin: 0;
        font-size: 24px;
        font-weight: 900;
        color: var(--sfa-text);
    }

    .sf-modal-sub {
        color: var(--sfa-muted);
        margin-top: 5px;
        font-size: 13px;
    }

    .sf-close {
        background: var(--sfa-soft);
        border: 1px solid var(--sfa-line);
        color: var(--sfa-text);
        border-radius: 12px;
        width: 38px;
        height: 38px;
        font-size: 22px;
        line-height: 1;
    }

    .field-title {
        font-weight: 900;
        font-size: 13px;
        margin-top: 18px;
        color: var(--sfa-text);
    }

    .slot-options {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 10px;
        margin-top: 12px;
    }

    .slot-option {
        border: 1px solid var(--sfa-line);
        background: var(--sfa-white);
        border-radius: 14px;
        padding: 13px;
        cursor: pointer;
        position: relative;
        transition: .18s ease;
    }

    .slot-option input {
        position: absolute;
        opacity: 0;
    }

    .slot-option:hover {
        border-color: var(--sfa-blue);
    }

    .slot-option.selected {
        border-color: var(--sfa-blue);
        background: var(--sfa-blue-soft);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .10);
    }

    .slot-option.unavailable {
        opacity: .58;
        cursor: not-allowed;
        background: #f8fafc;
    }

    .slot-num {
        font-size: 12px;
        color: var(--sfa-muted);
        font-weight: 900;
    }

    .slot-price {
        font-size: 15px;
        font-weight: 900;
        margin-top: 6px;
        color: var(--sfa-text);
    }

    .slot-cost {
        color: var(--sfa-muted);
        font-size: 13px;
        margin-top: 4px;
    }

    .cycle-tabs {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px;
        margin-top: 12px;
    }

    .cycle-tabs label {
        border: 1px solid var(--sfa-line);
        background: var(--sfa-white);
        border-radius: 14px;
        padding: 13px;
        cursor: pointer;
        font-weight: 800;
        color: var(--sfa-text);
    }

    .cycle-tabs label:has(input:checked) {
        border-color: var(--sfa-blue);
        background: var(--sfa-blue-soft);
    }

    .cycle-tabs input {
        margin-right: 8px;
    }

    .perks {
        border: 1px solid #bfdbfe;
        background: var(--sfa-blue-soft);
        border-radius: 14px;
        margin-top: 14px;
        padding: 13px;
        color: #1e3a8a;
        font-size: 13px;
    }



    .addon-box {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        border: 1px solid var(--sfa-line);
        background: #ffffff;
        border-radius: 14px;
        margin-top: 14px;
        padding: 13px 14px;
        cursor: pointer;
        transition: .18s ease;
    }

    .addon-box:hover,
    .addon-box.active {
        border-color: var(--sfa-blue);
        background: var(--sfa-blue-soft);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .08);
    }

    .addon-box input {
        margin-top: 3px;
        width: 16px;
        height: 16px;
        accent-color: var(--sfa-blue);
    }

    .addon-title {
        font-weight: 900;
        color: var(--sfa-text);
        font-size: 14px;
    }

    .addon-note {
        color: var(--sfa-muted);
        font-size: 12px;
        margin-top: 4px;
        line-height: 1.45;
    }

    .summary {
        display: flex;
        justify-content: space-between;
        background: var(--sfa-soft);
        border: 1px solid var(--sfa-line);
        border-radius: 14px;
        padding: 15px;
        margin-top: 14px;
        color: var(--sfa-text);
    }

    .summary strong {
        font-size: 20px;
    }

    .reserve-btn {
        width: 100%;
        border: 1px solid var(--sfa-blue);
        background: var(--sfa-blue);
        color: #fff;
        border-radius: 14px;
        padding: 14px;
        font-weight: 900;
        margin-top: 12px;
        transition: .18s ease;
    }

    .reserve-btn:hover:not(:disabled) {
        background: #1d4ed8;
        border-color: #1d4ed8;
        transform: translateY(-1px);
    }

    .reserve-btn:disabled {
        opacity: .55;
        cursor: not-allowed;
    }

    @media (max-width: 1200px) {
        .state-ad-grid { grid-template-columns: repeat(3, 1fr); }
    }

    @media (max-width: 1000px) {
        .state-ad-grid { grid-template-columns: repeat(2, 1fr); }
        .my-slots { grid-template-columns: 1fr; }
    }

    @media (max-width: 600px) {
        .state-ad-wrap { padding: 14px; }
        .state-ad-panel { padding: 18px; }
        .state-ad-grid,
        .slot-options,
        .cycle-tabs { grid-template-columns: 1fr; }
        .state-ad-head { display: block; }
        .state-ad-title { font-size: 23px; }
    }
</style>

@php
    $statePayloads = [];

    foreach ($states as $stateItem) {
        $stateSlots = $stateItem->featuredSlots;
        $stateFree = $stateSlots->filter(function ($slot) {
            return $slot->isAvailable();
        })->count();

        $statePayloads[] = [
            'id' => $stateItem->id,
            'name' => $stateItem->name,
            'abv' => $stateItem->abv,
            'free' => $stateFree,
            'slots' => $stateSlots->map(function ($slot) {
                return [
                    'id' => $slot->id,
                    'slot_number' => $slot->slot_number,
                    'label' => $slot->label ?: ('Slot '.$slot->slot_number),
                    'available' => $slot->isAvailable(),
                    'monthly' => number_format($slot->monthly_price_cents / 100, 2, '.', ''),
                    'yearly' => number_format($slot->yearly_price_cents / 100, 2, '.', ''),
                    'discount' => (int) $slot->yearly_discount_percent,
                    'lead_addon_enabled' => (bool) $slot->lead_addon_enabled,
                    'lead_addon_leads_count' => (int) ($slot->lead_addon_leads_count ?: 5),
                    'lead_addon_price' => number_format(($slot->lead_addon_price_cents ?? 0) / 100, 2, '.', ''),
                    'lead_addon_note' => $slot->lead_addon_note ?: null,
                    'perks' => $slot->perks ?? [],
                    'taken_by' => optional(optional($slot->activeSubscription)->company)->company_name
                        ?? optional(optional($slot->activeSubscription)->company)->name,
                ];
            })->values()->toArray(),
        ];
    }
@endphp

<div class="state-ad-wrap">
    <div class="state-ad-panel">
        <div class="state-ad-head">
            <div>
                <div class="state-kicker">Featured ads · States</div>
                <h1 class="state-ad-title">Reserve sponsored state slots</h1>
                <p class="state-ad-sub">Each state has 3 slots. Available slots can be reserved monthly or yearly.</p>
            </div>
            <div class="state-stats">
                <span class="state-stat-pill">3 slots per state</span>
                <span class="state-stat-pill">Monthly / Yearly</span>
            </div>
        </div>

        @if(session('success'))
            <div class="alert-state-ok">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert-state-bad">{{ session('error') }}</div>
        @endif

        @if($mySubscriptions->count())
            <h3 class="my-slots-title">Your active/reserved slots</h3>
            <div class="my-slots">
                @foreach($mySubscriptions as $sub)
                    <div class="my-slot">
                        <strong>{{ $sub->state->name }}, {{ $sub->state->abv }} · Slot {{ $sub->slot->slot_number }}</strong><br>
                        @php $displayTotal = $sub->total_price_cents ?: (($sub->price_cents ?? 0) + ($sub->lead_addon_price_cents ?? 0)); @endphp
                        <small>${{ number_format($displayTotal / 100, 2) }}/{{ $sub->billing_cycle === 'yearly' ? 'yr' : 'mo' }} · {{ ucfirst($sub->status) }}</small><br>
                        @if($sub->lead_addon_selected)
                            <small style="color:#2563eb;font-weight:800">Includes {{ $sub->lead_addon_leads_count }} leads add-on</small><br>
                        @endif

                        @if($sub->status === 'active' && ! $sub->cancel_at_period_end)
                            <form method="POST" action="{{ route('company.state-featured-ads.cancel-subscription', $sub) }}" onsubmit="return confirm('Cancel at period end?')">
                                @csrf
                                <button class="cancel-btn" type="submit">Cancel at period end</button>
                            </form>
                        @elseif($sub->cancel_at_period_end)
                            <small>Cancellation scheduled for {{ $sub->ends_at?->format('M d, Y') }}</small>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        <form method="GET" class="state-ad-search-wrap">
            <span class="search-icon">⌕</span>
            <input class="state-ad-search" name="search" value="{{ $search }}" placeholder="Search available states...">
        </form>

        <div class="state-ad-grid">
            @foreach($states as $state)
                @php
                    $slots = $state->featuredSlots;
                    $free = $slots->filter(function ($slot) {
                        return $slot->isAvailable();
                    })->count();
                    $lowest = $slots->where('is_active', true)->min('monthly_price_cents');
                @endphp

                <button
                    type="button"
                    class="state-ad-card {{ $free == 0 ? 'full' : '' }}"
                    data-state-id="{{ $state->id }}"
                >
                    <div class="state-name-row">
                        <div class="state-name">{{ $state->name }}</div>
                        <span class="state-badge {{ $free > 0 ? 'available' : 'full' }}">
                            {{ $free > 0 ? 'Available' : 'Unavailable' }}
                        </span>
                    </div>

                    <div class="state-meta">
                        {{ $state->abv }} ·
                        @if($lowest)
                            ${{ number_format($lowest / 100, 0) }}/mo
                        @else
                            Price not set
                        @endif
                    </div>

                    @if($free > 0)
                        <div class="state-free">{{ $free }} of 3 free</div>
                    @else
                        <div class="state-full">0 of 3 — full</div>
                    @endif
                </button>
            @endforeach
        </div>
    </div>
</div>

<div class="sf-modal" id="slotModal" aria-hidden="true">
    <div class="sf-dialog">
        <div class="sf-modal-top">
            <div>
                <h2 id="modalTitle" class="sf-modal-title"></h2>
                <div class="sf-modal-sub">State featured slot · “Sponsored” labeled</div>
            </div>
            <button class="sf-close" type="button" id="closeSlotModalBtn">×</button>
        </div>

        <form method="POST" action="{{ route('company.state-featured-ads.checkout') }}" id="slotForm">
            @csrf
            <input type="hidden" name="slot_id" id="selectedSlotId">

            <div class="field-title">Choose your slot</div>
            <div class="slot-options" id="slotOptions"></div>

            <div class="field-title">Billing cycle</div>
            <div class="cycle-tabs">
                <label><input type="radio" name="billing_cycle" value="monthly" checked> Monthly</label>
                <label><input type="radio" name="billing_cycle" value="yearly"> Yearly <span id="yearlyDiscount"></span></label>
            </div>

            <div class="perks" id="perksBox">Select an available slot to see perks.</div>

            <label class="addon-box" id="leadAddonBox" style="display:none">
                <input type="checkbox" name="lead_addon" value="1" id="leadAddonInput">
                <span>
                    <span class="addon-title">Add leads pack — <span id="leadAddonCount">5</span> leads · <span id="leadAddonPrice">$100</span></span>
                    <span class="addon-note" id="leadAddonNote">Lead add-on will be added as a separate recurring Stripe invoice line.</span>
                </span>
            </label>

            <div class="summary"><span>Total</span><strong id="totalPrice">$0/mo</strong></div>
            <button class="reserve-btn" id="reserveButton" type="submit" disabled>Reserve & continue</button>
            <div style="text-align:center;color:#64748b;font-size:12px;margin-top:10px">Verified movers only</div>
        </form>
    </div>
</div>

<script>
    (function () {
        'use strict';

        const statesData = {!! json_encode($statePayloads, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) !!};
        let currentStateSlots = [];
        let selectedSlot = null;

        const modal = document.getElementById('slotModal');
        const modalTitle = document.getElementById('modalTitle');
        const slotOptions = document.getElementById('slotOptions');
        const selectedSlotId = document.getElementById('selectedSlotId');
        const reserveButton = document.getElementById('reserveButton');
        const yearlyDiscount = document.getElementById('yearlyDiscount');
        const perksBox = document.getElementById('perksBox');
        const totalPrice = document.getElementById('totalPrice');
        const closeBtn = document.getElementById('closeSlotModalBtn');
        const leadAddonBox = document.getElementById('leadAddonBox');
        const leadAddonInput = document.getElementById('leadAddonInput');
        const leadAddonCount = document.getElementById('leadAddonCount');
        const leadAddonPrice = document.getElementById('leadAddonPrice');
        const leadAddonNote = document.getElementById('leadAddonNote');

        document.addEventListener('click', function (event) {
            const card = event.target.closest('.state-ad-card');
            if (!card) {
                return;
            }

            const stateId = String(card.getAttribute('data-state-id'));
            const state = statesData.find(function (item) {
                return String(item.id) === stateId;
            });

            if (state) {
                openSlotModal(state);
            }
        });

        document.querySelectorAll('input[name="billing_cycle"]').forEach(function (input) {
            input.addEventListener('change', updateTotal);
        });

        if (leadAddonInput) {
            leadAddonInput.addEventListener('change', updateTotal);
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', closeSlotModal);
        }

        if (modal) {
            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    closeSlotModal();
                }
            });
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeSlotModal();
            }
        });

        function openSlotModal(state) {
            currentStateSlots = state.slots || [];
            selectedSlot = null;
            selectedSlotId.value = '';
            reserveButton.disabled = true;
            yearlyDiscount.textContent = '';
            if (leadAddonInput) {
                leadAddonInput.checked = false;
            }
            if (leadAddonBox) {
                leadAddonBox.style.display = 'none';
                leadAddonBox.classList.remove('active');
            }
            modalTitle.textContent = state.name + ', ' + state.abv;
            slotOptions.innerHTML = '';

            currentStateSlots.forEach(function (slot) {
                const div = document.createElement('div');
                div.className = 'slot-option' + (slot.available ? '' : ' unavailable');

                const statusText = slot.available ? 'Available' : 'Unavailable';
                const takenText = slot.taken_by ? '<div class="slot-cost">Taken by: ' + escapeHtml(slot.taken_by) + '</div>' : '';

                div.innerHTML =
                    '<input type="radio" ' + (slot.available ? '' : 'disabled') + '>' +
                    '<div class="slot-num">SLOT ' + slot.slot_number + (Number(slot.slot_number) === 1 ? ' · TOP' : '') + '</div>' +
                    '<div class="slot-price">' + statusText + '</div>' +
                    '<div class="slot-cost">$' + Number(slot.monthly).toFixed(0) + '/mo</div>' +
                    takenText;

                if (slot.available) {
                    div.addEventListener('click', function () {
                        selectSlot(slot, div);
                    });
                }

                slotOptions.appendChild(div);
            });

            const firstAvailableSlot = currentStateSlots.find(function (slot) {
                return slot.available;
            });

            if (firstAvailableSlot) {
                const firstAvailableElement = Array.prototype.slice.call(slotOptions.querySelectorAll('.slot-option')).find(function (element, index) {
                    return String(currentStateSlots[index].id) === String(firstAvailableSlot.id);
                });

                if (firstAvailableElement) {
                    selectSlot(firstAvailableSlot, firstAvailableElement);
                }
            } else {
                updateTotal();
                perksBox.innerHTML = 'All 3 slots are currently unavailable for this state.';
            }

            modal.classList.add('show');
            modal.setAttribute('aria-hidden', 'false');
        }

        function selectSlot(slot, element) {
            selectedSlot = slot;

            slotOptions.querySelectorAll('.slot-option').forEach(function (option) {
                option.classList.remove('selected');
            });

            element.classList.add('selected');
            selectedSlotId.value = slot.id;
            reserveButton.disabled = false;
            yearlyDiscount.textContent = Number(slot.discount) > 0 ? '(' + slot.discount + '% off)' : '';

            const perks = Array.isArray(slot.perks) ? slot.perks : [];
            perksBox.innerHTML = perks.length
                ? perks.map(function (perk) { return '<div>• ' + escapeHtml(perk) + '</div>'; }).join('')
                : 'Sponsored label, state visibility and preferred placement.';

            const addonEnabled = Boolean(slot.lead_addon_enabled) && Number(slot.lead_addon_price || 0) > 0;
            if (leadAddonBox) {
                leadAddonBox.style.display = addonEnabled ? 'flex' : 'none';
                leadAddonBox.classList.remove('active');
            }
            if (leadAddonInput) {
                leadAddonInput.checked = false;
            }
            if (leadAddonCount) {
                leadAddonCount.textContent = slot.lead_addon_leads_count || 5;
            }
            if (leadAddonPrice) {
                leadAddonPrice.textContent = '$' + Number(slot.lead_addon_price || 0).toFixed(0);
            }
            if (leadAddonNote) {
                leadAddonNote.textContent = slot.lead_addon_note || 'Lead add-on will be added as a separate recurring Stripe invoice line.';
            }

            updateTotal();
        }

        function updateTotal() {
            if (!selectedSlot) {
                totalPrice.textContent = '$0/mo';
                return;
            }

            const checkedCycle = document.querySelector('input[name="billing_cycle"]:checked');
            const cycle = checkedCycle ? checkedCycle.value : 'monthly';
            const baseAmount = Number(cycle === 'yearly' ? selectedSlot.yearly : selectedSlot.monthly);
            const addonMonthlyAmount = Number(selectedSlot.lead_addon_price || 0);
            const addonChecked = Boolean(leadAddonInput && leadAddonInput.checked && addonMonthlyAmount > 0);
            const addonAmount = addonChecked ? (cycle === 'yearly' ? addonMonthlyAmount * 12 : addonMonthlyAmount) : 0;
            const totalAmount = baseAmount + addonAmount;

            if (leadAddonBox) {
                leadAddonBox.classList.toggle('active', addonChecked);
            }

            totalPrice.textContent = '$' + totalAmount.toFixed(2) + '/' + (cycle === 'yearly' ? 'yr' : 'mo') + (addonChecked ? ' + leads' : '');
        }

        function closeSlotModal() {
            modal.classList.remove('show');
            modal.setAttribute('aria-hidden', 'true');
        }

        function escapeHtml(value) {
            return String(value || '')
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }
    })();
</script>
@endsection
