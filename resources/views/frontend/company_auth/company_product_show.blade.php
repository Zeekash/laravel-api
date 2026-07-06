@extends('layouts.app')
@section('content')
    <style>
        .single-footer-widget .quick-links li {
            position: relative;
            padding: 10px 0px !important;
        }
    </style>
    <!-- Start Company Dashboard Area -->
    <section class="bg-of-aqua-shade  py-5">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3 w-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div id="company-dashboard-main" class="card row py-0 px-0">
                        <div class="row p-0 m-auto dash-height-row ">
                            @include('frontend.company_auth.compDashSidebar')
                            <div class="col-12 col-lg-9 col-xl-9 py-3 dash-col2">
                                <section class="section about-section p-0" id="about-dash">
                                    <div class="container px-0 ">
                                        <div class="row flex-row-reverse row-of-inner-dash">
                                           
                                            <div class="container mt-5">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-8">
                                            
                                                        <div class="card shadow rounded">
                                                            <div class="card-body text-center">
                                            
                                                                <h1 class="card-title mb-3">{{ $product->name }}</h1>
                                            
                                                                @if($product->description)
                                                                <p class="card-text text-muted ">{{ $product->description }}</p>
                                                                @endif
                                            
                                                                <h2 class="text-success mb-4 " style="font-weight: 800">${{ $product->price }}</h2>
                                            
                                                                <div class="mb-3">
                                                                    <label for="quantity" class="form-label">Quantity:</label>
                                                                    <input type="number" id="quantity" class="form-control w-25 mx-auto text-center" value="1" min="1">
                                                                </div>
                                            
                                                                <div id="paypal-button-container" class="my-4"></div>
                                            
                                                            </div>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://www.paypal.com/sdk/js?client-id=AeigB_PNxlBEUlGfsRZH_4z2pEOpHFkCBT2y3mkHOOs4i7TnBsC_w61-k4lI1CdnAN_HexcsTr51pj7P&currency=USD"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            paypal.Buttons({
                createOrder: function (data, actions) {
                    const qty = document.getElementById('quantity').value;
                    const total = ({{ $product->price }} * qty).toFixed(2);
    
                    return actions.order.create({
                        purchase_units: [{
                            amount: { value: total }
                        }]
                    });
                },
                onApprove: function (data, actions) {
                    return actions.order.capture().then(function (details) {
                        const qty = document.getElementById('quantity').value;
                        const total = ({{ $product->price }} * qty).toFixed(2);
    
                        fetch('{{ route('company.orders.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                company_id: '{{ $company->id }}',
                                product_id: '{{ $product->id }}',
                                quantity: qty,
                                total_amount: total,
                                payer_name: details.payer.name.given_name + ' ' + details.payer.name.surname,
                                payer_email: details.payer.email_address
                            })
                        })
                            .then(response => {
                                if (!response.ok) {
                                    if (response.status === 401) {
                                        alert('Please login first!');
                                        window.location.href = '{{ route('company.login') }}';
                                    } else {
                                        throw new Error('Order save failed!');
                                    }
                                }
                                return response.json();
                            })
                            .then(data => {
                                window.location.href = "{{ route('company.thank_you') }}";
                                alert('Order stored: ' + data.message);
                            })
                            .catch(err => {
                                alert('Order save failed!');
                                console.error(err);
                            });
                    });
                }
            }).render('#paypal-button-container');
        });
    </script>

@endsection
