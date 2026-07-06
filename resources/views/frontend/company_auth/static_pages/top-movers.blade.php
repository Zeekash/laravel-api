<!doctype html>
<html lang="en">
    
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
<link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300;400&display=swap" rel="stylesheet">
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<title>My Moving Journey</title>
<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.webp') }}">

<section class="static-bg-clr">
    <div class="w-100 bg-white">
        <div class="container">
            <nav>
                <div class="logo w-100 d-flex justify-content-center">
                    <a href="{{ url('/') }}" class=" d-flex py-1 justify-content-center">
                        <img src="{{ asset('assets/img/logo.webp') }}" style="width: 14em;" alt="image">
                    </a>
                </div>
            </nav>
        </div>
    </div>
    <section class="top-mover-sec d-flex justify-content-center align-items-center my-5">
        <div class="container">
            <h1 class="fs-1 text-center text-white">For your moving day, make the greatest choice you can.</h1>
            <p class="fs-5 text-center text-white">According to the results of our extensive investigation, which was
                based on a number of characteristics, the following are the best movers for your particular needs.
                Contact reputable & licenced movers right now if you want to obtain the best available moving, packing,
                and storage services as well as quick moving quotes at affordable pricing.</p>
            <p class="fs-5 text-center text-white">The movers we rank pay our team, who is committed to finding movers
                that we think our readers will like. Additionally, we could get a small percentage of the sales if you
                click a link from a sponsored company.</p>
        </div>
    </section>
    <section class="top-comp-sec d-flex justify-content-center my-5 align-items-center">
        <div class="container">
            <div class="row justify-content-center mb-5 card-top-movers px-0 bg-white">
                <div class="fs-2 text-white upper-navbar w-100">#1</div>
                <div class="col-md-12 col-xl-3 ps-0">
                    <div class="card shadow-0 border-0 h-100 rounded-3">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="row">
                                <div class="bg-image ripple rounded ripple-surface">
                                    <img src="{{ asset('assets/img/staticMovers/Allied_Logo_Positive.svg') }}"
                                        style="width: 100%" />
                                    <a href="{{ url('top-movers/allied-transportation-group') }}">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-9 px-0 shadow-none">
                    <div class="card col-2-top-mover">
                        <div class="card-body">
                            <div class="row d-flex flex-xl-row flex-lg-row flex-column-reverse">
                                <div class="col-md-12 col-lg-4 col-xl-4 my-3 border-2 border-start border-end">
                                    <div class="d-flex justify-content-center align-items-center flex-column">
                                        <div class="text-warning mb-0 me-0" style="font-size:2rem;">
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                        </div>
                                        {{-- <div>
                                            <p class="list-para text-dark">Over All Rating <span
                                                    class="text-danger fw-bold">(4.5)</span>
                                            </p>
                                        </div> --}}
                                    </div>
                                    <div class="d-flex flex-column mt-2">
                                        <a class="w-100" href="{{ url('top-movers/allied-transportation-group') }}">
                                            <button class="w-100 default-btn rounded-0 fs-5 py-2"
                                                style="letter-spacing: 1px;" type="button">Visit
                                                Site</button>
                                        </a>
                                        <button class="btn sdg py-2 px-0 fs-6 rounded-0 fw-bold" type="button">
                                            Call Now : 123-123-123
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-8 col-xl-8 d-flex flex-column justify-content-center">
                                    <ul class="px-3">
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Long-distance moving expertise
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Storage, pickup, and redelivery for 30 days.
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Plans for full-service packing.
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Continuous customer service.
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Certified & Trained Movers
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-5 card-top-movers-2 px-0 bg-white">
                <div class="fs-2 text-dark upper-navbar-top w-100">#2</div>
                <div class="col-md-12 col-xl-3 ps-0">
                    <div class="card shadow-0 border-0 h-100 rounded-3">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="row">
                                <div class="bg-image ripple rounded ripple-surface">
                                    <img src="{{ asset('assets/img/staticMovers/logo2.png') }}"
                                        style="width: 180px" />
                                    <a href="{{ url('top-movers/cross-country-moving-llc') }}">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-9 px-0 shadow-none">
                    <div class="card col-2-top-mover">
                        <div class="card-body">
                            <div class="row d-flex flex-xl-row flex-lg-row flex-column-reverse">
                                <div class="col-md-12 col-lg-4 col-xl-4 my-3 border-2 border-start border-end">
                                    <div class="d-flex justify-content-center align-items-center flex-column">
                                        <div class="text-warning mb-0 me-0" style="font-size:2rem;">
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                        </div>
                                        {{-- <div>
                                            <p class="list-para text-dark">Over All Rating <span
                                                    class="text-danger fw-bold">(4.5)</span>
                                            </p>
                                        </div> --}}
                                    </div>
                                    <div class="d-flex flex-column mt-2">
                                        <a class="w-100" href="{{ url('top-movers/cross-country-moving-llc') }}">
                                            <button class="w-100 default-btn rounded-0 fs-5 py-2"
                                                style="letter-spacing: 1px;" type="button">Visit
                                                Site</button>
                                        </a>
                                        <button class="btn sdg py-2 px-0 fs-6 rounded-0 fw-bold" type="button">
                                            Call Now : 123-123-123
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-8 col-xl-8 d-flex flex-column justify-content-center">
                                    <ul class="px-3">
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Complete door-to-door service
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                As soon as 24 hours for pick-ups.
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Authorized, Bonded, and Insured
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Family-run and owned business.
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Price matching to defeat a plan
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-5 card-top-movers-2 px-0 bg-white">
                <div class="fs-2 text-dark upper-navbar-top w-100">#3</div>
                <div class="col-md-12 col-xl-3 ps-0">
                    <div class="card shadow-0 border-0 h-100 rounded-3">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="row">
                                <div class="bg-image ripple rounded ripple-surface">
                                    <img src="{{ asset('assets/img/staticMovers/Pan-Transit-Van-Lines-Transparent.png.webp') }}"
                                        style="width: 180px" />
                                    <a href="{{ url('top-movers/pen-transit-van-lines') }}">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-9 px-0 shadow-none">
                    <div class="card col-2-top-mover">
                        <div class="card-body">
                            <div class="row d-flex flex-xl-row flex-lg-row flex-column-reverse">
                                <div class="col-md-12 col-lg-4 col-xl-4 my-3 border-2 border-start border-end">
                                    <div class="d-flex justify-content-center align-items-center flex-column">
                                        <div class="text-warning mb-0 me-0" style="font-size:2rem;">
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                        </div>
                                        {{-- <div>
                                            <p class="list-para text-dark">Over All Rating <span
                                                    class="text-danger fw-bold">(4.5)</span>
                                            </p>
                                        </div> --}}
                                    </div>
                                    <div class="d-flex flex-column mt-2">
                                        <a class="w-100" href="{{ url('top-movers/pen-transit-van-lines') }}">
                                            <button class="w-100 default-btn rounded-0 fs-5 py-2"
                                                style="letter-spacing: 1px;" type="button">Visit
                                                Site</button>
                                        </a>
                                        <button class="btn sdg py-2 px-0 fs-6 rounded-0 fw-bold" type="button">
                                            Call Now : 123-123-123
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-8 col-xl-8 d-flex flex-column justify-content-center">
                                    <ul class="px-3">
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Long-Distance & Interstate Movers with Certification.
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Estimates Openly Available Starting at $1600.
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Corporate Relocation Services.
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Delivery and Pickup from Door to Door.
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Services for packing and unpacking.
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="top-comp-sec d-flex justify-content-center align-items-center my-5">
        <div class="container">
            <h1 class="fs-1">Who We Are</h1>
            <p class="fs-5 text-dark">We aim to minimise and eliminate all potential dangers connected to hiring long
                distance
                movers. We invested our time and energy into identifying and preventing possibly negative moving
                experiences while also making suggestions for those movers that genuinely stand out for their superior
                services and attentive customer care.</p>
            <p class="fs-5 text-dark">Our website gives users the chance to look up and exchange evaluations for
                several
                reputable moving firms operating around the country. Moving firms, on the other hand, may make their own
                profiles and advertise the services they provide. Finally, if you are simply seeking for some useful and
                insightful moving-related knowledge, our years of business expertise have allowed us to amass a wealth
                of knowledge that is given on a regular basis, from moving guides to useful tips and general
                information.</p>
        </div>
    </section>
    <section class="top-comp-sec d-flex justify-content-center align-items-center ptb-50 bg-white">
        <div class="container">
            <div class="row justify-content-center mb-5 card-top-movers px-0 bg-white">
                <div class="fs-2 text-white upper-navbar w-100">Best Overall</div>
                <div class="col-md-12 col-xl-3 ps-0">
                    <div class="card shadow-0 border-0 h-100 rounded-3">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="row">
                                <div class="bg-image ripple rounded ripple-surface">
                                    <img src="{{ asset('assets/img/staticMovers/Allied_Logo_Positive.svg') }}"
                                        style="width: 100%" />
                                    <a href="{{ url('top-movers/allied-transportation-group') }}">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-9 px-0 shadow-none">
                    <div class="card col-2-top-mover">
                        <div class="card-body">
                            <div class="row d-flex flex-xl-row flex-lg-row flex-column-reverse">
                                <div class="col-md-12 col-lg-4 col-xl-4 my-3 border-2 border-start border-end">
                                    <div class="d-flex justify-content-center align-items-center flex-column">
                                        <div class="text-warning mb-0 me-0" style="font-size:2rem;">
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                            <i class="fas fa-star" style="color:#ff9800;"></i>
                                        </div>
                                        {{-- <div>
                                            <p class="list-para text-dark">Over All Rating <span
                                                    class="text-danger fw-bold">(4.5)</span>
                                            </p>
                                        </div> --}}
                                    </div>
                                    <div class="d-flex flex-column mt-2">
                                        <a class="w-100" href="{{ url('top-movers/allied-transportation-group') }}">
                                            <button class="w-100 default-btn rounded-0 fs-5 py-2"
                                                style="letter-spacing: 1px;" type="button">Visit
                                                Site</button>
                                        </a>
                                        <button class="btn sdg py-2 px-0 fs-6 rounded-0 fw-bold" type="button">
                                            Call Now : 123-123-123
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-8 col-xl-8 d-flex flex-column justify-content-center">
                                    <ul class="px-3">
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Long-distance moving expertise
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Storage, pickup, and redelivery for 30 days.
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Plans for full-service packing.
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Continuous customer service.
                                            </p>
                                        </li>
                                        <li class="list-unstyled d-flex align-items-center">
                                            <i class="fas fa-circle-check me-2 text-center icon-top-tick"></i>
                                            <p class="list-para text-dark fs-5 fw-normal lh-base mb-2 mb-md-0">
                                                Certified & Trained Movers
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class=" bg-white border-top">
        <div class="container my-5">
            <ul class="d-flex justify-content-between flex-wrap align-items-center">
                <li class="list-unstyled fs-6">
                    <a href="{{ route('terms-of-service') }}">Terms & Conditions</a>
                </li>
                <li class="list-unstyled fs-6">
                    <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
                </li>
                <li class="list-unstyled fs-6 w-auto logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/img/logo.webp') }}" class="py-3" alt="image">
                    </a>
                </li>
                <li class="list-unstyled fs-6">
                    <p class="text-disable">© 2022 mymovingjourney.com All rights reserved.</p>
                </li>
            </ul>
        </div>
    </footer>
</section>
</html>
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

<script>
    $(document).ready(function() {
        $('#table-of-review').DataTable({
            searching: false,
            responsive: true,
            "bLengthChange": false,
            "bInfo": false,
            fixedColumns: true,
            fixedColumnsleft: 2,
            "language": {
                "paginate": {
                    "previous": "<",
                    "next": ">"
                }
            }
        });

    });
</script>

<script src="{{ asset('assets/js/star.js') }}"></script>
