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
<link rel="stylesheet" href="{{ asset('assets/css/staticmovers.css') }}">
<!-- Dark CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/dark.css') }}">
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<title>My Moving Journey</title>
<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.webp') }}">

<section id="topMoverOne">
    <div class="container">
        <nav>
            <div class="logo w-100 d-flex justify-content-center">
                <a href="{{ url('/') }}" class=" d-flex justify-content-center align-items-center">
                    <h2 class="fw-normal me-2">Powerd by: </h2>
                    <img src="{{ asset('assets/img/logo.webp') }}" class="py-3" alt="image">
                </a>
            </div>
        </nav>
    </div>
    <section class="top-mover-sec" id="author-page">
        <nav class="px-3 bg-transparent">
            <div class="logo w-100 d-flex justify-content-between">
                <a href="#" class="d-flex justify-content-center  align-items-center">
                    <img src="{{ asset('assets/img/staticMovers/Allied_Logo_Positive.svg') }}" class="w-100"
                        alt="image">
                </a>
                <div class="d-none d-sm-block">
                    <button class="sdg mt-2 call-btn"><i class="me-2 fas fa-phone"></i> 866-311-2891</button>
                </div>
            </div>
        </nav>
        <hr class="bg-white">
        <div class="container ptb-lg-100 py-5">
            <div class="row">
                <div class="col-xl-6 col-12 mt-5 d-flex justify-content-center align-items-center flex-column">
                    <h1 class="heading1-top-mover display-5 fw-bold mt-1">Decide to move without using any force.</h1>
                    <p class="fs-5 text-white">Plan a stress-free relocation with the assistance of qualified and
                        accredited long distance movers and take pleasure in your fresh start.</p>
                </div>
                <div class="col-xl-6 col-12 mt-5 d-flex justify-content-center align-items-center">
                    <div class="w-100">
                        @include('backend.layouts.partials.messages')
                        <div class="login-form bg-greeny h2-div-login-form p-3">
                            <h2 class="text-center m-0">Get A Free Quote</h2>
                        </div>
                        <form id="registerForm" action="{{ route('quotation.post') }}"
                            class="login-form pt-3 pb-4 pe-2 ps-2 ps-md-5 pe-md-5" method="POST">
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
            </div>
        </div>
    </section>
    <section class="top-comp-sec d-flex justify-content-center align-items-center my-5 ptb-50">
        <div class="container d-flex justify-content-center align-items-center flex-column my-5">
            <h1 class="fs-1 fw-normal text-dark text-center">Move with confidence and faith.</h1>
            <p class="fs-5 text-center text-dark">A reliable full-service long distance moving company with years of
                expertise in the business, Allied Transportation Group.</p>
            <p class="fs-5 text-center text-disable">This company's top priority and main emphasis is to offer
                qualified moving and storage solutions that will guarantee a stress-free relocation experience for
                clients across the country!</p>
            <a href="#" class="fs-5 w-100 text-center">Request a free relocation quote right away.</a>
        </div>
    </section>
    <section class="top-comp-sec d-flex justify-content-center align-items-center my-5"
        style="background: rgba(221 221 221);">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 px-3 py-4">
                    <div
                        class="experince-card p-3 d-flex flex-column justify-content-center align-items-center  bg-white">
                        <h1 class=" heading1-top-mover text-center display-4">8,000<sup><i
                                    class="fas fs-3 ms-1 mb-2 fa-user-plus"></i></sup></h1>
                        <p class="text-black text-center text-capitalize fs-5">Effective Movements</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 px-3 py-4">
                    <div
                        class="experince-card p-3 d-flex flex-column justify-content-center align-items-center  bg-white">
                        <h1 class=" heading1-top-mover text-center display-4">95<sup><i
                                    class="far fs-3 ms-1 mb-2 fa-smile"></i></sup></h1>
                        <p class="text-black text-center text-capitalize fs-5">Customer Feedback Score</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 px-3 py-4">
                    <div
                        class="experince-card p-3 d-flex flex-column justify-content-center align-items-center  bg-white">
                        <h1 class=" heading1-top-mover text-center display-4">4.8<sup><i
                                    class="far fs-3 ms-1 mb-2 fa-star"></i></sup></h1>
                        <p class="text-black text-center text-capitalize fs-5">Relocation Company Rating</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="top-comp-sec d-flex justify-content-center align-items-center ptb-100">
        <div class="container">
            <h1 class="display-4 heading1-top-mover text-center">Benefit from a wide variety of services</h1>
            <div class="row">
                <div class="col-md-6 col-12 px-3 py-5">
                    <div
                        class="service-card p-3 d-flex flex-column justify-content-center align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny px-4 py-2 text-center"><i
                                class="fas fa-truck-fast fs-2 text-center"></i></span>
                        <img src="{{ asset('assets/img/staticMovers/service1/long_dist_img.png.webp') }}"
                            class="img-of-service my-2">
                        <h1 class="fw-normal fs-2 w-100"><i class="fas fa-truck-fast fs-2 text-center me-2"></i>Long
                            Distance Moving</h1>
                        <p class="fs-5">Our services vary from packing and loading to climate-controlled storage and
                            unloading, and they are available in all 48 states.</p>
                    </div>
                </div>
                <div class="col-md-6 col-12 px-3 py-5">
                    <div
                        class="service-card p-3 d-flex flex-column justify-content-center align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny px-4 py-2 text-center"><i
                                class="fas fa-house-chimney fs-2 text-center"></i></span>
                        <img src="{{ asset('assets/img/staticMovers/service1/residential_img.png.webp') }}"
                            class="img-of-service my-2">
                        <h1 class=" fw-normal fs-2 w-100"><i
                                class="fas fa-house-chimney fs-2 text-center me-2"></i>Residential Moving</h1>
                        <p class="fs-5">Our long distance movers pay close attention to detail and work quickly to
                            develop customised home moving solutions.</p>
                    </div>
                </div>
                <div class="col-md-6 col-12 px-3 py-5">
                    <div
                        class="service-card p-3 d-flex flex-column justify-content-center align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny px-4 py-2 text-center"><i
                                class="far fa-building fs-2 text-center"></i></span>
                        <img src="{{ asset('assets/img/staticMovers/service1/commercial_img.png.webp') }}"
                            class="img-of-service my-2">
                        <h1 class="fw-normal fs-2 w-100"><i
                                class="far fa-building fs-2 text-center me-2"></i>Commercial Moving</h1>
                        <p class="fs-5">Avoid wasting money or labour on the logistics of shifting your company and
                            guarantee a smooth workplace move.</p>
                    </div>
                </div>
                <div class="col-md-6 col-12 px-3 py-5">
                    <div
                        class="service-card p-3 d-flex flex-column justify-content-center align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny px-4 py-2 text-center"><i
                                class="fa-solid fa-box-open fs-2 text-center"></i></span>
                        <img src="{{ asset('assets/img/staticMovers/service1/packing_img.png.webp') }}"
                            class="img-of-service my-2">
                        <h1 class="fw-normal fs-2 w-100"><i
                                class="fa-solid fa-box-open fs-2 text-center me-2"></i>Packing Services</h1>
                        <p class="fs-5">In order to ensure the security of your most priceless possessions, Allied
                            Transportation Group offers high-quality packing materials and services.</p>
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
                    <span class="badge topmover-quote-badge bg-greeny p-4 text-center"><i
                            class="fas fa-paper-plane fs-1 text-center"></i></span>
                    <h1 class="heading1-top-mover fw-normal fs-2">Get a free estimate of your relocation expenses now!
                    </h1>
                    <p class="fs-5 text-center">With their first-rate services, let Allied Transportation Group relieve
                        you of
                        the hassles associated with cross-country relocation!</p>
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
                <h1 class="display-4 heading1-top-mover text-dark text-center">Testimonies from us</h1>

                <div class="col-md-6 col-12 px-3 py-5">
                    <div class="comments-card p-3 d-flex flex-column align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny px-4 py-2 text-center"><i
                                class="fa-brands fa-google fs-2 text-center"></i></span>
                        <h1 class=" heading1-top-mover border-bottom pb-2 mb-0 fw-normal fs-5 w-100"><i
                                class="fas fa-user fs-5 text-center me-2"></i>LeSoza</h1>
                        <p class="fs-5 my-3"><sup>
                                <i class="fas text-dark fa-quote-left fs-6 text-center me-1"></i>
                            </sup>
                            Simply said, these guys were the finest! I've moved before, and I've moved poorly before!
                            These Allied Transportation Group employees exhibited consistency throughout the whole
                            process!
                            In fact, I spent less than I was charged! This location is fantastic! There was no harm at
                            all.
                            It's my first positive review ever! ALLIED TRANSPORTATION GROUP, THANK YOU! You were a huge
                            assistance to my family and I.<sup>
                                <i class="fas text-dark fa-quote-right fs-6 text-center me-1"></i>
                            </sup></p>
                        <p class="w-100 text-dark"><i class="fas fa-clock fs-5 me-2"></i>22/12/2022</p>
                    </div>
                </div>
                <div class="col-md-6 col-12 px-3 py-5">
                    <div class="comments-card p-3 d-flex flex-column align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny px-4 py-2 text-center"><i
                                class="fa-brands fa-google fs-2 text-center"></i></span>
                        <h1 class=" heading1-top-mover border-bottom pb-2 mb-0 fw-normal fs-5 w-100"><i
                                class="fas fa-user fs-5 text-center me-2"></i>Sv.Smith</h1>
                        <p class="fs-5 my-3"><sup>
                                <i class="fas text-dark fa-quote-left fs-6 text-center me-1"></i>
                            </sup>
                            fantastic service a skilled staff. Pricing that is competitive, very effective. They
                            organised my relocation for the next day after I gave them a very short notice call. I
                            heartily endorse Allied Transportation Group for any relocation requirements.<sup>
                                <i class="fas text-dark fa-quote-right fs-6 text-center me-1"></i>
                            </sup></p>
                        <p class="w-100 text-dark"><i class="fas fa-clock fs-5 me-2"></i>22/12/2022</p>
                    </div>
                </div>
                <div id="top-quote-banner" class="d-flex flex-wrap justify-content-center">
                    <button class="sdg ms-0 mt-2 me-0 me-sm-3 call-btn">Add a Review</button>
                    <button class="sdg ms-0 mt-2 call-btn">See all Reviews</button>
                </div>
            </div>
        </div>
    </section>
    <section class="top-comp-sec d-flex justify-content-center align-items-center ptb-100"
        style="background: rgba(221 221 221);">
        <div class="container">
            <div class="row">
                <h1 class="heading1-top-mover text-center">The Process</h1>
                <div class="col-lg-4 col-md-6 col-12 px-3 py-5">
                    <div class="working-card p-3 d-flex flex-column align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny d-flex justify-content-center text-center"><i
                                class="fas fa-1 fs-4 text-center align-items-center d-flex"></i></span>
                        <h1 class=" heading1-top-mover text-center fw-normal fs-4 w-100">
                            Message Our Team</h1>
                        <p class="fs-5 my-3">
                            Get a free quotation from Allied Transportation Group by completing the form on our website
                            or by calling our business.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 px-3 py-5">
                    <div class="working-card p-3 d-flex flex-column align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny d-flex justify-content-center text-center"><i
                                class="fas fa-2 fs-4 text-center align-items-center d-flex"></i></span>
                        <h1 class=" heading1-top-mover text-center fw-normal fs-4 w-100">
                            Let's organise your move.
                        </h1>
                        <p class="fs-5 my-3">Leave it to our team of long distance movers to create a complete moving
                            strategy suited to your individual requirements.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 px-3 py-5">
                    <div class="working-card p-3 d-flex flex-column align-items-center position-relative bg-white">
                        <span class="badge service-badge bg-greeny d-flex justify-content-center text-center"><i
                                class="fas fa-3 fs-4 text-center align-items-center d-flex"></i></span>
                        <h1 class=" heading1-top-mover text-center fw-normal fs-4 w-100">
                            Enjoy the Joy of Movement</h1>
                        <p class="fs-5 my-3">Allow yourself to relax while taking in a stress-free moving experience
                            and a new beginning.</p>
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
                        <img src="{{ asset('assets/img/staticMovers/Allied_Logo_Positive.svg') }}" class="w-100"
                            alt="image">
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
                    <p class="fw-bold mb-0 text-dark fs-6">State Of Operation</p>
                    <p class="fs-5 lh-base d-flex flex-wrap">Alabama<span class="text-dark mx-2">|</span>Arkansas<span
                            class="text-dark mx-2">|</span>California<span
                            class="text-dark mx-2">|</span>Colorado<span
                            class="text-dark mx-2">|</span>Connecticut<span class="text-dark mx-2">|</span>D.C.<span
                            class="text-dark mx-2">|</span>Delaware<span class="text-dark mx-2">|</span>Florida<span
                            class="text-dark mx-2">|</span>Georgia<span class="text-dark mx-2">|</span>Idaho<span
                            class="text-dark mx-2">|</span>Illinois<span class="text-dark mx-2">|</span>Indiana<span
                            class="text-dark mx-2">|</span>Iowa<span class="text-dark mx-2">|</span>Kansas<span
                            class="text-dark mx-2">|</span>Kentucky<span class="text-dark mx-2">|</span>Louisiana<span
                            class="text-dark mx-2">|</span>Maine<span class="text-dark mx-2">|</span>Maryland<span
                            class="text-dark mx-2">|</span>Massachusetts<span
                            class="text-dark mx-2">|</span>Michigan<span class="text-dark mx-2">|</span>Minnesota<span
                            class="text-dark mx-2">|</span>Mississippi<span
                            class="text-dark mx-2">|</span>Missouri<span class="text-dark mx-2">|</span>Montana
                        Nebraska<span class="text-dark mx-2">|</span>Nevada<span class="text-dark mx-2">|</span>New
                        Hampshire<span class="text-dark mx-2">|</span>New Jersey<span
                            class="text-dark mx-2">|</span>New Mexico<span class="text-dark mx-2">|</span>New York
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 col-12 py-5 px-3">
                    <p class="fw-bold mb-0 text-dark fs-6">Company Address</p>
                    <p class="fs-5 lh-sm">West Palm Beach, FL 33401 1645 Palm Beach Lakes Boulevard, Suite 1200</p>
                    <p class="fw-bold mb-0 text-dark fs-6">Email</p>
                    <p class="fs-5 lh-sm">support@alliedtransportgroup.com</p>
                    <div id="top-quote-banner" class="d-flex flex-wrap">
                        <button class="sdg my-2 w-100 call-btn"><i class="me-2 fas fa-phone"></i>
                            866-311-2891</button>
                        <button class="sdg my-2 w-100 call-btn"><i class="me-2 fas fa-paper-plane"></i> Get a
                            Quote</button>
                    </div>
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
