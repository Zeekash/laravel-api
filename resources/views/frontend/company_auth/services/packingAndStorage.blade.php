@extends('layouts.app')
@section('title')
    Secure Packing and Storage Facilities - Safeguard Your Items with Expert Care
@endsection
@section('meta_description')
    Explore top packing and storage facilities on our platform, providing expert care to safeguard your belongings. Trust us
    to preserve and protect your possessions.
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/packing_and_storage.css') }}">
    <div class="packing-and-storage-main-banner">
        <div class="packing-and-storage-main-banner-item item-four">
            <div class="container">
                <div class="banner_layout">
                    <div class="banner_child">
                        <div class="row align-items-center ">
                            <div class="col-lg-8 col-12 justify-content-center align-items-center">
                                <div class="banner_header text-start ">
                                    <h1>
                                        Packing and Storage
                                        <br>
                                    </h1>
                                    <div class="bread_crumb_section d-flex ">
                                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                    <i class="fa fa-home " aria-hidden="true"></i>
                                                    <a class="text-dark" href="#">Home</a>
                                                </li>
                                                <li class="breadcrumb-item active text-dark" aria-current="page">Packing and
                                                    Storage
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <p>Moving made easy with our Packing and Storage services movers! Our team provides
                                        efficient, reliable service to ensure a
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
                                    <div class="container blue-shadow " style="background: #fff;">
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
            <img src="{{ asset('assets/img/packaging-storage.webp') }}" loading="eager" alt="local mover">

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mover_heading text-center">
                            <h1><span>Packing and Storage</span> <br> Facilities </h1>
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
                    <h2 class="local_subheading">Total Movers in USA :45</h2>
                </div> --}}
                <div class="col-12 mt-3">
                    <p>
                        The first and foremost step when relocating to a new place is packing your belongings. You can
                        handle the packing independently, but effective packing requires patience and skills because
                        improper packing can cause damage to your items during transit. Getting help from professionals is
                        the key to safe and secure transportation of your belongings.

                    </p>
                    <p>
                        Besides packing, you may also need to store some of your extra stuff that you don't want to discard,
                        or you might require temporary storage for some items. This is where storage facilities prove
                        beneficial. At My Moving Journey, we provide a list of trusted moving companies providing packing
                        and storage facilities in all parts of the USA to help you relocate easily without any hassle.

                    </p>
                </div>
            </div>

        </div>
    </section>
    <section id="commercial_movers_data">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Determinants of a Good Packing and Storage Service </h2>
                    <p class="mb-0">Choosing the right company for packing and storage is very important. Look for these
                        characteristics when choosing a moving company for packing and storage services for a safe and
                        smooth moving experience.

                    </p>

                    <ul>
                        <li>
                            <span class="fw-bold">Vigilant Security: </span>Trusted storage providers have state-of-the-art
                            security in their storage units, ensuring nothing gets stolen or damaged.

                        </li>
                        <li>
                            <span class="fw-bold">Professional Supplies: </span>A professional packing and storage
                            service provider manages the whole process within the given timeframe and immediately attends to
                            customer queries and requests.

                        </li>
                        <li>
                            <span class="fw-bold">Professionalism: </span>A professional packing and storage service
                            provider manages the process within the given timeframe and immediately attends to customer
                            queries and requests.


                        </li>
                        <li>
                            <span class="fw-bold">Licensed and Insurance: </span>Reliable storage facilities are licensed
                            and take responsibility for covering any damage or loss to your item.

                        </li>
                        <li>
                            <span class="fw-bold">Positive Reviews: </span>The reviews of a company reflect the quality
                            of its services. You can find authentic customer reviews on My Moving Journey.

                        </li>
                    </ul>
                    <h2>Packing and Storage Service – Average Cost

                    </h2>
                    <p>
                        The cost of a packing and storage facility depends on various factors, including the size of the
                        belongings, packing supplies required, the number of movers required for transportation, and the
                        duration for which you want to store your items. On average, storage facilities cost around
                        $200-$450 and packing services are priced at $70 per hour. Packing a three-bedroom house takes six
                        to seven hours so that the average cost will be around $420-$490.
                    </p>
                    <p>
                        Please note that this average is derived from review data available on My Moving Journey and may
                        vary from the actual costs when obtained from the company. Getting quotes from multiple companies to
                        analyze their pricing structure is advised, then go for the one that fits your budget perfectly.

                    </p>
                    <h2 class="mt-4">Factors Affecting Packing and Storage Service Costs

                    </h2>
                    <p>
                        Some factors greatly influence the cost of packing and storage facilities. Some of them are
                        mentioned below.
                    </p>
                    <ul>
                        <li>
                            <span class="fw-bold">Taxes: </span>The cost of tax charged in your area for storage and
                            packing supplies is directly proportional to the final cost.
                        </li>
                        <li>
                            <span class="fw-bold">Company Policies: </span>Pricing and insurance policies vary from one
                            company to another. Some companies may charge more for the same service than others.
                        </li>
                        <li>
                            <span class="fw-bold">Location: </span>The cost of a storage unit can be influenced by its
                            location because of high rents and property values in certain areas.

                        </li>
                        <li>
                            <span class="fw-bold">Timeline: </span>Availing packing and storage services during peak
                            seasons like summer and weekends can increase the final cost.
                        </li>
                        <li>
                            <span class="fw-bold">Size: </span>The more supplies are required to pack, and the larger the
                            unit is required to store your belongings, the more the average cost will be affected.

                        </li>
                    </ul>

                    <h2>How To Reduce the Cost of Packing and Storage Service
                    </h2>
                    <p>
                        Moving is stressful, time-consuming, and can strain your budget. Whether relocating locally or
                        across
                        state lines, planning a budget is crucial. Employ cost-saving methods to reduce packing and storage
                        expenses.
                    </p>
                    <ul>
                        <li>
                            <span class="fw-bold">Free Boxes:
                            </span>Instead of purchasing boxes, obtain them from online marketplaces and grocery stores, or
                            ask family, friends, or neighbors for extras.
                        </li>
                        <li>
                            <span class="fw-bold">Declutter:
                            </span> Declutter your home before home before moving. Categorize your belongings and sell,
                            donate, or discard unwanted items.
                        </li>
                        <li>
                            <span class="fw-bold">Free storage:
                            </span>Select a company offering complimentary 30 or 15-day storage for valued customers to cut
                            moving costs.
                        </li>
                        <li>
                            <span class="fw-bold">Time of the move:
                            </span>Moving during summer, weekends, and holidays tends to be more expensive due to increased
                            costs for supplies and storage. Consider avoiding these times to save on expenses.
                        </li>
                        <li>
                            <span class="fw-bold">Deals and Discounts:
                            </span>Look out for yearly or holiday discounts. Many hardware stores run yearly and seasonal
                            sales where you can buy cheap packing supplies and save some bucks.
                        </li>
                    </ul>

                    <h2>Reasons to Choose Packing and Storage Service
                    </h2>
                    <p>
                        Choosing top and experienced movers for packing and storage ensures a smooth, stress-free move with
                        added benefits for easier relocation.
                    </p>
                    <ul class="factors">
                        <li>
                            <span class="fw-bold">Peace of Mind:
                            </span>Choose movers' packing and storage services for a relaxed and stress-free experience.
                            They manage all packing and securely store your belongings.

                        </li>
                        <li>
                            <span class="fw-bold">Insurance:
                            </span>Movers are fully insured, ensuring the safety of your belongings, and storage units
                            feature high-security systems to prevent break-ins.

                        </li>
                        <li>
                            <span class="fw-bold">Timesaving:
                            </span>Hiring movers transfers the time-consuming task of packing to professionals. They have
                            the right supplies, ensuring a quick and efficient process.

                        </li>
                        <li>
                            <span class="fw-bold">Experienced Staff:
                            </span>Experienced movers have trained staff adept at handling fragile, bulky, and special
                            items. They excel in maximizing storage space efficiently.
                        </li>
                        <li>
                            <span class="fw-bold">Convenience:
                            </span>Expert moving companies offer convenient storage with easy access, clear entry points,
                            defined paths, and climate-controlled options.
                        </li>
                    </ul>

                </div>
            </div>

        </div>

    </section>
@endsection
