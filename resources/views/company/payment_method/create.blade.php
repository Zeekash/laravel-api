@extends('company.layouts.master')
@section('title', 'Company Payment Method Create')

@section('content')
<div class="container py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <a href="{{ route('company.payment-methods.index') }}" class="text-muted text-decoration-none small">
            <i class="fas fa-chevron-left me-1"></i> Back to Billing Details
        </a>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="row g-0">
                    
                    <div class="col-md-5 bg-light p-5 border-end d-none d-md-block">
                        <h3 class="fw-bold mb-3">Payment Method</h3>
                        <p class="text-muted mb-4">Add a new credit or debit card to your account for seamless subscription management.</p>
                        
                        <div class="d-flex gap-2 mb-4">
                            <i class="fa fa-cc-visa fa-2x mx-2 text-secondary"></i>
                            <i class="fa fa-cc-mastercard fa-2x text-secondary"></i>
                            <i class="fa fa-cc-amex fa-2x mx-2 text-secondary"></i>
                            <i class="fa fa-cc-discover fa-2x text-secondary"></i>
                        </div>

                        <div class="small text-muted">
                            <p><i class="fa fa-lock me-2"></i> Your card data is encrypted and processed securely by <strong>Stripe</strong>. We never store your full card details.</p>
                        </div>
                    </div>

                    <div class="col-md-7 p-5 bg-white">
                        <h4 class="fw-bold mb-4">Card Details</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger border-0 small">
                                <i class="fas fa-exclamation-circle me-2"></i> {{ $errors->first() }}
                            </div>
                        @endif

                        <form id="card-form" method="POST" action="{{ route('company.payment-methods.store') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="card-element" class="form-label small fw-bold text-uppercase tracking-wider">Credit or Debit Card</label>
                                <div id="card-element" class="form-control border-secondary-subtle py-3 shadow-sm">
                                    </div>
                                <div id="card-errors" role="alert" class="text-danger mt-2 small italic"></div>
                            </div>

                            <input type="hidden" name="payment_method_id" id="payment_method_id">

                            <button type="submit" id="submit-button" class="btn btn-dark btn-lg w-100 fw-bold shadow-sm py-3 mt-2">
                                <span id="button-text">Securely Save Card</span>
                                <div id="spinner" class="spinner-border spinner-border-sm text-light d-none" role="status"></div>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Professional Form Styling */
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25 mil rem rgba(13, 110, 253, 0.1);
    }
    .tracking-wider { letter-spacing: 0.05em; }
    #card-element { transition: border-color 0.15s ease-in-out; }
</style>

<script src="https://js.stripe.com/v3/"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const stripe = Stripe("{{ config('services.stripe.key') }}");
    const elements = stripe.elements();

    // Custom styling for the Stripe element to match Bootstrap
    const style = {
        base: {
            color: '#212529',
            fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': { color: '#adb5bd' }
        },
        invalid: {
            color: '#dc3545',
            iconColor: '#dc3545'
        }
    };

    const card = elements.create('card', { style: style, hidePostalCode: true });
    card.mount('#card-element');

    const form = document.getElementById('card-form');
    const submitBtn = document.getElementById('submit-button');
    const spinner = document.getElementById('spinner');
    const btnText = document.getElementById('button-text');

    form.addEventListener('submit', async function (event) {
        event.preventDefault();

        // Disable button and show spinner
        submitBtn.disabled = true;
        spinner.classList.remove('d-none');
        btnText.classList.add('d-none');

        const {setupIntent, error} = await stripe.confirmCardSetup(
            "{{ $clientSecret }}",
            { payment_method: { card: card } }
        );

        if (error) {
            // Re-enable button on error
            submitBtn.disabled = false;
            spinner.classList.add('d-none');
            btnText.classList.remove('d-none');

            const errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            document.getElementById('payment_method_id').value = setupIntent.payment_method;
            form.submit();
        }
    });
});
</script>
@endsection