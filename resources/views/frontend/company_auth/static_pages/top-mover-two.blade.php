<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css2?family=Andika&family=Raleway&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
<!-- Meanmenu CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
<!-- Boxicons CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}">
<!-- DATA TABLE -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<!-- Flaticon CSS -->
<style>

</style>

<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
<!-- Owl Theme Carousel CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
<!-- Nice Select CSS -->
<!-- <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}"> -->
<!-- Odometer CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
<!-- Imagelightbox CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/imagelightbox.min.css') }}">
<!-- Style CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/staticmovers2.css') }}">
<!-- Dark CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/dark.css') }}">
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<title>My Moving Journey</title>
<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.webp') }}">

<section id="topMovertwo">
    <div class="container">
        <nav>
            <div class="logo w-100 d-flex justify-content-center">
                <a href="{{ url('/') }}" class=" d-flex py-3 justify-content-center align-items-center">
                    <h2 class="fw-normal me-2">Powerd by: </h2>
                    <img src="{{ asset('assets/img/logo.webp') }}" class="py-3" alt="image">
                </a>
            </div>
        </nav>
    </div>
    <section class="top-mover-sec" id="author-page">
        <div class="container">
            <nav class="px-3 bg-transparent">
                <div class="logo w-100 d-flex justify-content-between">
                    <a href="#" class="d-flex justify-content-center  align-items-center">
                        <img src="{{ asset('assets/img/staticMovers/logo2.png') }}" class="py-3" alt="image">
                    </a>
                    <div class="d-none d-sm-block">
                        <button class="sdg mt-2 call-btn"><i class="me-2 fas fa-phone"></i> 866-311-2891</button>
                    </div>
                </div>
            </nav>
        </div>
        <hr class="bg-white">
        <div class="container ptb-lg-100 py-5">
            <div class="row">
                <div class="col-xl-6 col-12 mt-5 d-flex justify-content-center align-items-center">
                    <div class="w-100">
                        @include('backend.layouts.partials.messages')
                        <div class="login-form bg-greeny h2-div-login-form p-3">
                            <h2 class="text-center m-0">Get A Free Quote</h2>
                        </div>
                        <form id="registerForm" action="{{ route('quotation.post') }}"
                            class="login-form pt-3 pb-4 pe-5 ps-5" method="POST">
                            @csrf
                            <div class="form-header d-flex mb-4">
                                <span class="stepIndicator">Destination</span>
                                <span class="stepIndicator">Details</span>
                                <span class="stepIndicator">Personal Details</span>
                            </div>
                            <div class="step">
                                <div class="mb-3">
                                    <input type="text" id="zipfromsearch"
                                        class="form-control  @error('zip_from') is-invalid @enderror" required
                                        name="zip_from" placeholder="Zip From">
                                    @error('zip_from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">

                                    <input type="text" id="ziptosearch"
                                        class="form-control  @error('zip_to') is-invalid @enderror" required
                                        name="zip_to" placeholder="Zip To">
                                    @error('zip_to')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="step">
                                <div class="mb-3">
                                    <input type="date" id="date"
                                        class="form-control  @error('date') is-invalid @enderror" required
                                        name="date" placeholder="Date">
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <select class="form-select w-100 py-3" name="move_size" id="move_size"
                                        aria-label="Move Size">
                                        <option selected value=""> Select Move Size</option>
                                        <option value="4 Bedroom Home">4 Bedroom Home</option>
                                        <option value="3 Bedroom Home">3 Bedroom Home</option>
                                        <option value="2 Bedroom Home">2 Bedroom Home</option>
                                        <option value="1 Bedroom Home">1 Bedroom Home</option>
                                        <option value="Studio">Studio</option>
                                        <option value="Office Move">Office Move</option>
                                        <option value="Commercial Move">Commercial Move</option>
                                    </select>
                                </div>
                            </div>
                            <div class="step">
                                <div class="mb-3">
                                    <input type="text" id="name"
                                        class="form-control @error('name') is-invalid @enderror" required
                                        name="name" placeholder="Your Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror" required
                                        name="email" placeholder="Your email address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="text" id="phone_no"
                                        class="form-control @error('phone_no') is-invalid @enderror" required
                                        name="phone_no" placeholder="Phone number">
                                    @error('phone_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-footer d-flex">
                                <button type="button" class="sdg py-2 px-2" id="prevBtn"
                                    onclick="nextPrev(-1)">Previous</button>
                                <button type="button" class="sdg py-2 px-4" id="nextBtn"
                                    onclick="nextPrev(1)">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6 col-12 mt-5 d-flex justify-content-center flex-column">
                    <p class="fs-4 text-white">Hello and welcome to SOLUTION OF YOUR MOVING</p>
                    <h1 class="heading1-top-mover display-5 fw-bold mt-1">Making the entire moving process simple</h1>
                    <p class="fs-5 text-white">Adams Moving and Storage is the company to contact for all of your
                        moving requirements inside the USA. We specialise in offering options for long-distance packing,
                        moving, and storage.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="top-comp-sec d-flex justify-content-center align-items-center my-5 ptb-50">
        <div class="container d-flex justify-content-center align-items-center flex-column my-5">
            <h1 class="fs-1 fw-normal text-dark text-center">About Our Business</h1>
            <p class="fs-5 text-center text-disable">Founded more than ten years ago, Adams Moving and Storage is a
                family-run company. We want to be the one-stop shop for everyone wishing to move their home or place of
                business.</p>
            <p class="fs-5 text-center text-disable">USA Moving Solutions offers the qualified staff and premium
                resources to ensure a timely move at affordable prices, whether it's for apartments, homes, companies,
                or warehouses. Veterans of the moving sector with years of expertise make up its workforce, and they
                prioritise client pleasure. Get your free estimate now to begin organising your cross-country move!</p>
        </div>
    </section>
    <section class="top-comp-sec d-flex justify-content-center align-items-center my-5"
        style="background: rgba(221 221 221);">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 px-3 py-4">
                    <div
                        class="experince-card p-3 d-flex flex-column justify-content-center align-items-center bg-white">
                        <h1 class=" heading1-top-mover text-center display-4">4.5<sup><i
                                    class="far fs-3 ms-1 mb-2 fa-star"></i></sup></h1>
                        <p class="text-black text-center text-capitalize fs-5">GRADE STARS</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 px-3 py-4">
                    <div
                        class="experince-card p-3 d-flex flex-column justify-content-center align-items-center bg-white">
                        <h1 class=" heading1-top-mover text-center display-4">58<sup><i
                                    class="fas fs-3 ms-1 mb-2 fa-user-plus"></i></sup></h1>
                        <p class="text-black text-center text-capitalize fs-5">OUR NETWORK'S CARRIERS</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 px-3 py-4">
                    <div
                        class="experince-card p-3 d-flex flex-column justify-content-center align-items-center  bg-white">
                        <h1 class=" heading1-top-mover text-center display-4">98<sup><i
                                    class="far fs-3 ms-1 mb-2 fa-smile"></i></sup></h1>
                        <p class="text-black text-center text-capitalize fs-5">SATISFIED CLIENT</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="top-comp-sec d-flex justify-content-center align-items-center ptb-100">
        <div class="container">
            <h1 class="fs-3 text-center">SERVICES</h1>
            <h1 class="display-5 heading1-top-mover text-center">Professional Moving Services</h1>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-12 px-3 py-5">
                    <div
                        class="service-card p-3 d-flex flex-column justify-content-center align-items-center position-relative bg-white">
                        <h1 class="fw-normal fs-3 w-100"><i class="fas fa-couch fs-2 text-center me-2"></i>Residential
                            Moving</h1>
                        <p class="fs-5">You can always rely on the knowledgeable and experienced residential movers
                            to assist with the safe and damage-free relocation of your complete house.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12 px-3 py-5">
                    <div
                        class="service-card p-3 d-flex flex-column justify-content-center align-items-center position-relative bg-white">
                        <h1 class="fw-normal fs-3 w-100"><i class="fas fa-route fs-2 text-center me-2"></i>Long
                            Distance
                            Moving</h1>
                        <p class="fs-5">With the assistance of USA Moving Solutions and its team, make your long
                            distance moving process simple.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12 px-3 py-5">
                    <div
                        class="service-card p-3 d-flex flex-column justify-content-center align-items-center position-relative bg-white">
                        <h1 class="fw-normal fs-3 w-100"><i
                                class="fas fa-truck-fast fs-2 text-center me-2"></i>Country
                            Moving</h1>
                        <p class="fs-5">With the aid of reliable countrywide moving professionals, relocating from
                            one part of the country to another will be lot simpler and easier.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12 px-3 py-5">
                    <div
                        class="service-card p-3 d-flex flex-column justify-content-center align-items-center position-relative bg-white">
                        <h1 class="fw-normal fs-3 w-100"><i
                                class="fas fa-map-location-dot fs-2 text-center me-2"></i>Interstate
                            Moving</h1>
                        <p class="fs-5">All 50 states are eligible to use USA Moving Solutions' moving and storage
                            services.
                            Make your interstate relocation a total success!</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12 px-3 py-5">
                    <div
                        class="service-card p-3 d-flex flex-column justify-content-center align-items-center position-relative bg-white">
                        <h1 class="fw-normal fs-3 w-100"><i class="fas fa-tv fs-2 text-center me-2"></i>Corporate
                            Relocation</h1>
                        <p class="fs-5">Make sure your commercial property is transported with the least possible
                            impact on your business and is treated with the highest care.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12 px-3 py-5">
                    <div
                        class="service-card p-3 d-flex flex-column justify-content-center align-items-center position-relative bg-white">
                        <h1 class="fw-normal fs-3 w-100"><i class="fas fa-boxes fs-2 text-center me-2"></i>Storage
                            Services</h1>
                        <p class="fs-5">Make use of our on-site, climate-controlled storage facilities before,
                            during, or after relocating to protect your possessions for whatever long is necessary.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="top-comp-sec d-flex justify-content-center align-items-center my-5">
        <div class="container ">
            <div class="row px-2">
                <div
                    class="quote-banner-topmover p-3 d-flex flex-column justify-content-center align-items-center position-relative bg-white">
                    <h1 class=" fw-normal fs-2">Get your <span class="heading1-top-mover fw-bold">Free</span> moving
                        cost estimate today!</h1>
                    <p class="fs-5 text-center">OChoose a comprehensive moving and storage experience anywhere in the
                        USA, and you'll ensure a smooth move for yourself!</p>
                    <div id="top-quote-banner"
                        class="d-flex flex-wrap justify-content-center justify-content-md-start">
                        <button class="sdg ms-0 mt-2 me-0 me-sm-3 call-btn"><i class="me-2 fas fa-phone"></i>
                            866-311-2891</button>
                        <button class="sdg ms-0 mt-2  call-btn"><i class="me-2 fas fa-paper-plane"></i> Get a
                            Quote</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="top-comp-sec d-flex justify-content-center align-items-center ptb-100">
        <div class="container ">
            <div class="row px-2">
                <h1 class="fs-2 text-center">Testimonials</h1>
                <h1 class="display-4 heading1-top-mover text-center">What Clients Have to Say</h1>
                <div id="top-quote-banner" class="d-flex flex-wrap justify-content-center">
                    <button class="sdg ms-0 mt-2 me-3 call-btn">Add a Review</button>
                    <button class="sdg ms-0 mt-2 call-btn">See all Reviews</button>
                </div>
                <div class="col-md-6 col-lg-4 col-12 px-3 py-5">
                    <div class="comments-card p-3 d-flex flex-column align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny px-4 py-2 text-center"><i
                                class="fa-brands fa-google fs-2 text-center"></i></span>
                        <h1 class=" heading1-top-mover border-bottom pb-2 mb-0 fw-normal fs-5 w-100"><i
                                class="fas fa-user fs-5 text-center me-2"></i>vioza</h1>
                        <p class="fs-5 my-3"><sup>
                                <i class="fas text-dark fa-quote-left fs-6 text-center me-1"></i>
                            </sup>
                            Simply said, these guys were the finest! I've moved before, and I've moved poorly before!
                            The Transportation Group employees shown consistency throughout the entire process!
                            TRANSPORTATION GROUP, THANK YOU! You were a huge assistance.<sup>
                                <i class="fas text-dark fa-quote-right fs-6 text-center me-1"></i>
                            </sup></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12 px-3 py-5">
                    <div class="comments-card p-3 d-flex flex-column align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny px-4 py-2 text-center"><i
                                class="fa-brands fa-google fs-2 text-center"></i></span>
                        <h1 class=" heading1-top-mover border-bottom pb-2 mb-0 fw-normal fs-5 w-100"><i
                                class="fas fa-user fs-5 text-center me-2"></i>Stith</h1>
                        <p class="fs-5 my-3"><sup>
                                <i class="fas text-dark fa-quote-left fs-6 text-center me-1"></i>
                            </sup>
                            Excellent service! Crew of professionals. Competitive price and high efficiency. I called
                            them on short notice, and they organised my relocation for the next day. I strongly suggest
                            Allied Transportation Group for any of your relocation requirements.<sup>
                                <i class="fas text-dark fa-quote-right fs-6 text-center me-1"></i>
                            </sup></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12 px-3 py-5">
                    <div class="comments-card p-3 d-flex flex-column align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny px-4 py-2 text-center"><i
                                class="fa-brands fa-google fs-2 text-center"></i></span>
                        <h1 class=" heading1-top-mover border-bottom pb-2 mb-0 fw-normal fs-5 w-100"><i
                                class="fas fa-user fs-5 text-center me-2"></i>John igi</h1>
                        <p class="fs-5 my-3"><sup>
                                <i class="fas text-dark fa-quote-left fs-6 text-center me-1"></i>
                            </sup>
                            Excellent customer service! Professional crew. Very efficient, competitive pricing. I called
                            them on short notice, and they organised my relocation for the next day. I strongly suggest
                            Allied Transportation Group for your relocation requirements.<sup>
                                <i class="fas text-dark fa-quote-right fs-6 text-center me-1"></i>
                            </sup></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="top-comp-sec d-flex justify-content-center align-items-center ptb-100"
        style="background: rgba(221 221 221);">
        <div class="container">
            <div class="row">
                <h1 class="heading1-top-mover text-center">Why Choose Us</h1>
                <div class="col-lg-4 col-md-6 col-12 px-3 py-5">
                    <div class="working-card p-3 d-flex flex-column align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny d-flex justify-content-center text-center"><i
                                class="fas fa-1 fs-4 text-center align-items-center d-flex"></i></span>
                        <h1 class=" heading1-top-mover text-center fw-normal fs-4 w-100 mt-3">
                            Licensed, bondable, and insured</h1>
                        <p class="fs-5 my-3 text-center">
                            Our brokerage organisation collaborates with a large network of highly verified professional
                            movers.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 px-3 py-5">
                    <div class="working-card p-3 d-flex flex-column align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny d-flex justify-content-center text-center"><i
                                class="fas fa-2 fs-4 text-center align-items-center d-flex"></i></span>
                        <h1 class=" heading1-top-mover text-center fw-normal fs-4 w-100 mt-3">
                            Delivery from door to door
                        </h1>
                        <p class="fs-5 my-3 text-center">Your relocation procedure will be managed from beginning to
                            end, from packing and loading through transport and unloading.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 px-3 py-5">
                    <div class="working-card p-3 d-flex flex-column align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny d-flex justify-content-center text-center"><i
                                class="fas fa-3 fs-4 text-center align-items-center d-flex"></i></span>
                        <h1 class=" heading1-top-mover text-center fw-normal fs-4 w-100 mt-3">
                            Professional Customer Service</h1>
                        <p class="fs-5 my-3 text-center">With our expert moving consultants available 24/7, you can get
                            answers to any of your moving and storage questions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="ptb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 py-5 px-3">
                    <a href="#" class="d-flex justify-content-center  align-items-center">
                        <img src="{{ asset('assets/img/staticMovers/logo2.png') }}" class="w-75" alt="image">
                    </a>
                    <hr>
                    <div class="logo w-100 d-flex justify-content-center align-items-center">
                        <a href="{{ url('/') }}"
                            class=" d-flex py-3 justify-content-center flex-column align-items-center">
                            <h2 class="fw-normal fs-4 mb-3 me-2">Powerd by</h2>
                            <img src="{{ asset('assets/img/logo.webp') }}" class="black-logo w-75" alt="image">
                        </a>
                    </div>
                    <p class="fs-6 text-center mt-3">Copyright © 2022 MyMovingJourney | All Rights Reserved.
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 col-12 py-5 px-3">
                    <p class="fw-bold mb-0 text-dark fs-6">Company Address</p>
                    <p class="fs-5 lh-sm">South Daytona, FL 32119 is located at 933 Beville Road.</p>
                    <p class="fw-bold mb-0 text-dark fs-6">Email</p>
                    <p class="fs-5 lh-sm">usamovingsolutionsllc@gmail.com</p>
                    <div id="top-quote-banner" class="d-flex flex-wrap">
                        <button class="sdg my-2 w-100 call-btn"><i class="me-2 fas fa-phone"></i>
                            866-311-2891</button>
                        <button class="sdg my-2 w-100 call-btn"><i class="me-2 fas fa-paper-plane"></i> Get a
                            Quote</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 py-5 px-3">
                    <p class="fw-bold mb-0 text-dark fs-6">DISCLOSURE </p>
                    <p class="fs-5 lh-base d-flex flex-wrap">Please keep in mind that a properly licenced interstate
                        broker, such as USA Moving Solutions, is not a motor carrier and will not transport an
                        individual shipper's household goods, but will coordinate and arrange for the transportation of
                        household goods by an FMCSA authorised motor carrier, whose charges will be determined by its
                        published tariff.</p>
                </div>
            </div>
        </div>
    </footer>
</section>

<!-- Jquery Slim JS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- Meanmenu JS -->
<script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- Odometer JS -->
<script src="{{ asset('assets/js/odometer.min.js') }}"></script>
<!-- Jquery Appear JS -->
<script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
<!-- Datepicker JS -->
<script src="{{ asset('assets/js/datepicker.min.js') }}"></script>
<!-- Imagelightbox JS -->
<script src="{{ asset('assets/js/imagelightbox.min.js') }}"></script>
<!-- Popup JS -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Nice Select JS -->
<!-- <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script> -->
<!-- Ajaxchimp JS -->
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
<!-- Form Validator JS -->
<script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
<!-- Contact JS -->
<script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
<!-- Wow JS -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<!-- TABLE JS -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- ZIP_TO SEARCH  -->
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $("#zipfromsearch").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: path,
                type: 'GET',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            $('#zipfromsearch').val(ui.item.label);
            console.log(ui.item);
            return false;
        }
    });
</script>
<!-- ZIP_TO SEARCH -->
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $("#ziptosearch").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: path,
                type: 'GET',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            $('#ziptosearch').val(ui.item.label);
            console.log(ui.item);
            return false;
        }
    });
</script>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("step");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("step");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("registerForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("step");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("stepIndicator");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

<script src="{{ asset('assets/js/star.js') }}"></script>
