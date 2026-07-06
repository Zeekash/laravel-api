@extends('company.layouts.master')
@section('title', 'Payment Methods')

@section('content')
<div class="container-fluid py-5 px-lg-5">

    <!-- ===== HEADER ===== -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="fw-bold gradient-text mb-1">Billing & Payment Methods</h2>
            <p class="text-muted mb-0">Manage your cards and billing preferences</p>
        </div>

        <a href="{{ route('company.payment-methods.create') }}"
           class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="fa fa-plus me-2"></i>Add Card
        </a>
    </div>

    <!-- ===== STATS ===== -->
    <div class="row g-3 mb-5">

        <div class="col-md-4">
            <div class="stat-card">
                <div>
                    <small>Total Cards</small>
                    <h4>{{ count($paymentMethods) }}</h4>
                </div>
                <i class="fa fa-credit-card"></i>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">
                <div>
                    <small>Default Card</small>
                    <h4>{{ $defaultPaymentMethod ? 'Active' : 'None' }}</h4>
                </div>
                <i class="fa fa-check-circle"></i>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">
                <div>
                    <small>Billing Status</small>
                    <h4 class="text-success">Healthy</h4>
                </div>
                <i class="fa fa-shield-alt"></i>
            </div>
        </div>

    </div>

    <!-- ===== CARDS ===== -->
    <div class="row g-4">
        @forelse($paymentMethods as $method)

        @php
            $brand = strtolower($method->card->brand);
            $icon = in_array($brand, ['visa','mastercard','amex','discover']) ? $brand : 'credit-card';
        @endphp

        <div class="col-xl-4 col-md-6">

            <div class="flip-card {{ $defaultPaymentMethod == $method->id ? 'is-default' : '' }}">
                <div class="flip-inner">

                    <!-- FRONT -->
                    <div class="flip-front">

                        <div class="card-top">
                            <i class="fa fa-cc-{{ $icon }}"></i>

                            @if ($defaultPaymentMethod == $method->id)
                                <span class="badge-modern">Default</span>
                            @endif
                        </div>

                        <div class="chip"></div>

                        <div class="card-number">
                            •••• •••• •••• {{ $method->card->last4 }}
                        </div>

                        <div class="card-footer">
                            <div>
                                <small>Expires</small>
                                <div>{{ sprintf('%02d',$method->card->exp_month) }}/{{ $method->card->exp_year }}</div>
                            </div>

                            <div class="text-end">
                                <small>Brand</small>
                                <div class="text-capitalize">{{ $method->card->brand }}</div>
                            </div>
                        </div>

                    </div>

                    <!-- BACK -->
                    <div class="flip-back">

                        <div class="text-center w-100">

                            <h6 class="mb-3">Manage Card</h6>

                            @if ($defaultPaymentMethod != $method->id)
                            <form method="POST" action="{{ route('company.payment-methods.default') }}">
                                @csrf
                                <input type="hidden" name="payment_method_id" value="{{ $method->id }}">
                                <button type="button" class="btn btn-light w-100 mb-2 btn-default-confirm">
                                    Set Default
                                </button>
                            </form>
                            @endif

                            @if ($defaultPaymentMethod != $method->id)
                            <form method="POST" action="{{ route('company.payment-methods.destroy',$method->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-outline-light w-100 btn-delete-confirm">
                                    Remove
                                </button>
                            </form>
                            @endif

                        </div>

                    </div>

                </div>
            </div>

        </div>

        @empty
        <div class="col-12 text-center">
            <div class="empty-state p-5">
                <i class="fa fa-credit-card fa-2x mb-3 text-muted"></i>
                <h5>No payment methods yet</h5>
                <p class="text-muted">Start by adding your first card</p>
                <a href="{{ route('company.payment-methods.create') }}" class="btn btn-primary mt-3">
                    Add Card
                </a>
            </div>
        </div>
        @endforelse
    </div>

</div>

<!-- ===== STYLE ===== -->
<style>

body {
    background: linear-gradient(135deg,#f6f8fb,#eef1f7);
}

/* TEXT */
.gradient-text {
    background: linear-gradient(90deg,#6366f1,#9333ea);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

/* STATS */
.stat-card {
    background:#fff;
    border-radius:18px;
    padding:20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
}

/* FLIP CARD */
.flip-card {
    perspective:1200px;
    height:210px;
}

.flip-inner {
    width:100%;
    height:100%;
    transition:0.7s;
    transform-style:preserve-3d;
    position:relative;
}

.flip-card:hover .flip-inner {
    transform: rotateY(180deg);
}

/* FRONT */
.flip-front {
    position:absolute;
    width:100%;
    height:100%;
    border-radius:18px;
    padding:20px;
    color:white;
    backface-visibility:hidden;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    background:linear-gradient(135deg,#1e1e2f,#2a2a40);
}

/* DEFAULT */
.flip-card.is-default .flip-front {
    background:linear-gradient(135deg,#6366f1,#9333ea);
}

/* BACK */
.flip-back {
    position:absolute;
    width:100%;
    height:100%;
    border-radius:18px;
    padding:20px;
    backface-visibility:hidden;
    transform:rotateY(180deg);
    background:linear-gradient(135deg,#0ea5e9,#6366f1);
    display:flex;
    align-items:center;
}

/* CHIP */
.chip {
    width:45px;
    height:30px;
    border-radius:6px;
    background:linear-gradient(135deg,#e5e7eb,#9ca3af);
}

/* CARD CONTENT */
.card-top {
    display:flex;
    justify-content:space-between;
}

.card-number {
    font-size:18px;
    letter-spacing:3px;
    text-align:center;
}

.card-footer {
    display:flex;
    justify-content:space-between;
}

.badge-modern {
    background:rgba(255,255,255,0.2);
    padding:4px 10px;
    border-radius:20px;
}

/* EMPTY */
.empty-state {
    background:white;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

</style>

<!-- ===== JS ===== -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.btn-default-confirm').forEach(btn => {
    btn.addEventListener('click', function() {
        Swal.fire({
            title:'Set as default?',
            icon:'question',
            showCancelButton:true
        }).then(res=>{
            if(res.isConfirmed) this.closest('form').submit();
        });
    });
});

document.querySelectorAll('.btn-delete-confirm').forEach(btn => {
    btn.addEventListener('click', function() {
        Swal.fire({
            title:'Remove card?',
            icon:'warning',
            showCancelButton:true
        }).then(res=>{
            if(res.isConfirmed) this.closest('form').submit();
        });
    });
});
</script>

@endsection