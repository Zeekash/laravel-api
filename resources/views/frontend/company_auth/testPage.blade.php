@extends('layouts.app')
@section('title', 'Test Page')
@section('head')
    <meta name="robots" content="noindex, nofollow">
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/test.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* .FirstSection .container {
                                        width: 1020px !important;
                                    } */
    </style>
    <section class="FirstSection py-3">
        <div class="container">
            <div class="baneer_content">
                <div class="row">
                    <div class="col-lg-9">
                        <ol class="breadcrumb p-0 m-0 d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Popular Routes</a></li>
                            <li class="breadcrumb-item"><a href="#">AZ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Phoenix to Austin
                            </li>
                        </ol>
                        <h1 class="my-3">($3,700 to $11,100) Phoenix to Austin Movers </h1>
                        <div class=" d-flex justify-content-start flex-wrap pb-3 mt-3">
                            <div class=" d-flex justify-content-start align-items-center">
                                <img height="48" width="48" class="byline__avatar"
                                    src="https://secure.gravatar.com/avatar/0d234d2af250107fe5dc6b80a8f1ee90?s=96&amp;d=mm&amp;r=g"
                                    alt="Ryan Carrigan" loading="lazy" style="border-radius: 50%; mergin-left: 10px;">
                                <p class="ps-0 mb-0 mt-0 ms-3" style="line-height: 20px;"><strong><a href="#"
                                            class="text-decoration-none"
                                            style="font-family: var(--para-family); font-weight: 500; font-size: 16px;">
                                            Super Admin</a></strong><br>
                                    <span
                                        style="font-size: 12px; font-family: var(--para-family); line-height: 0px !important;">Updated:
                                        Nov 13, 2024</span><br>
                                    <span
                                        style="font-size: 12px; font-family: var(--para-family); line-height: 0px !important;">8
                                        min read
                                    </span>
                                    <!--                                <span-->
                                    <!--                            style="font-size: 12px;-->
                                         <!--color: #6d655f;">8-->
                                    <!--                            min read</span> -->
                                </p>
                                <!--<p class="updated text-start"></p>-->
                            </div>

                        </div>
                        <p><strong>Quick answer:</strong> The average cost of moving from Phoenix to Austin ranges from
                            $3,700 to
                            $11,100 but can be
                            as low as $3,700 The cost will vary according to the amount of stuff you are moving, your moving
                            date,
                            and the services you get from the movers.

                        </p>

                    </div>
                    <div class="col-lg-12">
                        <form action="" class="mt-2 main_banner_form" style="">
                            <h3 class="mb-4" style="font-family: var(--para-family); font-size: 18px; font-weight: 700;">
                                <span style="font-family: var(--para-family); font-weight: 900; color:#116087;">Save Up to
                                    30% on Moving Costs,</span> Let the Experts Handle the Rest!
                            </h3>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input_outer">
                                        <label for="external_zipfrom">Moving from*</label>
                                        <input type="text" id="external_zipfrom" name="moving-from"
                                            class="zipfromsearch pac-target-input" placeholder="City Name or Zip Code"
                                            autocomplete="off">
                                        <span id="external_zipfrom_error" class="error-message hidden"
                                            style="color:red; font-size:12px; hidden"></span>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-md-0 mt-2">
                                    <div class="input_outer">
                                        <label for="external_ziptosearch">Moving to*</label>
                                        <input type="text" id="external_ziptosearch" name="moving-to"
                                            class="ziptosearch pac-target-input" placeholder="City Name or Zip Code"
                                            autocomplete="off">
                                        <span id="external_ziptosearch_error" class="error-message hidden"
                                            style="color:red; font-size:12px;"></span>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-md-0 mt-2">
                                    <div class="input_outer">
                                        <label for="external_ziptosearch">Move Size</label>
                                        <select class="size-select w-100" name="move_size" id="move_size"
                                            aria-label="Move Size">
                                            <option selected="" value="">
                                                Select Move Size
                                            </option>
                                            <option value="4 Bedroom Home">4 Bedroom Home</option>
                                            <option value="3 Bedroom Home">3 Bedroom Home</option>
                                            <option value="2 Bedroom Home">2 Bedroom Home</option>
                                            <option value="1 Bedroom Home">1 Bedroom Home</option>
                                            <option value="Studio">Studio</option>
                                            <option value="Office Move">Office Move</option>
                                            <option value="Commercial Move">Commercial Move</option>
                                        </select>
                                        <span id="external_ziptosearch_error" class="error-message hidden"
                                            style="color:red; font-size:12px;"></span>
                                    </div>
                                </div>

                                <div class="col-md-3 px-lg-1 px-md-0 mt-md-0 mt-2">
                                    <a href="#ModalForm" data-bs-toggle="modal">
                                        <button class="get_quote" type="button">
                                            Get Free Quote
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section>
        <div class="container" style="max-width: 1020px !important;">
            <div class="middle_content">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="mb-2">The Best Phoenix to Austin Full-Service Movers</h2>
                        <p>Moving your entire home from Phoenix to Austin takes a lot of work. The distance between the two
                            cities is more than 1,006 miles. Hiring a moving company streamlines the whole moving process.

                        </p>
                        <div class="col-lg-10 mx-auto my-5 d-none">
                            <div class="new_card p-sm-2 p-2">
                                <div class="card-body d-sm-flex align-items-center">
                                    <div class="content_div">
                                        <p>Taking the opposite route? Just check out our <strong><a href="">Austin
                                                    to Phoenix</a></strong> guide and get
                                            everything sorted without the stress.

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="mb-2">Explore More Moving Companies from Phoenix to Austin
                    </h2>
                    <p>If you're looking to explore additional moving companies from Phoenix to Austin, check out our
                        extended list below. These options will help you find the perfect mover for your needs. </p>
                    <p>Here are the moving companies serving Phoenix to Austin.</p>
                    <div class="col-lg-6">
                        <a href="">
                            <div class="company_card my-4">

                                <!-- Company Logo -->
                                <div class="company_logo" style="">
                                    <img src="https://mygoodmovers.com/companies/logo/mypromovers-rockville.webp"
                                        alt="Company Logo" style="width: 100%;">
                                </div>

                                <!-- Company Info -->
                                <div class="Company_Info">
                                    <!-- Company Name + Verified -->
                                    <div class="display-flex align-items-center">
                                        <h3>Birdseye Transport &
                                            Logistics</h3>
                                        <span>
                                            <img src="https://mymovingjourney.com/assets/img/MMJ_Verified_new.svg"
                                                style="width: 24px; text" alt="verified-badge">
                                        </span>
                                    </div>


                                    <div class="Reviews">
                                        ⭐⭐⭐⭐⭐ <span style="font-size: 0.8rem;">(4.8)</span>
                                        <p> <span>45 Reviews</span></p>
                                    </div>

                                    <div class="d-flex justify-content-end align-items-center mt-2">
                                        <p class="mb-0 " style="width: max-content"> <strong>US DOT:</strong><span
                                                class="dot">3798698</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="">
                            <div class="company_card  my-4">

                                <!-- Company Logo -->
                                <div class="company_logo" style="">
                                    <img src="https://mygoodmovers.com/companies/logo/mypromovers-rockville.webp"
                                        alt="Company Logo" style="width: 100%;">
                                </div>

                                <!-- Company Info -->
                                <div class="Company_Info">
                                    <!-- Company Name + Verified -->
                                    <div class="display-flex align-items-center">
                                        <h3>Birdseye Transport &
                                            Logistics</h3>
                                        <span>
                                            <img src="https://mymovingjourney.com/assets/img/MMJ_Verified_new.svg"
                                                style="width: 24px; text" alt="verified-badge">


                                        </span>
                                    </div>


                                    <div class="Reviews">
                                        ⭐⭐⭐⭐⭐ <span style="font-size: 0.8rem;">(4.8)</span>
                                        <p> <span>45 Reviews</span></p>
                                    </div>

                                    <div class="d-flex justify-content-end align-items-center mt-2">
                                        <p class="mb-0 " style="width: max-content"> <strong>US DOT:</strong><span
                                                class="dot">3798698</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="my-4">
                        <h2>How Much Does It Cost To Move From Phoenix to Austin?</h2>
                        <p>We have calculated the average cost of moving from Phoenix to Austin by reviewing this route's
                            moving
                            reviews. The moving cost from Phoenix to Austin ranges from $3,700 to $11,100. This is a rough
                            estimate for an average distance of 1,006 miles between both cities.</p>
                        <div class="custom-table-wrapper">
                            <table class="custom-table">
                                <thead>
                                    <tr>
                                        <th>New York</th>
                                        <th>Florida</th>
                                        <th>California</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Average rent cost</td>
                                        <td>$1,444</td>
                                        <td>$1,856</td>
                                    </tr>
                                    <tr>
                                        <td>Average home cost</td>
                                        <td>$392,176</td>
                                        <td>$771,057</td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>


    <script src="{{ asset('assets/js/test2.js') }}"></script>


@endsection
