@extends('company.layouts.master')

@section('content')
@php
    $routeItems = method_exists($routes, 'getCollection')
        ? $routes->getCollection()
        : collect($routes);

    $routePayloads = $routeItems->map(function ($route) {
        $slots = collect($route->featuredSlots ?? []);

        return [
            'id' => (string) $route->id,
            'name' => $route->name,
            'abv' => $route->abv ?? '',
            'slots' => $slots->map(function ($slot) {
                $activeCompany = optional(optional($slot->activeSubscription)->company);

                return [
                    'id' => $slot->id,
                    'slot_number' => $slot->slot_number,
                    'label' => $slot->label ?: ('Slot '.$slot->slot_number),
                    'available' => method_exists($slot, 'isAvailable') ? $slot->isAvailable() : false,
                    'monthly' => number_format(($slot->monthly_price_cents ?? 0) / 100, 2, '.', ''),
                    'yearly' => number_format(($slot->yearly_price_cents ?? 0) / 100, 2, '.', ''),
                    'discount' => (int) ($slot->yearly_discount_percent ?? 0),
                    'perks' => is_array($slot->perks ?? null) ? $slot->perks : [],
                    'taken_by' => $activeCompany->company_name ?? $activeCompany->name ?? null,
                ];
            })->values()->toArray(),
        ];
    })->values()->toArray();
@endphp

<style>
    .rf-page {
        background: #f8fafc;
        border-radius: 22px;
        padding: 22px;
    }

    .rf-hero {
        background: #fff;
        border: 1px solid #dbe5f1;
        border-radius: 22px;
        padding: 22px;
        margin-bottom: 16px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, .05);
    }

    .rf-title {
        font-size: 30px;
        font-weight: 950;
        margin: 0;
        color: #020617;
        letter-spacing: -.04em;
    }

    .rf-sub {
        color: #526783;
        margin: 8px 0 16px;
    }

    .rf-search {
        width: 100%;
        border: 1px solid #cbd5e1;
        border-radius: 13px;
        padding: 13px 15px;
        outline: none;
    }

    .rf-search:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, .12);
    }

    .rf-section {
        background: #fff;
        border: 1px solid #dbe5f1;
        border-radius: 22px;
        padding: 18px;
        margin-bottom: 16px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, .04);
    }

    .rf-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 12px;
    }

    .rf-card {
        border: 1px solid #dbe5f1;
        background: #fff;
        border-radius: 16px;
        padding: 15px;
        text-align: left;
        min-height: 110px;
        cursor: pointer;
        transition: .18s ease;
    }

    .rf-card:hover {
        border-color: #2563eb;
        box-shadow: 0 10px 25px rgba(37, 99, 235, .1);
        transform: translateY(-2px);
    }

    .rf-name {
        font-size: 16px;
        font-weight: 950;
        color: #020617;
    }

    .rf-meta {
        font-size: 12px;
        color: #526783;
        margin-top: 6px;
        line-height: 1.45;
    }

    .rf-free {
        color: #059669;
        font-weight: 900;
        margin-top: 10px;
    }

    .rf-full {
        color: #991b1b;
        font-weight: 900;
        margin-top: 10px;
    }

    .rf-active {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
    }

    .rf-active-card {
        border: 1px solid #dbe5f1;
        border-radius: 16px;
        padding: 14px;
        background: #f8fbff;
    }

    .rf-btn {
        border: 0;
        background: #2563eb;
        color: #fff;
        border-radius: 12px;
        padding: 11px 16px;
        font-weight: 900;
        text-decoration: none;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        transition: .18s ease;
    }

    .rf-btn:hover {
        background: #1d4ed8;
        color: #fff;
        text-decoration: none;
    }

    .rf-btn:disabled {
        opacity: .55;
        cursor: not-allowed;
    }

    .rf-btn.danger {
        background: #dc2626;
    }

    .rf-btn.danger:hover {
        background: #b91c1c;
    }

    .rf-modal-backdrop {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, .55);
        z-index: 9998;
    }

    .rf-modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: min(620px, calc(100% - 28px));
        max-height: 92vh;
        overflow: auto;
        background: #fff;
        border-radius: 24px;
        padding: 24px;
        z-index: 9999;
        box-shadow: 0 25px 80px rgba(15, 23, 42, .25);
    }

    .rf-close {
        position: absolute;
        right: 18px;
        top: 18px;
        width: 36px;
        height: 36px;
        border-radius: 12px;
        border: 1px solid #cbd5e1;
        background: #fff;
        font-size: 22px;
        line-height: 1;
    }

    .rf-slot-grid,
    .rf-billing-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .rf-billing-grid {
        grid-template-columns: 1fr 1fr;
    }

    .rf-option {
        border: 1px solid #dbe5f1;
        border-radius: 14px;
        padding: 13px;
        cursor: pointer;
        transition: .18s ease;
    }

    .rf-option.selected {
        border-color: #2563eb;
        background: #eff6ff;
    }

    .rf-option.disabled {
        opacity: .55;
        cursor: not-allowed;
        background: #f8fafc;
    }

    .rf-option strong,
    .rf-option small {
        display: block;
    }

    .rf-option small {
        color: #526783;
        margin-top: 4px;
    }

    .rf-perks {
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        color: #1e3a8a;
        border-radius: 14px;
        padding: 14px;
        margin: 14px 0;
    }

    .rf-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f8fafc;
        border: 1px solid #dbe5f1;
        border-radius: 14px;
        padding: 16px;
        margin: 14px 0;
        font-size: 16px;
    }

    .rf-total strong {
        font-size: 23px;
    }

    .rf-alert {
        border-radius: 14px;
        padding: 12px 14px;
        margin-bottom: 14px;
        font-weight: 800;
    }

    .rf-alert.success {
        background: #dcfce7;
        color: #166534;
    }

    .rf-alert.error {
        background: #fee2e2;
        color: #991b1b;
    }

    @media(max-width: 1100px) {
        .rf-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .rf-active {
            grid-template-columns: 1fr;
        }

        .rf-slot-grid {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width: 640px) {
        .rf-grid,
        .rf-billing-grid {
            grid-template-columns: 1fr;
        }

        .rf-title {
            font-size: 24px;
        }
    }
</style>

<div class="rf-page">
    @if(session('success'))
        <div class="rf-alert success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="rf-alert error">{{ session('error') }}</div>
    @endif

    <div class="rf-hero">
        <h1 class="rf-title">Reserve sponsored route slots</h1>
        <p class="rf-sub">
            Each state route has 3 sponsored slots. Florida → New York and New York → Florida are separate routes.
        </p>

        <form method="GET">
            <input
                class="rf-search"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="Search route like Florida to New York..."
            >
        </form>
    </div>

    @if($subscriptions->count())
        <div class="rf-section">
            <h3 style="margin:0 0 12px;font-weight:950">Your active route slots</h3>

            <div class="rf-active">
                @foreach($subscriptions as $subscription)
                    <div class="rf-active-card">
                        <strong>{{ $subscription->routeName() }}</strong>

                        <div class="rf-meta">
                            Slot {{ optional($subscription->slot)->slot_number }}
                            · {{ ucfirst($subscription->billing_cycle) }}
                            · ${{ number_format($subscription->price_cents / 100, 2) }}
                        </div>

                        <div class="rf-meta">
                            Ends: {{ optional($subscription->ends_at)->format('M d, Y') ?? '-' }}
                        </div>

                        @if($subscription->cancel_at_period_end)
                            <div class="rf-full">Cancellation scheduled</div>
                        @else
                            <form
                                method="POST"
                                action="{{ route('company.route-featured-ads.cancel', $subscription->id) }}"
                                style="margin-top:10px"
                                onsubmit="return confirm('Cancel this route slot at period end?')"
                            >
                                @csrf
                                <button class="rf-btn danger" type="submit">Cancel</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="rf-section">
        <div class="rf-grid">
            @foreach($routes as $route)
                @php
                    $slots = collect($route->featuredSlots ?? []);

                    $free = $slots->filter(function ($slot) {
                        return method_exists($slot, 'isAvailable') ? $slot->isAvailable() : false;
                    })->count();

                    $lowest = $slots->where('is_active', true)->min('monthly_price_cents');
                @endphp

                <button type="button" class="rf-card" data-route-id="{{ $route->id }}">
                    <div class="rf-name">{{ $route->name }}</div>

                    <div class="rf-meta">
                        {{ $route->abv ?? '' }}
                        @if($lowest)
                            · ${{ number_format($lowest / 100, 0) }}/mo
                        @endif
                    </div>

                    @if($free > 0)
                        <div class="rf-free">{{ $free }} of 3 available</div>
                    @else
                        <div class="rf-full">Unavailable</div>
                    @endif
                </button>
            @endforeach
        </div>

        <div style="margin-top:16px">
            {{ $routes->links() }}
        </div>
    </div>
</div>

<div class="rf-modal-backdrop" id="routeModalBackdrop"></div>

<div class="rf-modal" id="routeModal">
    <button type="button" class="rf-close" id="routeModalClose">×</button>

    <h2 id="modalTitle" style="margin:0;font-weight:950"></h2>
    <p class="rf-meta" style="margin-bottom:18px">
        Route featured slot · “Sponsored” labeled
    </p>

    <form method="POST" action="{{ route('company.route-featured-ads.checkout') }}" id="routeCheckoutForm">
        @csrf

        <input type="hidden" name="slot_id" id="selectedSlotId">
        <input type="hidden" name="billing_cycle" id="selectedBillingCycle" value="monthly">

        <div style="font-weight:900;margin-bottom:8px">Choose your slot</div>
        <div class="rf-slot-grid" id="slotGrid"></div>

        <div style="font-weight:900;margin:18px 0 8px">Billing cycle</div>

        <div class="rf-billing-grid">
            <div class="rf-option selected" data-billing="monthly">
                <strong>Monthly</strong>
                <small id="monthlyLabel"></small>
            </div>

            <div class="rf-option" data-billing="yearly">
                <strong>Yearly</strong>
                <small id="yearlyLabel"></small>
            </div>
        </div>

        <div class="rf-perks" id="perksBox"></div>

        <div class="rf-total">
            <span>Total</span>
            <strong id="totalLabel">$0.00/mo</strong>
        </div>

        <button class="rf-btn" type="submit" style="width:100%" id="reserveBtn">
            Reserve & continue
        </button>

        <div class="rf-meta" style="text-align:center;margin-top:12px">
            Verified movers only
        </div>
    </form>
</div>

<script>
    window.routePayloads = @json($routePayloads);

    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('routeModal');
        const backdrop = document.getElementById('routeModalBackdrop');
        const closeBtn = document.getElementById('routeModalClose');
        const slotGrid = document.getElementById('slotGrid');
        const selectedSlotId = document.getElementById('selectedSlotId');
        const billingInput = document.getElementById('selectedBillingCycle');
        const totalLabel = document.getElementById('totalLabel');
        const perksBox = document.getElementById('perksBox');
        const monthlyLabel = document.getElementById('monthlyLabel');
        const yearlyLabel = document.getElementById('yearlyLabel');
        const reserveBtn = document.getElementById('reserveBtn');

        let currentRoute = null;
        let currentSlot = null;
        let billing = 'monthly';

        const money = function (amount) {
            return '$' + Number(amount || 0).toFixed(2);
        };

        const escapeHtml = function (value) {
            return String(value ?? '')
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;')
                .replaceAll("'", '&#039;');
        };

        const openModal = function (route) {
            currentRoute = route;
            currentSlot = route.slots.find(function (slot) {
                return slot.available;
            }) || null;

            billing = 'monthly';

            document.getElementById('modalTitle').textContent = route.name;

            renderSlots();
            renderBilling();
            updateTotal();

            modal.style.display = 'block';
            backdrop.style.display = 'block';
        };

        const closeModal = function () {
            modal.style.display = 'none';
            backdrop.style.display = 'none';
        };

        function renderSlots() {
            slotGrid.innerHTML = '';

            if (!currentRoute || !currentRoute.slots.length) {
                slotGrid.innerHTML = '<div class="rf-option disabled">No slots found</div>';
                return;
            }

            currentRoute.slots.forEach(function (slot) {
                const div = document.createElement('div');

                div.className =
                    'rf-option ' +
                    (currentSlot && currentSlot.id === slot.id ? 'selected ' : '') +
                    (!slot.available ? 'disabled' : '');

                let html = '';
                html += '<strong>' + escapeHtml(slot.label) + '</strong>';
                html += '<small>' + (slot.available ? 'Available' : 'Unavailable') + '</small>';
                html += '<small>' + money(slot.monthly) + '/mo</small>';

                if (slot.taken_by) {
                    html += '<small>Taken by: ' + escapeHtml(slot.taken_by) + '</small>';
                }

                div.innerHTML = html;

                if (slot.available) {
                    div.addEventListener('click', function () {
                        currentSlot = slot;
                        renderSlots();
                        renderBilling();
                        updateTotal();
                    });
                }

                slotGrid.appendChild(div);
            });
        }

        function renderBilling() {
            document.querySelectorAll('[data-billing]').forEach(function (el) {
                el.classList.toggle('selected', el.dataset.billing === billing);
            });

            if (!currentSlot) {
                monthlyLabel.textContent = '';
                yearlyLabel.textContent = '';
                return;
            }

            monthlyLabel.textContent = money(currentSlot.monthly) + '/mo';

            yearlyLabel.textContent =
                money(currentSlot.yearly) +
                '/yr' +
                (currentSlot.discount ? ' · ' + currentSlot.discount + '% off' : '');
        }

        function updateTotal() {
            if (!currentSlot || !currentSlot.available) {
                selectedSlotId.value = '';
                totalLabel.textContent = 'Unavailable';
                reserveBtn.disabled = true;
                perksBox.innerHTML = 'No slot is currently available for this route.';
                return;
            }

            selectedSlotId.value = currentSlot.id;
            billingInput.value = billing;
            reserveBtn.disabled = false;

            totalLabel.textContent = billing === 'yearly'
                ? money(currentSlot.yearly) + '/yr'
                : money(currentSlot.monthly) + '/mo';

            if (currentSlot.perks && currentSlot.perks.length) {
                perksBox.innerHTML =
                    '<ul style="margin:0;padding-left:18px"><li>' +
                    currentSlot.perks.map(escapeHtml).join('</li><li>') +
                    '</li></ul>';
            } else {
                perksBox.textContent = 'Sponsored route placement';
            }
        }

        document.querySelectorAll('[data-route-id]').forEach(function (card) {
            card.addEventListener('click', function () {
                const route = window.routePayloads.find(function (item) {
                    return String(item.id) === String(card.dataset.routeId);
                });

                if (route) {
                    openModal(route);
                }
            });
        });

        document.querySelectorAll('[data-billing]').forEach(function (el) {
            el.addEventListener('click', function () {
                billing = el.dataset.billing;
                renderBilling();
                updateTotal();
            });
        });

        closeBtn.addEventListener('click', closeModal);
        backdrop.addEventListener('click', closeModal);
    });
</script>
@endsection