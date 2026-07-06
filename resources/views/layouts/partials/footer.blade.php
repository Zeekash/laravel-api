    <link rel="stylesheet" href="{{ asset('assets/css/footer_blade.css') }}">
    {{-- <style>
        .more_location {
            background-color: #116087;
            color: white;
            font-family: var(--para-family);
            font-weight: 600;
            border: none;
            padding: 10px 30px;
            letter-spacing: 0.5px;
            margin-bottom: 80px;
        }

        .copyright_container.mt-2 {
            padding-top: 20px;
            border-top: 1px solid #116087;
            margin-top: 30px !important;
        }
    </style> --}}
    {{-- <div class="footer-area pb-0 footer_widget">
        <div class="container mt-3 mb-3">
            <div class="row">

                <div class="col-lg-3 col-6 pt-2 ms-1 ms-sm-0 mb-lg-0 mb-3 mt-sm-0 mt-2 ">
                   <div style=" font-size: 22px; text-transform: capitalize; font-weight: 600; color: #09171a !important; font-family: 'Merriweather'; ">Movers</div>
                    <ul class="list-unstyled">
                        <li><a href="https://mymovingjourney.com/movers">Movers In USA</a></li>
                        <li><a href="https://mymovingjourney.com/resource/best-long-distance-moving-companies">Long
                                Distance Movers</a></li>
                        <li><a href="https://mymovingjourney.com/resource/best-local-moving-companies">Local Movers </a>
                        </li>
                        <li><a href="https://mymovingjourney.com/moving-routes">Movers By Route</a></li>
                    </ul>
                    <div class="mt-3" style=" font-size: 22px; text-transform: capitalize; font-weight: 600; color: #09171a !important; font-family: 'Merriweather'; ">Our Blog</div>
                    <ul class="list-unstyled">
                        <li><a href="https://mymovingjourney.com/category/packing-tips">Packing Tips</a></li>
                        <li><a href="https://mymovingjourney.com/category/moving-guide">Moving Guide</a></li>
                        <li><a href="https://mymovingjourney.com/category/moving-resources">Moving Resources </a></li>
                        <li><a href="https://mymovingjourney.com/category/storage-guide">Storage Guide</a></li>
                        <li><a href="https://mymovingjourney.com/category/city-guide">City Guide</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6 pt-2 mb-lg-0 mb-3 ">
                   <div style=" font-size: 22px; text-transform: capitalize; font-weight: 600; color: #09171a !important; font-family: 'Merriweather'; ">Links</div>
                    <ul class="list-unstyled">
                        <li><a href="https://mymovingjourney.com/">home</a></li>
                        <li><a href="{{ route('about-us') }}">about us</a></li>
                        <li><a data-bs-toggle="modal" href="#ModalForm">Free moving quote</a></li>
                        <li><a href="https://mymovingjourney.com/quotation">Moving Cost
                                Calculator</a></li>
                        <li class="nav-item second {{ Request::path() == 'moving-resources' ? 'active' : '' }}">
                            <a href="{{ route('posts.index') }}">Blogs</a>
                        </li>
                        <li class="nav-item second {{ Request::path() == 'contact' ? 'active' : '' }}">
                            <a href="https://mymovingjourney.com/contact-us">Contact Us</a>
                        </li>
                        <li><a href="{{ route('company.write-review') }}">Write a review</a></li>
                        <li><a href={{ route('sitemap') }}>Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-6 pt-2 mb-lg-0 mb-3 ">
                   <div style=" font-size: 22px; text-transform: capitalize; font-weight: 600; color: #09171a !important; font-family: 'Merriweather'; ">Business</div>
                    <ul class="list-unstyled">
                        <li><a href="/login">Mover Login</a></li>
                        <li><a href="/company/register">List Your Mover</a></li>
                        <li>
                            <div class="company_email mt-4">
                               <div style=" font-size: 22px; text-transform: capitalize; font-weight: 600; color: #09171a !important; font-family: 'Merriweather'; ">For Inquiry</div>
                                <a href="mailto:contact@mymovingjourney.com" class="fw-semibold">Email Us</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div
                    class="col-lg-4 col-md-6 col-12 mb-lg-0 mb-3 d-flex flex-column align-items-lg-end align-items-center order-first order-sm-last">
                    <a class="footer_img" href="{{ url('/') }}">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="image">
                    </a>
                    <p class="footer_description text-sm-end text-center">
                        You can trust My Moving Journey to help you find a reputable and reliable moving company, so you
                        can experience a stress-free move. We have made it easy for you.
                    </p>

                    <div class="d-flex justify-content-start mt-2">
                        <div class="social">
                            <ul class="d-flex social_links">
                                <li class="m-0">
                                    <a href="https://www.facebook.com/people/My-Moving-Journey/100091532866550/"
                                        aria-label="facebook" class="facebook" target="_blank"
                                        rel="noopener noreferrer">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="m-0">
                                    <a href="https://x.com/mymovingjourney" aria-label="twiter" class="twitter"
                                        target="_blank" rel="noopener noreferrer">
                                        <i class='fab fa-twitter'></i>
                                    </a>
                                </li>
                                <li class="m-0">
                                    <a href="https://www.pinterest.com/mymovingjourneyUS/" aria-label="pinterest"
                                        class="pinterest" target="_blank" rel="noopener noreferrer">
                                        <i class='fab fa-pinterest'></i>
                                    </a>
                                </li>
                                <li class="m-0">
                                    <a href="https://www.linkedin.com/company/mymovingjourney/" aria-label="linkedin"
                                        class="linkedin" target="_blank" rel="noopener noreferrer">
                                        <i class='fab fa-linkedin'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('company.company-search') }}" class="more_location rounded-pill">Looking For
                            Movers?</a>
                    </div>
                </div>

            </div>

            <footer>
                <div class="copyright_container mt-2 pb-lg-0 pb-5   ">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6 col-12 text-md-start text-center">
                            <p class="all_copyright">
                                Copyright <span id="year"></span> MyMovingJourney.com. All Rights Reserved.
                            </p>
                        </div>
                        <div class="col-md-6 col-12 mt-md-0 mt-2 text-md-end text-center">
                            <a href="{{ route('privacy-policy') }}">
                                Privacy Policy
                            </a>
                            <span class="before_copyright">|</span>
                            <a href="{{ route('terms-of-service') }}">terms & services</a>
                        </div>
                    </div>
                </div>

            </footer>
        </div>
    </div> --}}
    <!-- Footer -->
    <div class="container pb-5">
        <div class="footer_wrap">
            <div class="pb-0 footer_widget">
                <div class="container mt-3 mb-3">
                    <div class="row">
                        <div
                            class="col-lg-4 col-md-6 col-12 mb-lg-0 mb-3 d-flex flex-column align-items-lg-start align-items-center">
                            <a class="footer_img" href="https://mymovingjourney.com">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="image">
                            </a>
                            <p class="footer_description text-sm-start text-center">
                                You can trust My Moving Journey to help you find a reputable and reliable moving
                                company, so you
                                can experience a stress-free move. We have made it easy for you.
                            </p>

                            <div class="d-flex justify-content-start mt-2">
                                <div class="social">
                                    <ul class="d-flex social_links list-unstyled p-0">
                                        <li class="m-0">
                                            <a href="https://www.facebook.com/mymovingjourney/" aria-label="facebook"
                                                class="facebook" target="_blank" rel="noopener noreferrer">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="m-0">
                                            <a href="https://x.com/mymovingjourney" aria-label="twiter" class="twitter"
                                                target="_blank" rel="noopener noreferrer">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="m-0">
                                            <a href="https://www.pinterest.com/mymovingjourneyUS/"
                                                aria-label="pinterest" class="pinterest" target="_blank"
                                                rel="noopener noreferrer">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>

                                        <li class="m-0">
                                            <a href="https://www.linkedin.com/company/mymovingjourney/"
                                                aria-label="linkedin" class="linkedin" target="_blank"
                                                rel="noopener noreferrer">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <a href="https://mymovingjourney.com/movers-list"
                                    class="more_location rounded-pill">Looking For Movers?</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pt-2  mb-lg-0 mb-3 mt-sm-0 mt-2 ">
                            <div
                                style=" font-size: 22px; text-transform: capitalize; font-weight: 600; color: #09171a !important; font-family: 'Merriweather'; ">
                                Movers</div>
                            <ul>
                                <li><a href="https://mymovingjourney.com/movers">Movers In USA</a></li>
                                <li><a href="https://mymovingjourney.com/resource/best-long-distance-moving-companies">Long
                                        Distance Movers</a>
                                </li>
                                <li><a href="https://mymovingjourney.com/resource/best-local-moving-companies">Local
                                        Movers </a></li>
                                <li><a href="https://mymovingjourney.com/moving-routes">Movers By Route</a></li>

                            </ul>
                            <div class="mt-3"
                                style=" font-size: 22px; text-transform: capitalize; font-weight: 600; color: #09171a !important; font-family: 'Merriweather'; ">
                                Our Blog</div>
                            <ul>
                                <li><a href="https://mymovingjourney.com/category/packing-tips">Packing Tips</a></li>
                                <li><a href="https://mymovingjourney.com/category/moving-guide">Moving Guide</a></li>
                                <li><a href="https://mymovingjourney.com/category/moving-resources">Moving Resources
                                    </a></li>
                                <li><a href="https://mymovingjourney.com/category/storage-guide">Storage Guide</a></li>
                                <li><a href="https://mymovingjourney.com/category/city-guide">City Guide</a></li>

                            </ul>
                        </div>
                        <div class="col-lg-3 col-6 pt-2 mb-lg-0 mb-3 mt-sm-0 mt-2">
                            <div
                                style=" font-size: 22px; text-transform: capitalize; font-weight: 600; color: #09171a !important; font-family: 'Merriweather'; ">
                                Links</div>
                            <ul>
                                <li><a href="https://mymovingjourney.com/">home</a></li>
                                <li><a href="{{ route('about-us') }}">about us</a></li>

                                <li><a data-bs-toggle="modal" href="#ModalForm">Free moving quote</a></li>
                                <li><a href="{{ route('company.cost-estimator') }}">Moving Cost
                                        Calculator</a></li>
                                <li class="nav-item second ">
                                    <a href="https://mymovingjourney.com/blogs">Blogs</a>
                                </li>
                                <li class="nav-item second ">
                                    <a href="https://mymovingjourney.com/contact-us">Contact Us</a>
                                </li>
                                <li><a href="https://mymovingjourney.com/company/write-review">Write a review</a></li>
                                <li><a href="https://mymovingjourney.com/sitemap">Sitemap</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-6 pt-2 mb-lg-0 mb-3 ">
                            <div
                                style=" font-size: 22px; text-transform: capitalize; font-weight: 600; color: #09171a !important; font-family: 'Merriweather'; ">
                                Business</div>
                            <ul>
                                <li><a href="/login">Mover Login</a></li>
                                <li><a href="/company/register">List Your Mover</a></li>
                                <li>
                                    <div class="company_email mt-4">
                                        <div
                                            style=" font-size: 22px; text-transform: capitalize; font-weight: 600; color: #09171a !important; font-family: 'Merriweather'; ">
                                            For Inquiry</div>
                                        <a href="mailto:contact@mymovingjourney.com"
                                            class="fw-semibold text-decoration-underline">Email Us</a>
                                    </div>
                                </li>
                            </ul>
                        </div>


                    </div>

                    <footer>
                        <div class="copyright_container mt-2 pb-lg-0 pb-2   ">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-6 col-12 text-md-start text-center">
                                    <p class="all_copyright">
                                        Copyright <span id="year">2025</span> MyMovingJourney.com. All Rights
                                        Reserved.
                                    </p>
                                </div>
                                <div class="col-md-6 col-12 mt-md-0 mt-2 text-md-end text-center">
                                    <a href="https://mymovingjourney.com/privacy-policy">
                                        Privacy Policy
                                    </a>
                                    <span class="before_copyright">|</span>
                                    <a href="https://mymovingjourney.com/terms-of-service">terms &amp; services</a>
                                </div>
                            </div>
                        </div>

                    </footer>
                </div>
            </div>
            <div class="section_bottom_header d-md-none d-block py-2">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="header_box mover_box d-flex justify-content-center align-items-center  py-1"
                                id="find_mover">
                                <div class="icon me-2">
                                    <i class="fa-solid fa-truck"></i>
                                </div>
                                <a href="https://mymovingjourney.com/movers-list"> find movers</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="get_quote mover_box" id="phone_quote_box">
                                <div data-bs-target="#modalForm" data-bs-toggle="modal"
                                    class="d-flex align-items-center justify-content-center py-1">
                                    <div class="icon me-2">
                                        <i class="fa-solid fa-calculator "></i>
                                    </div>
                                    <a style=" font-size: 14px;" href="#ModalForm" data-bs-toggle="modal">Moving Cost
                                        Calculator</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        x = new Date().getFullYear()
        document.getElementById("year").innerHTML = x;
    </script>
