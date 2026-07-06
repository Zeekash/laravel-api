@extends('company.layouts.master')

@section('content')
@php
    $resourcePayload = $resources->getCollection()->map(function ($resource) {
        $slots = $resource->featuredSlots;
        return [
            'id' => $resource->id,
            'name' => $resource->title,
            'free' => $slots->filter(fn ($slot) => $slot->isAvailable())->count(),
            'lowest' => $slots->where('is_active', true)->min('monthly_price_cents'),
            'slots' => $slots->map(function ($slot) {
                return [
                    'id' => $slot->id,
                    'slot_number' => $slot->slot_number,
                    'label' => $slot->label ?: ('Slot '.$slot->slot_number),
                    'available' => $slot->isAvailable(),
                    'monthly' => number_format(($slot->monthly_price_cents ?? 0) / 100, 2, '.', ''),
                    'yearly' => number_format(($slot->yearly_price_cents ?? 0) / 100, 2, '.', ''),
                    'discount' => $slot->yearly_discount_percent ?? 0,
                    'perks' => $slot->perks ?? [],
                    'taken_by' => optional(optional($slot->activeSubscription)->company)->company_name
                        ?? optional(optional($slot->activeSubscription)->company)->name,
                ];
            })->values()->toArray(),
        ];
    })->values()->toArray();
@endphp

<style>
    .resource-ad-page{background:#f6f8fc;border-radius:24px;padding:24px;color:#111827}.resource-ad-hero{background:#fff;border:1px solid #e5e7eb;border-radius:24px;padding:24px;box-shadow:0 18px 45px rgba(15,23,42,.08);margin-bottom:18px}.resource-ad-kicker{font-size:13px;font-weight:800;color:#2563eb;margin-bottom:8px}.resource-ad-title{font-size:30px;line-height:1.1;margin:0;font-weight:900;color:#0f172a}.resource-ad-sub{color:#64748b;margin:10px 0 0}.resource-ad-search{width:100%;border:1px solid #cbd5e1;border-radius:14px;padding:14px 16px;margin-top:18px;outline:none}.resource-ad-search:focus{border-color:#2563eb;box-shadow:0 0 0 4px rgba(37,99,235,.12)}.resource-ad-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:14px}.resource-ad-card{border:1px solid #dbe3ef;background:#fff;border-radius:16px;padding:17px;text-align:left;cursor:pointer;transition:.18s ease;min-height:112px}.resource-ad-card:hover{transform:translateY(-2px);box-shadow:0 16px 35px rgba(15,23,42,.08);border-color:#2563eb}.resource-ad-card.full{opacity:.68}.resource-name{font-size:17px;font-weight:900;color:#0f172a}.resource-meta{font-size:13px;color:#475569;margin-top:6px}.resource-free{font-size:13px;font-weight:900;color:#0f766e;margin-top:12px}.resource-full{font-size:13px;font-weight:900;color:#991b1b;margin-top:12px}.resource-sub-card{background:#fff;border:1px solid #e5e7eb;border-radius:18px;padding:16px;margin-bottom:18px}.sub-list{display:flex;gap:10px;flex-wrap:wrap}.sub-item{border:1px solid #e5e7eb;border-radius:14px;padding:12px;background:#f8fafc;min-width:250px}.sub-title{font-weight:900}.sub-meta{font-size:12px;color:#64748b;margin-top:4px}.sub-cancel{border:0;background:#ef4444;color:#fff;border-radius:10px;padding:8px 12px;font-weight:800;margin-top:10px}.modal-overlay{position:fixed;inset:0;background:rgba(15,23,42,.55);display:none;align-items:center;justify-content:center;padding:18px;z-index:9999}.modal-overlay.show{display:flex}.resource-modal{width:min(680px,100%);background:#fff;border-radius:24px;box-shadow:0 30px 80px rgba(15,23,42,.35);padding:24px;max-height:92vh;overflow:auto}.modal-head{display:flex;justify-content:space-between;gap:16px}.modal-title{font-size:27px;font-weight:950;margin:0;color:#0f172a}.modal-sub{color:#64748b;margin-top:5px}.modal-close{width:42px;height:42px;border-radius:14px;border:1px solid #cbd5e1;background:#fff;font-size:24px;line-height:1}.section-label{font-size:13px;font-weight:900;color:#0f172a;margin:20px 0 10px}.slot-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:12px}.slot-option{border:1px solid #dbe3ef;border-radius:16px;padding:15px;cursor:pointer;background:#fff;min-height:120px;position:relative}.slot-option.selected{border-color:#2563eb;box-shadow:0 0 0 3px rgba(37,99,235,.12);background:#eff6ff}.slot-option.unavailable{opacity:.5;cursor:not-allowed;background:#f8fafc}.slot-label{font-size:13px;font-weight:900;color:#475569;text-transform:uppercase}.slot-status{font-size:18px;font-weight:950;margin-top:12px;color:#0f172a}.slot-price{font-size:14px;color:#475569;margin-top:6px}.slot-taken{font-size:12px;color:#64748b;margin-top:8px}.billing-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}.billing-option{border:1px solid #dbe3ef;border-radius:16px;padding:16px;display:flex;align-items:center;gap:10px;cursor:pointer;font-weight:900}.billing-option.selected{border-color:#2563eb;background:#eff6ff}.perks-box{border:1px solid #bfdbfe;background:#eff6ff;border-radius:16px;padding:14px;color:#1e3a8a;margin-top:16px}.total-box{background:#f8fafc;border:1px solid #e5e7eb;border-radius:16px;padding:18px;margin-top:16px;display:flex;justify-content:space-between;align-items:center}.total-box span{color:#475569}.total-box strong{font-size:27px;color:#0f172a}.reserve-btn{width:100%;border:0;background:#2563eb;color:#fff;border-radius:16px;padding:16px;font-weight:950;margin-top:14px}.reserve-btn:disabled{opacity:.5;cursor:not-allowed}.verified-note{text-align:center;color:#64748b;font-size:13px;margin-top:12px}.alert{padding:13px 15px;border-radius:14px;margin-bottom:14px;font-weight:800}.alert-success{background:#dcfce7;color:#166534}.alert-danger{background:#fee2e2;color:#991b1b}@media(max-width:1200px){.resource-ad-grid{grid-template-columns:repeat(3,1fr)}}@media(max-width:900px){.resource-ad-grid,.slot-grid{grid-template-columns:repeat(2,1fr)}}@media(max-width:640px){.resource-ad-page{padding:14px}.resource-ad-grid,.slot-grid,.billing-grid{grid-template-columns:1fr}.resource-ad-title{font-size:24px}}
</style>

<div class="resource-ad-page">
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

    <div class="resource-ad-hero">
        <div class="resource-ad-kicker">Featured ads · Resources</div>
        <h1 class="resource-ad-title">Reserve sponsored resource slots</h1>
        <p class="resource-ad-sub">Each resource has 3 sponsored slots. Available slots can be reserved monthly or yearly using your default card.</p>

        <form method="GET">
            <input class="resource-ad-search" name="search" value="{{ $search }}" placeholder="Search available resources...">
        </form>
    </div>

    @if($subscriptions->count())
        <div class="resource-sub-card">
            <strong>Your active resource sponsored slots</strong>
            <div class="sub-list" style="margin-top:12px">
                @foreach($subscriptions as $subscription)
                    <div class="sub-item">
                        <div class="sub-title">
                            {{ $subscription->resourcePage->title ?? 'Resource' }}
                            · Slot {{ $subscription->slot->slot_number ?? '-' }}
                        </div>
                        <div class="sub-meta">
                            ${{ number_format(($subscription->price_cents ?? 0) / 100, 2) }} / {{ $subscription->billing_cycle }}<br>
                            Ends: {{ optional($subscription->ends_at)->format('M d, Y') ?? '-' }}
                            @if($subscription->cancel_at_period_end)
                                <br><strong>Cancellation scheduled</strong>
                            @endif
                        </div>
                        @if(! $subscription->cancel_at_period_end)
                            <form method="POST" action="{{ route('company.resource-featured-ads.cancel', $subscription->id) }}" onsubmit="return confirm('Cancel this subscription at period end?')">
                                @csrf
                                <button class="sub-cancel" type="submit">Cancel</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="resource-ad-grid">
        @foreach($resources as $resource)
            @php
                $free = $resource->featuredSlots->filter(fn ($slot) => $slot->isAvailable())->count();
                $lowest = $resource->featuredSlots->where('is_active', true)->min('monthly_price_cents');
            @endphp
            <button type="button" class="resource-ad-card {{ $free == 0 ? 'full' : '' }}" data-resource-id="{{ $resource->id }}">
                <div class="resource-name">{{ $resource->title }}</div>
                <div class="resource-meta">
                    Resource page ·
                    @if($lowest)
                        ${{ number_format($lowest / 100, 0) }}/mo
                    @else
                        Price not set
                    @endif
                </div>
                @if($free > 0)
                    <div class="resource-free">{{ $free }} of 3 free</div>
                @else
                    <div class="resource-full">0 of 3 — full</div>
                @endif
            </button>
        @endforeach
    </div>

    <div style="margin-top:18px">{{ $resources->links() }}</div>
</div>

<div class="modal-overlay" id="resourceModalOverlay">
    <div class="resource-modal">
        <div class="modal-head">
            <div>
                <h2 class="modal-title" id="modalResourceTitle">Resource</h2>
                <div class="modal-sub">Resource featured slot · “Sponsored” labeled</div>
            </div>
            <button class="modal-close" type="button" id="modalClose">×</button>
        </div>

        <form method="POST" action="{{ route('company.resource-featured-ads.checkout') }}" id="reserveForm">
            @csrf
            <input type="hidden" name="slot_id" id="selectedSlotId">
            <input type="hidden" name="billing_cycle" id="billingCycle" value="monthly">

            <div class="section-label">Choose your slot</div>
            <div class="slot-grid" id="slotGrid"></div>

            <div class="section-label">Billing cycle</div>
            <div class="billing-grid">
                <label class="billing-option selected" data-cycle="monthly">
                    <input type="radio" name="billing_radio" value="monthly" checked>
                    Monthly
                </label>
                <label class="billing-option" data-cycle="yearly">
                    <input type="radio" name="billing_radio" value="yearly">
                    <span id="yearlyLabel">Yearly</span>
                </label>
            </div>

            <div class="perks-box" id="perksBox"></div>

            <div class="total-box">
                <span>Total</span>
                <strong id="totalPrice">$0.00/mo</strong>
            </div>

            <button class="reserve-btn" type="submit" id="reserveBtn" disabled>Reserve & continue</button>
            <div class="verified-note">Verified movers only</div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const resources = @json($resourcePayload);
        const overlay = document.getElementById('resourceModalOverlay');
        const closeBtn = document.getElementById('modalClose');
        const title = document.getElementById('modalResourceTitle');
        const slotGrid = document.getElementById('slotGrid');
        const selectedSlotId = document.getElementById('selectedSlotId');
        const billingCycleInput = document.getElementById('billingCycle');
        const reserveBtn = document.getElementById('reserveBtn');
        const totalPrice = document.getElementById('totalPrice');
        const perksBox = document.getElementById('perksBox');
        const yearlyLabel = document.getElementById('yearlyLabel');
        let currentResource = null;
        let selectedSlot = null;
        let cycle = 'monthly';

        const money = (amount) => '$' + Number(amount || 0).toFixed(2);

        function renderTotal() {
            if (!selectedSlot) {
                totalPrice.textContent = '$0.00/mo';
                reserveBtn.disabled = true;
                return;
            }

            const amount = cycle === 'yearly' ? selectedSlot.yearly : selectedSlot.monthly;
            totalPrice.textContent = money(amount) + (cycle === 'yearly' ? '/yr' : '/mo');
            reserveBtn.disabled = !selectedSlot.available;

            const perks = selectedSlot.perks && selectedSlot.perks.length ? selectedSlot.perks : [
                'Sponsored label on resource page',
                'Higher visibility for verified movers',
                'Monthly performance exposure'
            ];
            perksBox.innerHTML = '<ul style="margin:0;padding-left:18px">' + perks.map(p => '<li>' + p + '</li>').join('') + '</ul>';
            yearlyLabel.textContent = 'Yearly' + (Number(selectedSlot.discount || 0) > 0 ? ' (' + selectedSlot.discount + '% off)' : '');
        }

        function selectSlot(slotId) {
            selectedSlot = currentResource.slots.find(s => String(s.id) === String(slotId));
            if (!selectedSlot || !selectedSlot.available) return;

            selectedSlotId.value = selectedSlot.id;
            document.querySelectorAll('.slot-option').forEach(el => el.classList.remove('selected'));
            const el = document.querySelector('.slot-option[data-slot-id="' + selectedSlot.id + '"]');
            if (el) el.classList.add('selected');
            renderTotal();
        }

        function openResource(resourceId) {
            currentResource = resources.find(c => String(c.id) === String(resourceId));
            if (!currentResource) return;

            selectedSlot = null;
            selectedSlotId.value = '';
            cycle = 'monthly';
            billingCycleInput.value = cycle;
            document.querySelectorAll('.billing-option').forEach(el => el.classList.remove('selected'));
            document.querySelector('.billing-option[data-cycle="monthly"]').classList.add('selected');
            document.querySelector('input[name="billing_radio"][value="monthly"]').checked = true;

            title.textContent = currentResource.name;
            slotGrid.innerHTML = currentResource.slots.map(slot => {
                const status = slot.available ? 'Available' : 'Unavailable';
                const unavailableClass = slot.available ? '' : ' unavailable';
                const taken = slot.taken_by ? '<div class="slot-taken">Taken by: ' + slot.taken_by + '</div>' : '';
                return '<div class="slot-option' + unavailableClass + '" data-slot-id="' + slot.id + '">' +
                    '<div class="slot-label">' + slot.label + '</div>' +
                    '<div class="slot-status">' + status + '</div>' +
                    '<div class="slot-price">$' + slot.monthly + '/mo</div>' +
                    taken +
                '</div>';
            }).join('');

            slotGrid.querySelectorAll('.slot-option').forEach(el => {
                el.addEventListener('click', () => selectSlot(el.dataset.slotId));
            });

            const firstAvailable = currentResource.slots.find(s => s.available);
            if (firstAvailable) {
                selectSlot(firstAvailable.id);
            } else {
                renderTotal();
            }

            overlay.classList.add('show');
        }

        document.querySelectorAll('[data-resource-id]').forEach(card => {
            card.addEventListener('click', () => openResource(card.dataset.resourceId));
        });

        document.querySelectorAll('.billing-option').forEach(option => {
            option.addEventListener('click', function () {
                cycle = this.dataset.cycle;
                billingCycleInput.value = cycle;
                document.querySelectorAll('.billing-option').forEach(el => el.classList.remove('selected'));
                this.classList.add('selected');
                this.querySelector('input').checked = true;
                renderTotal();
            });
        });

        closeBtn.addEventListener('click', () => overlay.classList.remove('show'));
        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) overlay.classList.remove('show');
        });
    });
</script>
@endsection
