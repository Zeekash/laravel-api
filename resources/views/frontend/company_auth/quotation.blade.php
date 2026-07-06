@extends('layouts.app')
@section('title', 'Get Accurate Moving Quotes - Free Moving Cost Estimator')
@section('meta_description',
    'Use our free moving cost estimator to get accurate quotes from trusted
    moving companies. Plan your move with ease and find the best deals.')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/quotation.css') }}">
    <div class="quote_form_banner">
        <div class="container mt-5">
            <!-- Your HTML form markup (example) -->
            <div class="col-lg-8 mx-auto">
                <h3 class="progress_head">Your Quote Request</h3>
                <div class="quotation-progress-container">
                    <div class="quotation-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    <span id="quotation-progressText" class="quotation-progress-text">0%</span>
                </div>
                <section class="section-quote w-100">
                    <div class="container px-0">
                        <div class="row section-quote">
                            <div class="col-md-10 mx-auto">
                                <div class="form_main_div">
                                    <form id="quotationForm" action="#" class="login-form" method="POST">
                                        <input type="hidden" name="referrer" value="{{ URL::current() }}">
                                        @csrf
                                        @include('backend.layouts.partials.messages')
                                        <!-- Step 1: Moving From -->
                                        <div class="quotation_step">
                                            <h2 class="form_labels">Where exactly are you <span>moving from</span>?</h2>
                                            <div class="mb-3">
                                                <input type="text" value="{{ old('zip_from') }}" id="zipfromsearch"
                                                    class="form-control @error('zip_from') is-invalid @enderror" required
                                                    name="zip_from" placeholder="Zip From">
                                                @error('zip_from')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Step 2: Moving To -->
                                        <div class="quotation_step">
                                            <h2 class="form_labels">Where exactly are you <span>moving To</span>?</h2>
                                            <div class="mb-3">
                                                <input type="text" value="{{ old('zip_to') }}" id="ziptosearch"
                                                    class="form-control @error('zip_to') is-invalid @enderror" required
                                                    name="zip_to" placeholder="Zip To">
                                                @error('zip_to')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Step 3: Distance & Moving Date -->
                                        <div class="quotation_step">
                                            <h2 class="form_labels">When are you moving?</h2>
                                            <div class="mb-3">
                                                <input type="text" id="distance" value="{{ old('distance') }}"
                                                    class="form-control d-none" name="distance">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" id="moveDate" value="{{ old('date') }}"
                                                    class="form-control bg-transparent @error('date') is-invalid @enderror"
                                                    required name="date" placeholder="Moving Date">
                                                @error('date')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Step 4: Move Size -->
                                        <div class="quotation_step">
                                            <h2 class="form_labels">What size is your current property?</h2>
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="move_size"
                                                                id="move_size7" value="Commercial Move"
                                                                {{ old('move_size') == 'Commercial Move' ? 'checked' : '' }}>
                                                            <label class="move_size_label" for="move_size7">Commercial
                                                                Move</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="move_size"
                                                                id="move_size5" value="Studio"
                                                                {{ old('move_size') == 'Studio' ? 'checked' : '' }}>
                                                            <label class="move_size_label"
                                                                for="move_size5">Studio/Apartment</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="move_size"
                                                                id="move_size6" value="Office Move"
                                                                {{ old('move_size') == 'Office Move' ? 'checked' : '' }}>
                                                            <label class="move_size_label" for="move_size6">Office
                                                                Move</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="move_size"
                                                                id="move_size4" value="1 Bedroom Home"
                                                                {{ old('move_size') == '1 Bedroom Home' ? 'checked' : '' }}>
                                                            <label class="move_size_label" for="move_size4">1 Bedroom
                                                                Home</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="move_size" id="move_size3" value="2 Bedroom Home"
                                                                {{ old('move_size') == '2 Bedroom Home' ? 'checked' : '' }}>
                                                            <label class="move_size_label" for="move_size3">2+ Bedrooms
                                                                Home</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="move_size" id="move_size2" value="3 Bedroom Home"
                                                                {{ old('move_size') == '3 Bedroom Home' ? 'checked' : '' }}>
                                                            <label class="move_size_label" for="move_size2">3+ Bedrooms
                                                                Home</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="move_size" id="move_size1" value="4 Bedroom Home"
                                                                {{ old('move_size') == '4 Bedroom Home' ? 'checked' : '' }}>
                                                            <label class="move_size_label" for="move_size1">4+ Bedrooms
                                                                Home</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="move_size" id="move_size8" value="5 Bedroom Home"
                                                                {{ old('move_size') == '5 Bedroom Home' ? 'checked' : '' }}>
                                                            <label class="move_size_label" for="move_size8">5+ Bedrooms
                                                                Home</label>
                                                        </div>
                                                    </div>
                                                    @error('move_size')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Step 5: Estimate Cost & Personal Details -->
                                        <div class="quotation_step">
                                            <h2 class="form_labels">Enter Your Personal Details</h2>
                                            <div class="mb-3">
                                                <input type="text" id="min_price" value="{{ old('min_price') }}"
                                                    class="form-control d-none" name="min_price">
                                                <input type="text" id="max_price" value="{{ old('max_price') }}"
                                                    class="form-control d-none" name="max_price">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" id="name" value="{{ old('name') }}"
                                                    class="form-control @error('name') is-invalid @enderror" required
                                                    name="name" placeholder="Your Name">
                                                @error('name')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input type="email" id="email" value="{{ old('email') }}"
                                                    class="form-control @error('email') is-invalid @enderror" required
                                                    name="email" placeholder="Your Email Address">
                                                @error('email')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" id="phone_no" value="{{ old('phone_no') }}"
                                                    class="form-control @error('phone_no') is-invalid @enderror" required
                                                    name="phone_no" placeholder="(123) 456 - 8901">
                                                @error('phone_no')
                                                    <span class="invalid-feedback" role="alert"><strong>Phone No. format
                                                            must be +1-xxx-xxx-xxxx</strong></span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                {!! NoCaptcha::display() !!}
                                            </div>
                                        </div>
                                        <!-- Navigation Buttons -->
                                        <div class="form-footer d-flex justify-content-center">
                                            <button type="button" class="sdg btn btn-secondary" id="prevBtn"
                                                onclick="nextPrev(-1)">Previous</button>
                                            <button type="button" class="sdg btn btn-primary" id="nextBtn"
                                                onclick="nextPrev(1)">Next</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="footer_wrapper">
            <img src="{{ asset('assets/img/footer_img_calculator_old.png') }}" class="footer_img img-fluid"
                alt="footer_bg">
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="quotation_main">
                    <div class="col-lg-11 mx-auto col-12 side_content mt-5 justify-content-center">
                        <h1>Instantly Get Your Free Moving Quote!</h1>
                        <p class="mt-3"><strong>You're Moving? Here's How to Get Your Free Moving Quote – and Avoid Any
                                Surprises!</strong>
                        </p>
                        <p>So, you've got a big move coming up. Maybe you're switching apartments across town or heading
                            halfway
                            across the country. But no matter how far you're going, one thing is for sure—</p>
                        <h2 class="mt-3">you want to know what it's going to cost, right?</h2>
                        <p>
                            And the cost of moving might surprise you more than you think! On average, a local move can run
                            anywhere from<strong>$300 to $1,500,</strong>while a cross-country move could set you back
                            between <strong>$2,000 and $5,000.</strong>
                        </p>
                    </div>
                    {{-- <div class="col-lg-5 d-flex align-items-center justify-content-center pt-4 "></div> --}}
                    <section class="table_section mt-4 mb-5">
                        <div class="row mt-sm-4 mt-3">
                            <div class="col-lg-11 mx-auto col-12 moving_quote_content">
                                {{-- <div class="row">
                            <div class="col-lg-6 col-12">
                                <h3 class="fs-5">Local moving cost:</h3>
                                <table class="table table-bordered border-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Size of Home </th>
                                            <th scope="col">Average Cost Range</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Studio/1-BR</td>
                                            <td>$200 - $600</td>
                                        </tr>
                                        <tr>
                                            <td>2-BR Apartment</td>
                                            <td>$400 - $800</td>
                                        </tr>
                                        <tr>
                                            <td>3-BR House</td>
                                            <td>$600 - $1,000</td>
                                        </tr>
                                        <tr>
                                            <td>4-BR House</td>
                                            <td>$800 - $1,500</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6 col-12">
                                <h3 class="fs-5">Long-Distance Moving Costs:</h3>
                                <table class="table table-bordered border-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Distance (Miles)</th>
                                            <th scope="col">Average Cost Range</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>100-500 </td>
                                            <td>$2,000 - $4,000</td>
                                        </tr>
                                        <tr>
                                            <td>500-1,000</td>
                                            <td>$3,500 - $7,000</td>
                                        </tr>
                                        <tr>
                                            <td>1,000-2,000</td>
                                            <td>$5,000 - $10,000</td>
                                        </tr>
                                        <tr>
                                            <td>2,000+</td>
                                            <td>$7,000 - $12,000+</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div> --}}
                                <p class="mb-2">
                                    And if you're moving internationally. Well, that can cost anywhere <strong>from $2,000
                                        to
                                        $10,000</strong> or
                                    more!
                                </p>
                                <p>Now, we know what you're thinking—"Great, but how can I know exactly how much my move
                                    will
                                    cost?"
                                </p>
                                <p>Well, use our free moving cost calculator above to estimate how much your move will cost.
                                </p>
                                <p>You see, moving costs can vary like crazy.</p>
                                <p>There are labor costs for the movers (yep, they charge by the hour), mileage fees for the
                                    truck,
                                    and even extra charges for things like specialty items.</p>
                                <p>But our moving cost calculator takes all of that into account.</p>
                                <p>It's fast, free, and gives you a clear estimate based on the specifics of your move.</p>
                                <p>So, instead of getting hit with random costs you weren't expecting, you'll know exactly
                                    what's
                                    involved.</p>
                                <p>And, if you need to cut costs, our calculator even gives you tips on how to do that.</p>
                                <p><strong>Note: We cover most U.S. zip codes for long-distance moves and all major cities
                                        for
                                        local
                                        moves. Plus, all the van lines in our network are registered with the Federal Motor
                                        Carrier
                                        Safety Administration (FMCSA), so you can trust that they operate legally. </strong>
                                </p>
                                <div class="col-12 my-3">
                                    <div class="new_card p-sm-4 p-2">
                                        <div class="card-body d-sm-flex align-items-center">
                                            <div class="content_div">
                                                <p>At My Moving Journey, we value your privacy and are committed to
                                                    protecting
                                                    the
                                                    personal information you provide while using our moving cost estimator.
                                                    Your
                                                    details are used solely to provide accurate moving quotes and connect
                                                    you
                                                    with
                                                    trusted moving professionals.
                                                    We employ industry-standard encryption and security measures to ensure
                                                    your
                                                    information remains safe. Rest assured, your privacy is important to us,
                                                    and
                                                    we
                                                    will never share or sell your personal information without your consent.
                                                    For more details, please refer to our <strong> <a
                                                            href="https://mymovingjourney.com/privacy-policy"
                                                            target="_blank" rel="noopener">Privacy Policy</a></strong>.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2>What's the average moving cost?</h2>
                                {{-- <table class="table table-bordered border-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Vehicle Type</th>
                                    <th scope="col">Average Cost Range</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Small Car</td>
                                    <td>$800 - $1,200</td>
                                </tr>
                                <tr>
                                    <td>Midsize Car </td>
                                    <td>$900 - $1,400</td>
                                </tr>
                                <tr>
                                    <td>Large Car/SUV</td>
                                    <td>$1,000 - $1,600</td>
                                </tr>
                                <tr>
                                    <td>Motorcycle</td>
                                    <td>$500 - $1,000</td>
                                </tr>
                                <tr>
                                    <td>Classic/Exotic</td>
                                    <td>$1,000 - $2,000+</td>
                                </tr>
                            </tbody>
                        </table> --}}
                                <p>
                                    Moving costs can vary a lot depending on a bunch of factors, but if you're wondering
                                    what
                                    the
                                    average moving cost is, here's a rough idea.
                                </p>
                                <p>
                                    For a <strong>local move</strong>(within the same city or region), you're probably
                                    looking
                                    at
                                    somewhere between
                                    <strong>$300 and $1,500</strong>—yeah, it's a bit of a range, but that's because it
                                    depends
                                    on
                                    how much stuff
                                    you're moving and how much help you need.
                                </p>
                                <p>
                                    If you're heading cross-country, though, the price tag jumps up a bit.<strong>$2,000 to
                                        $5,000</strong> is the ballpark for long-distance moves,
                                </p>
                                <p>
                                    And if you're planning an <strong>international move,</strong> you can expect the cost
                                    to be
                                    anywhere from <strong>$2,000 to $10,000</strong> or more.
                                </p>
                                <p>
                                    But those numbers can change depending on the season, how much you're moving, and any
                                    special
                                    services you need (like packing or moving fragile items).
                                </p>
                                <p>
                                    That's why our moving cost calculator is so handy—it gives you a more accurate estimate
                                    based on
                                    your exact situation, so you're not left guessing how much your move will cost.
                                </p>
                                <h2>Average Local Moving Cost</h2>
                                <p>
                                    If you're moving within the same city or maybe just across town—it sounds like a local
                                    move,
                                    right?
                                </p>
                                <p>While local moves tend to be less expensive than long-distance or international moves, a
                                    lot
                                    goes
                                    into it. </p>
                                <p>
                                    The <strong>average cost</strong> of a local move is between <strong>$300 and
                                        $1,500,</strong>
                                    but this depends heavily on factors
                                    like how many movers you need, the size of your home, and the amount of stuff you're
                                    moving.
                                </p>
                                <p>
                                    Here's a quick breakdown of what to expect for a <strong>local move:</strong>
                                </p>
                                <div class="table-responsive mt-2 w-100" style="font-family: var(--para-family);">
                                    <table class="table fw-semibold">
                                        <thead>
                                            <tr class="align-middle">
                                                <th style="background-color: #116087; color: white; width: 25%;"
                                                    scope="col">
                                                    Cost Type</th>
                                                <th style="background-color: #116087; color: white;" scope="col">
                                                    Average
                                                    Cost
                                                </th>
                                                <th style="background-color: #116087; color: white;" scope="col">
                                                    Description
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Hourly Labor Rate</td>
                                                <td>$100 - $200 per hour</td>
                                                <td>Most moving companies charge by the hour. The rate depends on the number
                                                    of
                                                    movers and the size of your move.</td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #11608714;">Truck Rental</td>
                                                <td style="background-color: #11608714;">$50 - $150 per hour or
                                                    a
                                                    flat
                                                    fee ($100-$500)</td>
                                                <td style="background-color: #11608714;">Charges depend on
                                                    truck
                                                    size,
                                                    duration of use, and distance within the city.</td>
                                            </tr>
                                            <tr>
                                                <td>Packing Services</td>
                                                <td>$100 - $500+</td>
                                                <td>Depending on how much you need to be packed, this could be extra,
                                                    including
                                                    packing materials and labor.</td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #11608714;">Additional Fees
                                                    (Stairs,
                                                    Elevators, etc.)</td>
                                                <td style="background-color: #11608714;">$50 - $150</td>
                                                <td style="background-color: #11608714;">Extra charges for
                                                    stairs,
                                                    long
                                                    carries, or elevators. Often added for moves in apartment buildings.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Insurance</td>
                                                <td>$50 - $200+</td>
                                                <td>If you opt for insurance, it can be added to the total cost based on the
                                                    value
                                                    of your belongings.</td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #11608714;">Fuel Charges</td>
                                                <td style="background-color: #11608714;">$25 - $100</td>
                                                <td style="background-color: #11608714;">Some movers may charge
                                                    for
                                                    fuel based on the distance driven during your move.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p><strong>Pro tip:</strong>It's always a good idea to get a free quote based on your
                                    specific
                                    needs
                                    to get a more accurate picture.</p>
                                {{-- <ol class="mb-0 average_listing">
                            <li>
                                <div class="listing ">
                                    <span class="listing_heading">Distance: </span>
                                    <span class="list_description">
                                        The distance between origin and destination is a primary factor in calculating
                                        moving costs. The farther you are moving, the higher the transportation costs.
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="listing">
                                    <span class="listing_heading">Volume of Move: </span>
                                    <span class="list_description">
                                        The amount of items you are moving plays a significant role. The
                                        more belongings you have, the more cost you will incur.
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="listing">
                                    <span class="listing_heading">Type of Move: </span>
                                    <span class="list_description">
                                        Local and long-distance moves have different cost structures. Local
                                        moves are often based on hourly rates, while long-distance moves are calculated
                                        based on
                                        distance.
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="listing">
                                    <span class="listing_heading">Additional Services: </span>
                                    <span class="list_description">
                                        If you require extra services like packing, unpacking, and
                                        disassembly/reassembly of furniture, they will add to the overall cost.
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="listing">
                                    <span class="listing_heading">Packing Materials: </span>
                                    <span class="list_description">
                                        The cost of packing materials such as boxes, tape, packing paper,
                                        and protective materials is also factored into the total cost.
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="listing">
                                    <span class="listing_heading">Timeline: </span>
                                    <span class="list_description">
                                        Moving costs vary depending on the time of year. Summer months are
                                        generally peak moving seasons and are more expensive due to higher demand.
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="listing">
                                    <span class="listing_heading">Insurance: </span>
                                    <span class="list_description">
                                        The type and amount of insurance you choose for your belongings can
                                        influence costs. The higher the insurance coverage you choose, the more moving cost
                                        you
                                        will get.
                                    </span>
                                </div>
                            </li>
                        </ol> --}}
                                <h2>Average Cross Country Moving Cost</h2>
                                <p>
                                    Cross-country moves are a bit of a different beast, with more factors to consider than a
                                    local
                                    move. That's why the price range is so broad.
                                </p>
                                <p>
                                    Whether you're moving from New York to California or from Texas to Washington,
                                    long-distance
                                    moves come with their own set of costs.
                                </p>
                                <p>
                                    Unlike local moves, where you pay by the hour, cross-country moves are usually priced
                                    based
                                    on
                                    <strong>distance, weight, and the type of services you need.</strong>
                                </p>
                                <p>
                                    On average, cross-country moves can range from <strong>$2,000 to $5,000</strong> or
                                    more.
                                </p>
                                <p>
                                    <strong>Here's the thing:</strong>the farther you go, the higher the costs can climb.
                                </p>
                                <div class="table-responsive mt-2 w-100" style="font-family: var(--para-family);">
                                    <table class="table fw-semibold">
                                        <thead>
                                            <tr class="align-middle">
                                                <th style="background-color: #116087; color: white; width: 25%;"
                                                    scope="col">
                                                    Mileage</th>
                                                <th style="background-color: #116087; color: white;" scope="col">
                                                    Studio/1
                                                    Bedroom</th>
                                                <th style="background-color: #116087; color: white;" scope="col">2-3
                                                    Bedrooms
                                                </th>
                                                <th style="background-color: #116087; color: white;" scope="col">4+
                                                    Bedrooms
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>250–500 miles</td>
                                                <td>$1,300 – $3,085</td>
                                                <td>$2,700 – $4,600</td>
                                                <td>$3,000 – $6,500</td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #11608714;">500–1,000 miles</td>
                                                <td style="background-color: #11608714;">$1,500 – $3,400</td>
                                                <td style="background-color: #11608714;">$2,900 – $5,100</td>
                                                <td style="background-color: #11608714;">$3,400 – $6,800</td>
                                            </tr>
                                            <tr>
                                                <td>1,000 miles</td>
                                                <td>$2,100 – $4,600</td>
                                                <td>$3,200 – $5,700</td>
                                                <td>$3,800 – $7,600</td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #11608714;">1,500 miles</td>
                                                <td style="background-color: #11608714;">$2,300 – $4,800</td>
                                                <td style="background-color: #11608714;">$3,400 – $5,900</td>
                                                <td style="background-color: #11608714;">$4,000 – $7,900</td>
                                            </tr>
                                            <tr>
                                                <td>2,000 miles</td>
                                                <td>$2,400 – $5,100</td>
                                                <td>$3,600 – $6,200</td>
                                                <td>$4,200 – $8,100</td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #11608714;">2,500+ miles</td>
                                                <td style="background-color: #11608714;">$2,400 – $5,000</td>
                                                <td style="background-color: #11608714;">$4,800 – $7,300</td>
                                                <td style="background-color: #11608714;">$6,200 – $11,300</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h2>Average International Moving Cost</h2>
                                <p>
                                    When it comes to international moves, we're talking a whole new ballgame. Unlike local
                                    or
                                    even
                                    cross-country moves, the cost of moving internationally depends on where you're headed,
                                    the
                                    amount of stuff you're bringing, and the services you choose.
                                </p>
                                <p>
                                    On average, international moves can range from <strong>$2,000 to $10,000 or
                                        more,</strong>but
                                    there's no one-size-fits-all price tag.
                                </p>
                                <p>
                                    Here's a rough breakdown based on some common destinations, distances, and the size of
                                    your
                                    home:
                                </p>
                                <div class="table-responsive mt-2 w-100" style="font-family: var(--para-family);">
                                    <table class="table fw-semibold">
                                        <thead>
                                            <tr class="align-middle">
                                                <th style="background-color: #116087; color: white; width: 25%;"
                                                    scope="col">
                                                    Region/Distance</th>
                                                <th style="background-color: #116087; color: white;" scope="col">
                                                    Studio/1
                                                    Bedroom</th>
                                                <th style="background-color: #116087; color: white;" scope="col">2-3
                                                    Bedrooms
                                                </th>
                                                <th style="background-color: #116087; color: white;" scope="col">4+
                                                    Bedrooms
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>To Canada (500-1,000 miles)</td>
                                                <td>$2,000 – $3,500</td>
                                                <td>$3,500 – $5,500</td>
                                                <td>$4,500 – $7,000</td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #11608714;">Europe (2,500–5,000
                                                    miles)
                                                </td>
                                                <td style="background-color: #11608714;">$3,000 – $5,000</td>
                                                <td style="background-color: #11608714;">$5,500 – $8,000</td>
                                                <td style="background-color: #11608714;">$7,000 – $10,000</td>
                                            </tr>
                                            <tr>
                                                <td>Asia (5,000–8,000 miles)</td>
                                                <td>$3,500 – $6,500</td>
                                                <td>$6,000 – $9,000</td>
                                                <td>$8,000 – $12,000</td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #11608714;">Australia (8,000+
                                                    miles)
                                                </td>
                                                <td style="background-color: #11608714;">$4,000 – $7,000</td>
                                                <td style="background-color: #11608714;">$6,500 – $10,000</td>
                                                <td style="background-color: #11608714;">$9,000 – $15,000</td>
                                            </tr>
                                            <tr>
                                                <td>South America (2,000–5,000 miles)</td>
                                                <td>$2,500 – $4,500</td>
                                                <td>$4,500 – $7,500</td>
                                                <td>$6,000 – $10,000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p>These costs include <strong>container shipping, insurance,</strong> and <strong>customs
                                        clearance.</strong> However, depending on
                                    the destination, additional fees may apply. </p>
                                <p>International moves are more complex, and each country has its own customs regulations,
                                    which
                                    can
                                    also affect the price.</p>
                                <p>Remember, these are rough estimates. Many variables, such as shipping methods (air vs.
                                    sea),
                                    port
                                    charges, and any additional services (packing, specialty items), can change the final
                                    cost.
                                </p>
                                <h2>Average Cost Of Moving Containers</h2>
                                <p>
                                    Moving containers has become a popular option for many people, especially those looking
                                    for
                                    flexibility in their move.
                                </p>
                                <p>
                                    They're convenient, often more affordable than hiring full-service movers, and allow you
                                    to
                                    pack
                                    and load at your own pace.
                                </p>
                                <p>
                                    The cost of renting a moving container typically depends on the size of the container,
                                    how
                                    long
                                    you need it, and the distance you're moving.
                                </p>
                                <p>
                                    On average, moving containers can cost anywhere from <strong>$100 to $2,500+</strong>
                                    depending
                                    on these factors.
                                </p>
                                <p>
                                    Here's a more detailed breakdown of what you can expect for container rentals:
                                </p>
                                <div class="table-responsive mt-2 w-100" style="font-family: var(--para-family);">
                                    <table class="table fw-semibold">
                                        <thead>
                                            <tr class="align-middle">
                                                <th style="background-color: #116087; color: white; width: 25%;"
                                                    scope="col">
                                                    Container Size</th>
                                                <th style="background-color: #116087; color: white;" scope="col">Rental
                                                    Cost
                                                    (per month)</th>
                                                <th style="background-color: #116087; color: white;" scope="col">
                                                    Shipping
                                                    Cost
                                                    (per mile)</th>
                                                <th style="background-color: #116087; color: white;" scope="col">
                                                    Estimated
                                                    Total Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>8-foot container</td>
                                                <td>$100 – $300</td>
                                                <td>$0.50 – $1.00</td>
                                                <td>$500 – $2,000</td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #11608714;">16-foot container</td>
                                                <td style="background-color: #11608714;">$150 – $400</td>
                                                <td style="background-color: #11608714;">$0.75 – $1.50</td>
                                                <td style="background-color: #11608714;">$800 – $2,500</td>
                                            </tr>
                                            <tr>
                                                <td>20-foot container</td>
                                                <td>$200 – $500</td>
                                                <td>$1.00 – $2.00</td>
                                                <td>$1,000 – $3,000</td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #11608714;">40-foot container</td>
                                                <td style="background-color: #11608714;">$300 – $600</td>
                                                <td style="background-color: #11608714;">$1.25 – $2.50</td>
                                                <td style="background-color: #11608714;">$1,500 – $4,500</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <p><strong>Container Size: </strong>The larger the container, the more it will cost. A small
                                    8-foot
                                    container is
                                    usually good for a studio or 1-bedroom apartment, while a 20-foot or 40-foot container
                                    is
                                    better
                                    for bigger homes or long-distance moves.</p>
                                <p><strong>Rental Cost:</strong>This is the fee for the container itself. The price
                                    usually depends on how long you need the container (renting for longer periods will
                                    increase
                                    the
                                    cost).</p>
                                <p><strong>Shipping Cost:</strong>Shipping Cost: This is how much it costs to transport the
                                    container
                                    from your old home to your new one. Rates vary based on distance, size, and whether
                                    you're
                                    moving locally or cross-country.</p>
                                <p><strong>Estimated Total Cost:</strong>This combines the rental and shipping costs
                                    for a rough total cost estimate. Again, the cost can fluctuate based on your specific
                                    move.
                                </p>
                                <h2>Average Car Shipping Cost</h2>
                                <p>Shipping your car across the country (or even internationally) is another consideration
                                    when
                                    you're moving. </p>
                                <p>The cost of shipping a car can vary depending on how far it's going, the method of
                                    transport,
                                    and
                                    the type of car you have. </p>
                                <p>On average, car shipping can range from <strong>$500 to $1,500</strong> for domestic
                                    moves,
                                    and
                                    for international shipping, the cost can go anywhere from<strong>$1,000 to
                                        $5,000+.</strong>
                                </p>
                                <div class="table-responsive mt-2 w-100" style="font-family: var(--para-family);">
                                    <table class="table fw-semibold">
                                        <thead>
                                            <tr class="align-middle">
                                                <th style="background-color: #116087; color: white; width: 20%;"
                                                    scope="col">
                                                    Shipping Method</th>
                                                <th style="background-color: #116087; color: white; width: 20%;"
                                                    scope="col">
                                                    Distance</th>
                                                <th style="background-color: #116087; color: white; width: 20%;"
                                                    scope="col">
                                                    Cost Range</th>
                                                <th style="background-color: #116087; color: white;" scope="col">
                                                    Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Open-Air Transport</strong></td>
                                                <td><strong>Up to 1,000 miles</strong></td>
                                                <td><strong>$500 – $1,000</strong></td>
                                                <td>The most common and affordable option. Your car is shipped on an open
                                                    trailer
                                                    (like a flatbed truck).</td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #11608714;"><strong>Open-Air
                                                        Transport</strong></td>
                                                <td style="background-color: #11608714;"><strong>1,000–2,000
                                                        miles</strong></td>
                                                <td style="background-color: #11608714;"><strong>$800 –
                                                        $1,200</strong>
                                                </td>
                                                <td style="background-color: #11608714;">A slightly higher cost
                                                    for
                                                    longer distances, but it is still budget-friendly.</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Enclosed Transport</strong></td>
                                                <td><strong>Up to 1,000 miles</strong></td>
                                                <td><strong>$800 – $1,200</strong></td>
                                                <td>A more secure method involves shipping your car in a fully enclosed
                                                    trailer,
                                                    which protects it from weather and road debris.</td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #11608714;"><strong>Enclosed
                                                        Transport</strong></td>
                                                <td style="background-color: #11608714;"><strong>1,000–2,000
                                                        miles</strong></td>
                                                <td style="background-color: #11608714;"><strong>$1,000 –
                                                        $2,000</strong></td>
                                                <td style="background-color: #11608714;">Ideal for luxury or
                                                    classic
                                                    cars where extra care is needed.</td>
                                            </tr>
                                            <tr>
                                                <td><strong>International Shipping</strong></td>
                                                <td><strong>2,000+ miles</strong></td>
                                                <td><strong>$1,000 – $5,000+</strong></td>
                                                <td>Depending on the destination (Europe, Asia, etc.), international
                                                    shipping
                                                    costs
                                                    vary greatly. Typically includes port fees, customs, and taxes.</td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #11608714;"><strong>Door-to-Door
                                                        Shipping</strong></td>
                                                <td style="background-color: #11608714;"><strong>Any
                                                        distance</strong>
                                                </td>
                                                <td style="background-color: #11608714;"><strong>$200 – $400
                                                        extra</strong></td>
                                                <td style="background-color: #11608714;">If you need the car
                                                    picked
                                                    up
                                                    and delivered directly to your home (instead of a terminal), expect to
                                                    pay a
                                                    premium for convenience.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p><strong>Key Factors Affecting Car Shipping Costs:</strong> </p>
                                <ul>
                                    <li><strong>Distance:</strong>The further the destination, the higher the cost.</li>
                                    <li><strong>Shipping Method:</strong>Open-air transport is cheaper than enclosed
                                        transport,
                                        but
                                        the latter is safer for high-value cars.</li>
                                    <li><strong>Vehicle Type:</strong>The larger and heavier the vehicle, the more it costs
                                        to
                                        ship
                                        (e.g., SUVs and trucks cost more than sedans).</li>
                                    <li><strong>Time of Year:</strong>Moving during peak season (summer, for example) can
                                        increase
                                        the price due to higher demand.</li>
                                    <li><strong>Condition of Vehicle: </strong>If the car is not running, additional charges
                                        may
                                        apply for special handling.</li>
                                </ul>
                                <div class="Moving_trust_box  mx-auto my-4">
                                    <p class="mb-3 MsoNormal mt-0" style="text-align: center;"><strong
                                            style="color: black;">Why
                                            You Can Trust My Moving Journey</strong></p>
                                    <div class="row gy-4">
                                        <div class="col-lg-6">
                                            <div class="feature-card">
                                                <div class="icon-wrapper"><img style="width: 60px;"
                                                        src="../../assets/img/location_truck.svg" alt="home_truck"></div>
                                                <div>
                                                    <p class="MsoNormal m-0"><strong>100+</strong></p>
                                                    <p class="MsoNormal mt-0">Moving companies listed across the USA</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="feature-card">
                                                <div class="icon-wrapper"><img style="width: 60px;"
                                                        src="../../assets/img/star.svg" alt="location_truck"></div>
                                                <div>
                                                    <p class="MsoNormal m-0"><strong>1,000+</strong></p>
                                                    <p class="MsoNormal mt-0">Customer Reviews to Guide Your Decision</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="feature-card">
                                                <div class="icon-wrapper"><img style="width: 60px;"
                                                        src="../../assets/img/tag.svg" alt="reliable moving services">
                                                </div>
                                                <div>
                                                    <p class="MsoNormal m-0"><strong>50+</strong></p>
                                                    <p class="MsoNormal mt-0">States served with reliable moving services
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="feature-card">
                                                <div class="icon-wrapper"><img style="width: 60px;"
                                                        src="../../assets/img/home_truck.svg" alt="Free moving quotes">
                                                </div>
                                                <div>
                                                    <p class="MsoNormal m-0"><strong>100%</strong></p>
                                                    <p class="MsoNormal mt-0">Free moving quotes provided instantly</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2>Major Factors That Will Affect Your Moving Cost</h2>
                                <p>You'd think it's just about the distance and the amount of stuff you've got, but there
                                    are
                                    actually quite a few factors that can affect how much you'll end up paying. </p>
                                <p>Here are the major factors that can impact your moving costs:</p>
                                <h3>Distance of the Move</h3>
                                <p>The farther you go, the more you're going to pay—pretty simple. A local move within the
                                    same
                                    city
                                    is going to be a lot cheaper than moving across the country or internationally. </p>
                                <p>Just make sure you're prepared for that extra fee when you're moving cross-country or
                                    overseas.
                                </p>
                                <h3>Size of Your Home and Amount of Belongings</h3>
                                <p>The bigger your home and the more stuff you have, the more it will cost to move.</p>
                                <p>Movers typically charge based on the size of your home (e.g., 1 bedroom, 2-3 bedrooms,
                                    etc.)
                                    or
                                    the weight of your belongings. </p>
                                <p>More stuff means more labor, more space in the truck, and more time spent packing and
                                    unloading.
                                </p>
                                <h3>Time of Year</h3>
                                <p>The time of year—you might not realize it, but it can greatly impact your moving costs.
                                </p>
                                <p>Moving companies are busier during peak times, such as summer, the end of the month, or
                                    around
                                    the holidays.</p>
                                <p>When demand is high, prices go up if you can, try to schedule your move during the
                                    off-season
                                    (like fall or winter) to save a little extra cash.</p>
                                <h3>Additional Services (Packing, Unpacking, Etc.)</h3>
                                <p>If you're looking for a full-service move, expect to pay more. </p>
                                <p>Packing and unpacking services, specialty item handling (like fragile or oversized
                                    items),
                                    and
                                    furniture disassembly can add up quickly. </p>
                                <p>While it's totally convenient, it's not free! </p>
                                <h3>Elevators, Stairs, and Long Carries</h3>
                                <p>Moving to the 10th floor of an apartment building without an elevator? </p>
                                <p>Or maybe your new place has a narrow staircase, making it tricky to get your furniture
                                    up?
                                </p>
                                <p>Moving companies may charge an additional fee for these situations since it takes longer
                                    and
                                    requires more effort.</p>
                                <h3>Storage Fees</h3>
                                <p>Sometimes, things don't go as planned. Maybe your new place isn't ready yet, or you just
                                    need
                                    a
                                    little more time to get everything settled. </p>
                                <p>If you need storage during your move, expect to pay extra. </p>
                                <h3>Insurance</h3>
                                <p>While not always necessary, insurance can give you peace of mind when moving your things.
                                    I
                                    If you have high-value items or fragile antiques or just want that extra protection,
                                    consider
                                    getting moving insurance. </p>
                                <h3>Access Issues</h3>
                                <p>Sometimes, the logistics of your location can affect your moving cost. </p>
                                <p>Is there limited parking space for the truck? </p>
                                <p>Is your street too narrow? </p>
                                <p>If movers have to park farther away from your home or deal with any other access issues
                                    (like
                                    stairs or obstacles), you might be charged an extra fee.</p>
                                <h3>Seasonal Factors (Weather and Road Conditions)</h3>
                                <p>People don't always think about it, but bad weather (like snow, rain, or heat) can slow
                                    down
                                    a
                                    move.</p>
                                <p>If road conditions are tricky, your moving company may add extra charges to cover the
                                    time
                                    and
                                    resources required to transport your things safely to your new home.</p>
                                <h2>10 Ways To Reduce Moving Costs</h2>
                                <p>Let's be honest: moving can get expensive. </p>
                                <p>But there are plenty of ways to save money and keep those costs down. </p>
                                <p class="mb-3"><strong>Move During the Off-Season</strong></p>
                                <p>If you can, try to schedule your move during the off-season. Summer, especially, is the
                                    busiest
                                    time for movers, which means prices are higher due to increased demand. The best times
                                    to
                                    move
                                    are typically in the fall or winter when fewer people relocate. </p>
                                <p class="mb-3"><strong>Declutter Before You Move</strong></p>
                                <p>This one is a no-brainer—decluttering will not only make packing easier but also save you
                                    money.
                                    The less stuff you move, the less you'll pay. Take the time to go through your
                                    belongings
                                    and
                                    donate, sell, or throw out things you no longer need. </p>
                                <p class="mb-3"><strong>Pack Yourself</strong></p>
                                <p>Hiring movers to pack your things can add up quickly. If you're up for it, consider
                                    packing
                                    everything yourself. You can get free or low-cost boxes from local stores or online
                                    marketplaces. Just be sure to pack everything safely, especially fragile items. </p>
                                <p class="mb-3"><strong>Choose a Smaller Moving Truck</strong></p>
                                <p>Sometimes, it's easy to overestimate how much space you need. If you're moving from a
                                    small
                                    apartment or studio, you don't need a huge truck. Choose a smaller vehicle to save on
                                    rental
                                    costs and fuel charges. </p>
                                <p class="mb-3"><strong>Ask for Discounts and Promotions</strong></p>
                                <p>Don't be afraid to ask! Some moving companies offer discounts or promotions, especially
                                    during
                                    the off-season. Whether it's a percentage off or a special deal for booking early, it
                                    never
                                    hurts to ask. </p>
                                <p class="mb-3"><strong>Move on a Weekday</strong></p>
                                <p>If you have flexible schedules, try to move on a weekday instead of a weekend. Weekends
                                    tend
                                    to
                                    be peak times for movers, and that can increase your costs. </p>
                                <p class="mb-3"><strong>Pack Your Own Supplies</strong></p>
                                <p>Moving companies charge for packing materials like bubble wrap, tape, and boxes. Skip
                                    those
                                    extra
                                    charges by sourcing your own packing materials. You can often find free boxes at local
                                    stores,
                                    liquor stores, or through online groups. Use towels, blankets, or even old newspapers to
                                    wrap
                                    delicate items. </p>
                                <p class="mb-3"><strong>Use a Moving Container Instead of Full-Service Movers</strong>
                                </p>
                                <p>If you want more control over your move, consider using a moving container instead of
                                    full-service movers. With moving containers, you can pack at your own pace and only pay
                                    for
                                    the
                                    container delivery and transportation. </p>
                                <p class="mb-3"><strong>Plan Ahead and Get Multiple Quotes</strong></p>
                                <p>The earlier you plan your move, the more time you'll have to shop around and compare
                                    quotes
                                    from
                                    different moving companies. Getting multiple quotes will give you a better idea of
                                    what's
                                    reasonable and help you find the best deal. </p>
                                <p class="mb-3"><strong>Avoid Extra Fees</strong></p>
                                <p>Before signing anything, always ask about potential extra fees. Some movers charge for
                                    things
                                    like parking permits, long carries, or moving during odd hours. Being upfront about your
                                    needs
                                    and location will help you avoid these unexpected costs. </p>

                                <div class="col-12">
                                    <div class="accordion accordion-flush" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse578"
                                                    aria-expanded="false" aria-controls="collapse578">
                                                    How accurate is the moving cost estimate from your calculator?
                                                </button>
                                            </h2>
                                            <div id="collapse578" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>
                                                        Our moving cost estimator provides a highly accurate estimate based
                                                        on
                                                        the
                                                        details you provide, such as the size of your home, distance, and
                                                        additional
                                                        services required. However, keep in mind that actual moving costs
                                                        may
                                                        vary
                                                        due to unexpected factors like weather, road conditions, or delays.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse579"
                                                    aria-expanded="false" aria-controls="collapse579">
                                                    Can I use the moving cost estimator for international moves?
                                                </button>
                                            </h2>
                                            <div id="collapse579" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>
                                                        Yes! Our calculator can estimate the cost for international moves,
                                                        but
                                                        the
                                                        final price will depend on your destination country, customs, and
                                                        shipping
                                                        method. The estimate you receive will provide a ballpark figure, but
                                                        for
                                                        precise details, it's best to contact moving companies.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse580"
                                                    aria-expanded="false" aria-controls="collapse580">
                                                    Does the estimator include hidden fees like fuel charges or tips for
                                                    movers?
                                                </button>
                                            </h2>
                                            <div id="collapse580" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>
                                                        While our moving cost estimator includes most of the major charges,
                                                        hidden
                                                        fees like fuel surcharges, tolls, or tips for movers may not be
                                                        included
                                                        in
                                                        the initial estimate. Be sure to ask the moving company about these
                                                        potential extras.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse581"
                                                    aria-expanded="false" aria-controls="collapse581">
                                                    How long does it take to get a moving quote from the estimator?
                                                </button>
                                            </h2>
                                            <div id="collapse581" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>
                                                        The moving cost estimator only takes a few minutes to complete. Once
                                                        you
                                                        enter your details, you'll receive an estimate right away. It's a
                                                        quick
                                                        and
                                                        easy way to get an idea of your moving costs.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse582"
                                                    aria-expanded="false" aria-controls="collapse582">
                                                    Is there a limit to how many times I can use the moving cost estimator?
                                                </button>
                                            </h2>
                                            <div id="collapse582" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>
                                                        Nope! You can use our moving cost estimator as many times as you
                                                        like.
                                                        Whether you're comparing prices for different moving dates or
                                                        exploring
                                                        different options for your move, feel free to calculate estimates as
                                                        often
                                                        as you need until you find the best plan for your budget.
                                                    </p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBefFHoLcWO1IV00axnWC0s34SPuCm9gKo&libraries=places&callback=googleMapsLoaded"></script>
    <script>
        // Global variables for ZIP inputs
        var zipFromData = null,
            zipToData = null;
        var validZipFrom = false,
            validZipTo = false;

        // Variables for multi-step form
        let quotationCurrentStep = 0;
        const quotationSteps = document.querySelectorAll("#quotationForm .quotation_step");
        const quotationProgressBar = document.querySelector(".quotation-progress-bar");
        const quotationProgressText = document.getElementById("quotation-progressText");
        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");

        // State to ZIP mapping for random ZIP fallback
        const stateZipMap = {
            'FL': ['33101', '32801', '32202', '34101'],
            'CA': ['90001', '94101', '95814', '92101'],
            'NY': ['10001', '11201', '14604', '12207'],
            'TX': ['73301', '75201', '77001', '78701'],
            // Add more as needed
        };

        function getRandomZip(stateAbbr) {
            const zips = stateZipMap[stateAbbr];
            if (zips && zips.length > 0) {
                return zips[Math.floor(Math.random() * zips.length)];
            }
            return '00000'; // fallback
        }

        // Function to update Next button based on current step
        function checkNextButton() {
            if (quotationCurrentStep === 0) {
                // Step 1 requires valid ZIP from only
                $("#nextBtn").prop("disabled", !validZipFrom);
            } else if (quotationCurrentStep === 1) {
                // Step 2 requires valid ZIP to only
                $("#nextBtn").prop("disabled", !validZipTo);
            } else {
                $("#nextBtn").prop("disabled", false);
            }
        }

        // Document ready function
        $(document).ready(function() {
            quotationShowStep(quotationCurrentStep);
            // ensure our container is positioned for absolute children
            const quotationContainer = document.querySelector(".quotation-progress-container");
            if (quotationContainer) quotationContainer.style.position = "relative";

            // absolutely center the text over our bar
            // if (quotationProgressText) {
            //     Object.assign(quotationProgressText.style, {
            //         position: "absolute",
            //         top: "-100%",
            //         left: "2%",
            //         transform: "translate(-50%, -50%)",
            //         textAlign: "center",
            //         zIndex: 100
            //     });
            // }
            setupZipAutocomplete();
            setupPhoneValidation();
            setupNameValidation();
            setupDatePicker();
        });

        // Setup ZIP autocomplete for both ZIP fields
        function setupZipAutocomplete() {
            // ZIP FROM Autocomplete
            const zipFromInput = document.getElementById('zipfromsearch');
            const zipFromAutocomplete = new google.maps.places.Autocomplete(zipFromInput, {
                types: ['(regions)'],
                componentRestrictions: {
                    country: "us"
                }
            });

            zipFromAutocomplete.addListener('place_changed', function() {
                const place = zipFromAutocomplete.getPlace();
                let zip = '',
                    city = '',
                    state = '';
                let lat = place.geometry?.location.lat();
                let lng = place.geometry?.location.lng();

                if (!place.address_components) return;

                for (const component of place.address_components) {
                    const types = component.types;
                    if (types.includes('postal_code')) {
                        zip = component.long_name;
                    }
                    if (types.includes('locality')) {
                        city = component.long_name;
                    }
                    if (types.includes('administrative_area_level_1')) {
                        state = component.short_name;
                    }
                }

                // If ZIP is missing, use random ZIP for that state
                if (!zip && state) {
                    zip = getRandomZip(state);
                }

                const formattedAddress = `${zip}, ${city}, ${state}`;
                zipFromInput.value = formattedAddress;
                $(zipFromInput).attr('data-valid', formattedAddress);

                zipFromData = {
                    value: zip,
                    city: city,
                    state: state,
                    latitude: lat,
                    longitude: lng
                };

                validZipFrom = true;
                checkNextButton();
            });

            $(zipFromInput).on('blur', function() {
                if (!$(this).attr('data-valid')) {
                    $(this).val('');
                    validZipFrom = false;
                    checkNextButton();
                }
            }).on('input', function() {
                if ($(this).val() !== $(this).attr('data-valid')) {
                    $(this).removeAttr('data-valid');
                    validZipFrom = false;
                    checkNextButton();
                }
            });

            // ZIP TO Autocomplete
            const zipToInput = document.getElementById('ziptosearch');
            const zipToAutocomplete = new google.maps.places.Autocomplete(zipToInput, {
                types: ['(regions)'],
                componentRestrictions: {
                    country: "us"
                }
            });

            zipToAutocomplete.addListener('place_changed', function() {
                const place = zipToAutocomplete.getPlace();
                let zip = '',
                    city = '',
                    state = '';
                let lat = place.geometry?.location.lat();
                let lng = place.geometry?.location.lng();

                if (!place.address_components) return;

                for (const component of place.address_components) {
                    const types = component.types;
                    if (types.includes('postal_code')) {
                        zip = component.long_name;
                    }
                    if (types.includes('locality')) {
                        city = component.long_name;
                    }
                    if (types.includes('administrative_area_level_1')) {
                        state = component.short_name;
                    }
                }

                // If ZIP is missing, use random ZIP for that state
                if (!zip && state) {
                    zip = getRandomZip(state);
                }

                const formattedAddress = `${zip}, ${city}, ${state}`;
                zipToInput.value = formattedAddress;
                $(zipToInput).attr('data-valid', formattedAddress);

                zipToData = {
                    value: zip,
                    city: city,
                    state: state,
                    latitude: lat,
                    longitude: lng
                };

                validZipTo = true;
                checkNextButton();
            });

            $(zipToInput).on('blur', function() {
                if (!$(this).attr('data-valid')) {
                    $(this).val('');
                    validZipTo = false;
                    checkNextButton();
                }
            }).on('input', function() {
                if ($(this).val() !== $(this).attr('data-valid')) {
                    $(this).removeAttr('data-valid');
                    validZipTo = false;
                    checkNextButton();
                }
            });
        }

        // Added helper to format phone number with (xxx) xxx - xxxx pattern
        function formatPhoneNumber(input) {
            let numbers = input.value.replace(/\D/g, '');
            let char = {
                0: '(',
                3: ') ',
                6: ' - '
            };
            let formatted = '';
            for (let i = 0; i < numbers.length && i < 10; i++) {
                formatted += (char[i] || '') + numbers[i];
            }
            input.value = formatted;
        }

        // Setup phone number validation and formatting
        function setupPhoneValidation() {
            $("#phone_no").on('input', function(e) {
                formatPhoneNumber(e.target);
                $(this).toggleClass('is-invalid', !validatePhoneNumber(this.value));
            });
        }

        // Setup name field validation
        function setupNameValidation() {
            var nameField = document.getElementById("name");
            if (nameField) {
                nameField.addEventListener("input", function() {
                    this.value = this.value.replace(/[^A-Za-z\s]/g, "");
                });
            }
        }

        // Setup date picker
        function setupDatePicker() {
            // Initialize flatpickr for the moving date input
            if (document.getElementById("moveDate")) {
                flatpickr("#moveDate", {
                    dateFormat: "d-m-Y",
                    minDate: "today"
                });
            }
        }

        // Haversine distance calculation
        function haversineDistanceBetweenPoints(lat1, lon1, lat2, lon2) {
            var R = 0.000621371; // meters to miles conversion
            var R2 = 6371e3; // Earth radius in meters
            var p1 = lat1 * Math.PI / 180;
            var p2 = lat2 * Math.PI / 180;
            var deltaP = p2 - p1;
            var deltaLon = lon2 - lon1;
            var deltaLambda = (deltaLon * Math.PI) / 180;
            var a = Math.sin(deltaP / 2) * Math.sin(deltaP / 2) +
                Math.cos(p1) * Math.cos(p2) *
                Math.sin(deltaLambda / 2) * Math.sin(deltaLambda / 2);
            var D_K = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a)) * R2;
            var D_M = D_K * R;
            return Math.round(D_M);
        }

        // Multi-Step Form Navigation
        function quotationShowStep(n) {
            // Hide all steps and show the current one
            quotationSteps.forEach(function(step) {
                step.style.display = "none";
            });
            quotationSteps[n].style.display = "block";

            // If on distance step and both ZIP codes are valid, calculate distance
            if (n === 2 && zipFromData && zipToData) {
                var lat1 = zipFromData.latitude;
                var lon1 = zipFromData.longitude;
                var lat2 = zipToData.latitude;
                var lon2 = zipToData.longitude;
                var dist = haversineDistanceBetweenPoints(lat1, lon1, lat2, lon2);
                if (document.getElementById("distance")) {
                    document.getElementById("distance").value = dist + " miles";
                }
            }

            // Adjust buttons and progress bar
            prevBtn.style.display = n === 0 ? "none" : "inline-block";

            // Change button type and text based on current step
            if (n === (quotationSteps.length - 1)) {
                nextBtn.innerHTML = "Submit";
            } else {
                nextBtn.innerHTML = "Next";
                nextBtn.type = "button";
            }

            quotationUpdateProgressBar(n);
            checkNextButton();
        }

        function nextPrev(n) {
            if (n === 1 && !validateForm()) return false;
            quotationSteps[quotationCurrentStep].style.display = "none";
            quotationCurrentStep = quotationCurrentStep + n;
            if (quotationCurrentStep >= quotationSteps.length) {
                document.getElementById("quotationForm").submit();
                return false;
            }
            quotationShowStep(quotationCurrentStep);
        }

        function validateForm() {
            let valid = true;
            let currentFields = quotationSteps[quotationCurrentStep].querySelectorAll("input[required], select[required]");

            currentFields.forEach(function(field) {
                field.classList.remove("is-invalid");
                if (field.value.trim() === "") {
                    field.classList.add("is-invalid");
                    valid = false;
                }
            });

            // Special validation for each step
            if (quotationCurrentStep === 0 && !validZipFrom) {
                $("#zipfromsearch").addClass("is-invalid");
                if (!$("#zipfromsearch").next('.invalid-feedback').length) {
                    $("#zipfromsearch").after(
                        '<span class="invalid-feedback" role="alert"><strong>Please select a valid ZIP code from suggestions</strong></span>'
                    );
                }
                valid = false;
            }

            if (quotationCurrentStep === 1 && !validZipTo) {
                $("#ziptosearch").addClass("is-invalid");
                if (!$("#ziptosearch").next('.invalid-feedback').length) {
                    $("#ziptosearch").after(
                        '<span class="invalid-feedback" role="alert"><strong>Please select a valid ZIP code from suggestions</strong></span>'
                    );
                }
                valid = false;
            }

            // Step 4 validation for move size radio buttons
            if (quotationCurrentStep === 3) {
                const moveSize = document.querySelector('input[name="move_size"]:checked');
                if (!moveSize) {
                    valid = false;
                    if (!$(".form-check").next('.invalid-feedback').length) {
                        $(".form-check").last().after(
                            '<span class="invalid-feedback d-block" role="alert"><strong>Please select a move size</strong></span>'
                        );
                    }
                }
            }

            // Phone number validation in step 5
            if (quotationCurrentStep === 4 && $("#phone_no").length) {
                if (!validatePhoneNumber($("#phone_no").val())) {
                    $("#phone_no").addClass("is-invalid");
                    valid = false;
                }
            }

            return valid;
        }

        function quotationUpdateProgressBar(n) {
            if (!quotationProgressBar || !quotationProgressText) return;

            const totalSteps = quotationSteps.length;
            const percent = totalSteps > 1 ? (n / (totalSteps - 1)) * 100 : 100;

            // fill the bar
            quotationProgressBar.style.width = percent + "%";

            // move the text alongside the fill
            quotationProgressText.style.left = percent + "%";
            quotationProgressText.innerText = Math.round(percent) + "%";
        }

        // Validate phone number format
        function validatePhoneNumber(phone) {
            const regex = /^\(\d{3}\) \d{3} - \d{4}$/;
            return regex.test(phone);
        }

        // Form submission validation
        $('#quotationForm').on('submit', function(e) {
            if (!validZipFrom || !validZipTo) {
                e.preventDefault();
                alert("Please ensure both ZIP codes are selected from the suggestions");
                return false;
            }

            const phoneValid = validatePhoneNumber($('#phone_no').val());
            if (!phoneValid) {
                e.preventDefault();
                alert("Please enter a valid phone number in format (xxx) xxx - xxxx");
                return false;
            }

            // Ensure move size is selected
            const moveSize = document.querySelector('input[name="move_size"]:checked');
            if (!moveSize) {
                e.preventDefault();
                alert("Please select a move size");
                return false;
            }
        });
    </script>

    <!-- Include masked input plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js"></script>

@endsection
