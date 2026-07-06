@extends('layouts.app')
@section('title')
    Reliable Residential Movers – Your Trusted Relocation Partners
@endsection
@section('meta_description')
    Elevate your home relocation experience with our trusted listing of residential movers. From packing to settling in,
    discover expert services that ensure a stress-free move.
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/residential_movers.css') }}">
    <div class="residential-movers-main-banner">
        <div class="residential-movers-main-banner-item item-four">
            <div class="container">
                <div class="banner_layout">
                    <div class="banner_child">
                        <div class="row align-items-center ">
                            <div class="col-lg-8 col-12 justify-content-center align-items-center">
                                <div class="banner_header text-start ">
                                    <h1>
                                        Residential Movers
                                        <br>
                                    </h1>
                                    <div class="bread_crumb_section d-flex ">
                                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                    <i class="fa fa-home " aria-hidden="true"></i>
                                                    <a class="text-dark" href="#">Home</a>
                                                </li>
                                                <li class="breadcrumb-item active text-dark" aria-current="page">Residential
                                                    Movers
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <p>Moving made easy with our Residential movers! Our team provides efficient, reliable
                                        service to ensure a
                                        stress-free relocation experience.
                                    </p>

                                    <!-- <div class="banner-btn d-flex  align-items-center mt-4 new_banner_btn_cs">-->
                                    <!--    <a href="http://localhost:8000/company/top-movers" class="default-btn btn fs-4 d-block ">-->
                                    <!--        Top Movers-->
                                    <!--    </a>-->
                                    <!--</div>-->
                                </div>
                            </div>
                            <div class="col-lg-4 col-12 mt-0 d-lg-block d-none col-12 ">
                                <div class="w-100 mt-3" id="row_modal">
                                    <div class="container blue-shadow " style="background: #fff; ">
                                        <div class=" d-flex flex-column justify-content-center rounded-3 py-2">
                                            <div class=" my-2 d-flex flex-column justify-content-center">
                                                <h2 class="fs-5 mb-0 multi-step-heading text-center fw-bold">Free Moving
                                                    Quote</h2>
                                                <span class="field_mark text-center">Fields marked with an * are
                                                    required</span>
                                            </div>
                                            <div class=" d-flex flex-column my-3">
                                                <p class="mb-0 fs-14"
                                                    style="color: #000000e3; font-weight: 600; font-family: var(--para-family);">
                                                    City
                                                    You Are Moving From*</p>
                                                <div class="input-group">
                                                    <span class="input-group-text py-0">
                                                        <i class="bx bx-buildings"></i>
                                                    </span>
                                                    <input type="text"
                                                        class="zipfromsearch form-control ui-autocomplete-input"
                                                        value="" name="zip_from" maxlength="5" placeholder="Zip From"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <div class=" d-flex flex-column">
                                                <p class="mb-0 fs-14"
                                                    style="color: #000000e3; font-weight: 600; font-family: var(--para-family);">
                                                    City
                                                    You Are Moving To*</p>
                                                <div class="input-group">
                                                    <span class="input-group-text py-0">
                                                        <i class="bx bx-buildings"></i>
                                                    </span>
                                                    <input type="text"
                                                        class="ziptosearch form-control ui-autocomplete-input"
                                                        value="" name="zip_to" maxlength="5" placeholder="Zip To"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <div
                                                class=" d-flex flex-column align-items-center my-3
                                            my-3    ">
                                                <button type="button" id="Modal_Btn" data-bs-toggle="modal"
                                                    data-bs-target="#ModalForm"
                                                    class="sdg py-1 px-4 w-75 mt-0 justify-content-center">Next</button>
                                                <label class="discount_cost my-2 ">Save up to 25% on moving costs</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <section id="local_mover">
            <img src="{{ asset('assets/img/residential--movers.webp') }}" loading="eager" alt="local mover">

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mover_heading text-center">
                            <h1><span>Residential</span> <br> movers </h1>
                        </div>
                    </div>
                    <div class="col-12 state_form">
                        <div class="w-100 mt-3  d-none "
                            style="background: #ffffff8f;box-shadow: 0px 1px 14px #0072ff3b;border-radius:6px;" id="row_modal">
                            <div class="container">
                                <div class="row rounded-3 py-3">
                                    <div class="col-12  col-md-3 col-lg-3 my-2 d-flex flex-column justify-content-center">
                                        <h2 class="fs-4 mb-0 multi-step-heading text-start">GET
                                            MOVING QUOTE
                                        </h2>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3 d-flex flex-column">
                                        <p class="mb-0 fs-14 fw-bold" style="color: #363F39">City You Are Moving From </p>
                                        <div class="input-group">
                                            <span class="input-group-text py-0">
                                                <i class='bx bx-buildings'></i>
                                            </span>
                                            <input type="text" id=""
                                                class="zipfromsearch form-control form-control-md @error('zip_from') is-invalid @enderror"
                                                value="{{ old('zip_from') }}" name="zip_from" maxlength="5"
                                                placeholder="Zip From">
                                            @error('zip_from')
        <span class="invalid-feedback" role="alert">
                                                        <strong>Zip From is required</strong>
                                                    </span>
    @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3 d-flex flex-column">
                                        <p class="mb-0 fs-14 fw-bold" style="color: #363F39">City You Are Moving To
                                        </p>
                                        <div class="input-group">
                                            <span class="input-group-text py-0">
                                                <i class='bx bx-buildings'></i>
                                            </span>
                                            <input type="text" id=""
                                                class="ziptosearch form-control form-control-md @error('zip_to') is-invalid @enderror"
                                                value="{{ old('zip_to') }}" name="zip_to" maxlength="5" placeholder="Zip To">
                                            @error('zip_to')
        <span class="invalid-feedback" role="alert">
                                                        <strong>Zip To is required</strong>
                                                    </span>
    @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3 d-flex flex-column justify-content-end">
                                        <button type="button" id="Modal_Btn" data-bs-toggle="modal" href="#ModalForm"
                                            class="sdg py-1 px-4 w-100 mt-0">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="btn-canvas-Form" data-bs-toggle="modal" href="#ModalForm"
                            class="btn default-btn d-none py-2 my-0 fs-5 d-flex align-items-center text-center justify-content-center"><i
                                class='bx bx-calculator me-2'></i>Get Quote</button>
                        <div class="modal fade p-0" id="ModalForm" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content border-0 rounded-0">
                                    <div class="modal-header">
                                        <h2 class="fs-4 mb-0 multi-step-heading text-center">GET YOUR
                                            FREE
                                            MOVING QUOTE
                                        </h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#"
                                            class="company-show-form shadow-none py-2 px-0 px-md-3 border-0 bg-white rounded-0"
                                            method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                    <p class="mb-0 fs-14">First Name <span class="text-danger">*</span>
                                                    </p>
                                                    <div class="input-group">
                                                        <span class="input-group-text py-0">
                                                            <i class='bx bx-user-circle'></i>
                                                        </span>
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                            value="{{ old('name') }}" name="name" placeholder="First Name">
                                                        @error('name')
        <span class="invalid-feedback" role="alert">
                                                                    <strong>Name is required</strong>
                                                                </span>
    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                    <p class="mb-0 fs-14">Last Name <span class="text-danger">*</span>
                                                    </p>
                                                    <div class="input-group">
                                                        <span class="input-group-text py-0">
                                                            <i class='bx bx-user-circle'></i>
                                                        </span>
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                            value="{{ old('name') }}" name="name" placeholder="Last Name">
                                                        @error('name')
        <span class="invalid-feedback" role="alert">
                                                                    <strong>Name is required</strong>
                                                                </span>
    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                    <p class="mb-0 fs-14">City You Are Moving From <span class="text-danger">*</span>
                                                    </p>
                                                    <div class="input-group">
                                                        <span class="input-group-text py-0">
                                                            {{-- <i class='bx bx-buildings'></i> --}}
                                                            <img src="{{ asset('assets/img/icons/move_out.png') }}" width="90%" alt="zip_from">
                                                        </span>
                                                        <input type="text" id="zipFrom"
                                                            class="zipfromsearch form-control  @error('zip_from') is-invalid @enderror"
                                                            value="{{ old('zip_from') }}" name="zip_from" maxlength="5"
                                                            placeholder="Zip From" required>
                                                        @error('zip_from')
        <span class="invalid-feedback" role="alert">
                                                                    <strong>Zip From is required</strong>
                                                                </span>
    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                    <p class="mb-0 fs-14">City You Are Moving To <span class="text-danger">*</span>
                                                    </p>
                                                    <div class="input-group">
                                                        <span class="input-group-text py-0">
                                                            {{-- <i class='bx bx-buildings'></i> --}}
                                                            <img src="{{ asset('assets/img/icons/move_out.png') }}" width="90%" alt="zip_to">
                                                        </span>
                                                        <input type="text" id="zipTo"
                                                            class="ziptosearch form-control  @error('zip_to') is-invalid @enderror"
                                                            value="{{ old('zip_to') }}" name="zip_to" maxlength="5"
                                                            placeholder="Zip To" required>
                                                        @error('zip_to')
        <span class="invalid-feedback" role="alert">
                                                                    <strong>Zip To is required</strong>
                                                                </span>
    @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                    <p class="mb-0 fs-14">When do you expect to move <span
                                                            class="text-danger">*</span>
                                                    </p>
                                                    <div class="input-group">
                                                        <span class="input-group-text py-0">
                                                            <i class='bx bx-calendar-week'></i>
                                                        </span>
                                                        <input type="text" id="moveDate"
                                                            class="form-control @error('date') is-invalid @enderror"
                                                            value="{{ old('date') }}" name="date" placeholder="Moving Date">
                                                        @error('date')
        <span class="invalid-feedback" role="alert">
                                                                    <strong>Date is required</strong>
                                                                </span>
    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                    <p class="mb-0 fs-14">Move Type <span class="text-danger">*</span></p>
                                                    <div class="input-group">
                                                        <span class="input-group-text py-0">
                                                            <i class='bx bx-package'></i>
                                                        </span>
                                                        <select class="form-select @error('move_size') is-invalid @enderror"
                                                            name="move_size" id="move_size" aria-label="Default select example">
                                                            <option class="" selected value="{{ old('move_size') }}">
                                                                {{ old('move_size') != '' ? old('move_size') : ' Select Move Size ' }}
                                                            </option>
                                                            <option value="4 Bedroom Home">4 Bedroom Home
                                                            </option>
                                                            <option value="3 Bedroom Home">3 Bedroom Home
                                                            </option>
                                                            <option value="2 Bedroom Home">2 Bedroom Home
                                                            </option>
                                                            <option value="1 Bedroom Home">1 Bedroom Home
                                                            </option>
                                                            <option value="Studio">Studio</option>
                                                            <option value="Office Move">Office Move</option>
                                                            <option value="Commercial Move">Commercial Move
                                                            </option>
                                                        </select>
                                                        @error('move_size')
        <span class="invalid-feedback" role="alert">
                                                                    <strong>Move size is required</strong>
                                                                </span>
    @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                    <p class="mb-0 fs-14">Email <span class="text-danger">*</span>
                                                    </p>
                                                    <div class="input-group">
                                                        <span class="input-group-text py-0">
                                                            <i class='bx bx-envelope'></i>
                                                        </span>
                                                        <input type="text"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            value="{{ old('email') }}" name="email" placeholder="Email">
                                                        @error('email')
        <span class="invalid-feedback" role="alert">
                                                                    <strong>Email is required</strong>
                                                                </span>
    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                    <p class="mb-0 fs-14">Phone Number <span class="text-danger">*</span></p>
                                                    <div class="input-group">
                                                        <span class="input-group-text py-0">
                                                            <i class='bx bx-phone'></i>
                                                        </span>
                                                        <input type="text"
                                                            class="form-control @error('phone_no') is-invalid @enderror"
                                                            value="{{ old('phone_no') }}" name="phone_no" placeholder="Phone No" id="phone_no"
                                                            oninput="formatPhoneNumber(this)" maxlength="16">
                                                        @error('phone_no')
        <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>Phone No. format must be
                                                                        (xxx) xxx - xxxx</strong>
                                                                </span>
    @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="my-2 d-flex align-items-center text-center justify-content-center  ">
                                                <button type="submit"
                                                    class="btn sdg py-2 my-0 fs-5 d-flex align-items-center text-center justify-content-center">
                                                    <i class='bx bx-log-in-circle me-2'></i>
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    <section id="movers_card" class="mt-sm-5 mt-4">
        <div class="container">
            <div class="row">
                {{-- <div class="col-12 text-center text-capitalize">
                    <h2 class="local_subheading">Residential Movers in USA :12</h2>
                </div> --}}
                <div class="col-12 mt-3">
                    <p>
                        Managing the complications of a residential move is tough, so opting for a reliable residential
                        moving company is important if you want a smooth transition. Here at My Moving Journey, we strive to
                        make your relocation as simple as possible by offering insights into the top-notch residential
                        moving services.

                    </p>
                    <p>
                        Whether you are expanding to a nearby area or moving within the same neighborhood, our structured
                        information will assist you in selecting the best residential moving experts according to your
                        requirements. Connect with the most reliable experts who provide you with a guarantee for a smooth
                        and stress-free relocation.

                    </p>
                </div>
            </div>

        </div>
    </section>
    <section id="residential_movers_data">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Criteria of a Residential Move

                    </h2>
                    <p class="mb-0">Shifting household items into any apartment or house is considered a residential
                        move. Residential moving is less hectic than commercial moving as it only requires a few helping
                        hands.

                    </p>
                    <p class="mb-1">Your move will consider residential if:

                    </p>
                    <ul>
                        <li>
                            Your moving quotes are based on the size of the project.

                        </li>
                        <li>
                            If you are only moving your apartments, house, or any other residential properties,

                        </li>
                        <li>
                            If your move is simpler and more subtle.

                        </li>

                    </ul>
                    <h2>Characteristics of a Top Residential Moving Company
                    </h2>
                    <p>
                        Selecting a reliable residential moving company is important for a hassle-free and smooth
                        relocation. Understanding the important characteristics of a trustworthy residential moving company
                        that ensures a hassle-free relocation is important.
                    </p>
                    <ul>
                        <li>
                            <span class="fw-bold">Insurance Policy:
                            </span>Residential moving companies provide insurance coverage and are liable for any damage to
                            ensure that your assets are safe in case of any mishap.

                        </li>
                        <li>
                            <span class="fw-bold">Fair Rates:
                            </span>Before planning your relocation, always trust professionals because they can provide
                            crystal-clear plans with costs upfront to save future hassles.
                        </li>
                        <li>
                            <span class="fw-bold">Reliability:
                            </span> Labor working with residential movers are well-trained. You can rely on them for your
                            surety regarding your belongings.
                        </li>
                        <li>
                            <span class="fw-bold">Resilience:
                            </span> Residential movers are corporative as they accommodate changes in your moving plans and
                            schedules to compensate for future challenges.
                        </li>
                        <li>
                            <span class="fw-bold">Storage facility:
                            </span>Residential movers provide a storage facility during your move. So that you can store
                            your extra belongings there during your relocation.
                        </li>
                    </ul>
                    <h2>
                        Residential Movers- Average Cost Analysis
                    </h2>
                    <p>The cost of hiring residential movers is based on different factors, including the distance and size
                        of the relocation you choose and the needed services. But a typical average cost for a residential
                        move is around $2000 to $5600.
                    </p>
                    <p>
                        It is essential to consider that these average costs are derived from the customer's feedback on My
                        Moving Journey and may differ from the actual quotes from the companies. You must select multiple
                        quotes from different residential moving companies to ensure accurate estimates.
                    </p>
                    <h2>
                        Factors Impacting Residential Movers Cost
                    </h2>
                    <p>
                        Before considering your residential move, remember that some factors can make a difference in your
                        transition. Below are some of them mentioned:
                    </p>
                    <ul class="factors">
                        <li>
                            <span class="fw-bold">Taxes:
                            </span>Always expect a tax tacked on when you prepare for a move. Taxes depend on the rates in
                            your area; they could be on administration.
                        </li>
                        <li>
                            <span class="fw-bold">Fee:
                            </span>Make sure to pay your fee on time, as companies can charge a fee for late payments.

                        </li>
                        <li>
                            <span class="fw-bold">Insurance:
                            </span>Ensure the company has adequate insurance policies to tackle any future hassle and avoid
                            chaos.
                        </li>
                        <li>
                            <span class="fw-bold">Size:
                            </span>If your move size is large, you pay more money, but if it is according to the usual
                            size, you might pay less.
                        </li>
                        <li>
                            <span class="fw-bold">Mileage:
                            </span>Your cost depends upon the distance between your current location and the one you are
                            shifting to. Lower the distance, lower the cost and vice versa.

                        </li>
                    </ul>
                    <h2>Reasons To Choose Residential Movers
                    </h2>
                    <p>
                    <p>
                        Selecting residential movers can provide you with certainty during your relocation, and the
                        proficiency in the work of those professionals can lead you to resume your ritual as soon as
                        possible. Some of the reasons mentioned can help you opt for your desired commercial movers.
                    <p>
                    </p>
                    <ul class="Reasons">
                        <li>
                            <span class="fw-bold">Expertise:
                            </span>Residential movers are well-trained in relocating and have experience and expertise in
                            handling all kinds of logistics.
                        </li>
                        <li>
                            <span class="fw-bold">Customized Services:
                            </span>Residential movers offer customized services according to your requirements to meet your
                            requirements.
                        </li>
                        <li>
                            <span class="fw-bold">Proficiency:
                            </span>Well-trained residential experts can perform tasks efficiently, from packing to
                            streamlining your belongings.
                        </li>
                        <li>
                            <span class="fw-bold">Less Risk:
                            </span>Residential movers are trained to handle every challenge and risk during your move to
                            avoid damage.
                        </li>
                        <li>
                            <span class="fw-bold">Peace of mind:
                            </span> Residential moving is tough, but you can lay down stress-free with reliable movers as
                            they handle everything professionally.
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </section>
@endsection
