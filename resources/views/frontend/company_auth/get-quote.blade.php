@extends('layouts.app')
@section('content')
    <section class=" bg-of-aqua-shade">

        <div class="container mask | parent container-of-get-estimate">

            <h1 class="text-center py-4 my-0">MOVING ESTIMATED CALCULATION</h1>
            @foreach ($categories as $category)
                <div class="accordion | parent">
                    <button class="firstop default-btn w-100 d-flex justify-content-between align-items-center py-3 mb-3">
                        <!-- <span> {{ $category->id }}</span> -->
                        <span> {{ $category->name }}</span>
                        <i class="fa-solid | optionarrow fa-angle-down"></i>
                    </button>

                    @foreach ($category->subcategory as $sub_cat)
                        <div class="accordion | child bg-white">
                            <button
                                class="btn-toggle-show sdg w-100 d-flex justify-content-between align-items-center py-2 mb-2">
                                <!-- <span>{{ $sub_cat->id }}</span> -->
                                <span>{{ $sub_cat->name }}</span>
                                <i class="fa-solid  |  fa-plus"></i>
                            </button>

                            <div class="inner-content para-hide p-1">
                                <div class="container mt-4">
                                    <div class="row  w-100 d-flex justify-content-between  p-2">
                                        <div
                                            class="col-3 row-heading | itemsheading d-flex justify-content-center flex-column align-items-center align-items-md-start">
                                            <span>Items</span>
                                        </div>
                                        <div
                                            class="col-2 row-heading d-flex justify-content-center flex-column align-items-center">
                                            Quantity
                                        </div>
                                        <div
                                            class="col-2 row-heading d-flex justify-content-center flex-column  align-items-center">
                                            Cube Feet
                                        </div>
                                        <div
                                            class="col-2 row-heading d-flex justify-content-center flex-column  align-items-center">
                                            Output
                                        </div>
                                    </div>
                                    <form action="{{ route('company.get-quote.create') }}" method="POST">
                                        @foreach ($sub_cat->item as $key => $item)
                                            <div class="row mt-1 mb-3 w-100 d-flex justify-content-between  p-2">
                                                <div class="col-3 item-name">
                                                    {{ $item->name }}
                                                    @csrf
                                                </div>

                                                <div class="col-2 item-inp-field p-0">
                                                    <input type="text" value="0"
                                                        name="cart[{{ $item->id }}][quantity]" class="quantity w-100"
                                                        placeholder="0" />
                                                </div>
                                                <div class="col-2 item-inp-field p-0">
                                                    <input type="text" name="cart[{{ $item->id }}][cubic_feet]"
                                                        class="cubic_feet w-100" value="{{ $item->cubic_feet }}" multiple />
                                                </div>
                                                <div class="col-2 item-inp-field p-0">
                                                    <input type="number" value="0"
                                                        name="cart[{{ $item->id }}][result]" class="myprice w-100" />
                                                </div>

                                            </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="accordion | lastsec">
                <div
                    class="row row-of-result-items d-flex justify-content-between flex-md-row align-items-center w-100 m-0 row-heading py-2 px-4">
                    <div class="col-8">
                        <div class="row d-flex justify-content-between flex-md-row align-items-center">
                            <div class="col-12 col-md-6  d-flex justify-content-md-start align-items-center form-item total p-0"
                                style="color:#fff ;">
                                Total :
                                <span style="color:#fff ;" class="ms-2" id="total_value">0</span>
                                <input id="value_total" type="hidden" name="total" value="1">
                            </div>

                            <div class="col-12 col-md-6 d-flex justify-content-md-center justify-content-start align-items-center form-item total p-0"
                                style="color:#fff ;">
                                Weight :
                                <span style="color:#fff ;" class="ms-2" id="total_weight">0</span>
                                <input id="weight_value" type="hidden" name="weight" value="1">
                            </div>
                        </div>

                    </div>
                    <div class=" col-4 col-md-4 | tbtn  total d-flex justify-content-end  align-items-center p-0">
                        <div class="banner-btn ">
                            <button id="print" class="noPrint  btn sdg m-0 py-2 px-3">
                                Print Me
                            </button>
                        </div>

                    </div>
                </div>
                <div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center p-md-5 p-0 ">
                <div class="contact-box p-md-5 py-sm-5 px-3 bg-white get-estimate-form  my-3">
                    <div
                        class="contact-form-wrapper d-flex justify-content-center align-items-center flex-column px-3 px-md-0">
                        <div class="form-item">
                            <h2 class="my-3">
                                SEND YOUR LIST FOR ESTIMATE
                                </h3>
                        </div>
                        <div class="form-item">
                            <p class="small-para mb-3">
                                Use form below to send us your list for moving estimate. <br> If you need assistance, please
                                call us at <span style="color:#FD917E ;">(123) 123-1234 </span>
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-item w-100">
                                    <div class="input-group my-2 w-100">
                                        <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                            name="full_name" aria-label="Sizing example input" required placeholder="Name"
                                            value="{{ old('full_name') }}" aria-describedby="inputGroup-sizing-default">
                                        @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-item w-100">
                                    <div class="input-group my-2 w-100">
                                        <input type="text" class="form-control  @error('phone_no') is-invalid @enderror"
                                            name="phone_no" aria-label="Sizing example input" required
                                            placeholder="Phone No." value="{{ old('phone_no') }}"
                                            aria-describedby="inputGroup-sizing-default">
                                        @error('phone_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row w-100 px-0">
                            <div class="col-12 px-0">
                                <div class="form-item w-100">
                                    <div class="input-group my-2 w-100">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" aria-label="Sizing example input" required placeholder="Email"
                                            value="{{ old('email') }}" aria-describedby="inputGroup-sizing-default">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-item w-100">
                                    <div class="input-group my-2 w-100">
                                        <input type="text"
                                            class="form-control @error('moving_from') is-invalid @enderror"
                                            name="moving_from" aria-label="Sizing example input" required
                                            placeholder="Moving From" value="{{ old('moving_from') }}"
                                            aria-describedby="inputGroup-sizing-default">
                                        @error('moving_from')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-item w-100">
                                    <div class="input-group my-2 w-100">
                                        <input type="text"
                                            class="form-control @error('moving_to') is-invalid @enderror" name="moving_to"
                                            aria-label="Sizing example input" required placeholder="Moving To"
                                            value="{{ old('moving_to') }}" aria-describedby="inputGroup-sizing-default">
                                        @error('moving_to')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-item w-100">

                            <div class="input-group my-2">
                                <textarea required rows="5" name="other_info" class="input"></textarea>
                                <label class="user-label">Other information</label>
                            </div>
                        </div>

                        <button type="submit" class="btn default-btn mt-3">SUBMIT</button>
                        <div class="form-item">
                            <p style="color:grey ; margin-top: 15px;">We do not share your information.</p>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/cal.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js"></script>
    <script>
        $("#phone_no").mask("+1-999-999-9999");
        $("#phone_no").on("focus click", function(e) {
            setTimeout(function() {
                e.target.setSelectionRange(3, 3);
            }, 1)
        });
        $("#phone_no").on("blur", function() {
            var last = $(this).val().substr($(this).val().indexOf("-") + 1);
            if (last.length == 3) {
                var move = $(this).val().substr($(this).val().indexOf("-") - 1, 1);
                var lastfour = move + last;
                var first = $(this).val().substr(0, 9);
                $(this).val(first + '-' + lastfour);
            }
        });
    </script>
@endsection
