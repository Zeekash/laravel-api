@extends('layouts.app')

@section('title', 'Free Packing and Moving Box Calculator | Estimate Your Boxes')

@section('meta_title')
    Free Packing and Moving Box Calculator | Estimate Your Boxes
@endsection
@section('meta_keywords', 'Packing Calculator')
@section('meta_description')
    Use our packing and moving box calculator to estimate your boxes and moving supplies. Plan your move better, avoid
    waste, and stay organized.
@endsection
@section('head')
    <meta name="robots" content="index, follow">
@endsection
 
@section('og:title')
    Free Packing and Moving Box Calculator | Estimate Your Boxes
@endsection

@section('og:description')

    Use our packing and moving box calculator to estimate your boxes and moving supplies. Plan your move better, avoid
    waste, and stay organized.

@endsection
<link rel="stylesheet" href="{{ asset('assets/css/packing_calculator.css') }}">
<meta name="robots" content="index, follow">

@section('content')
    <style>
        .input_outer {
            background-color: #fff !important;
            padding: 7px 20px !important;
            border-radius: 45px !important;
            border: 0px solid #a8b9d9 !important;
        }

        .breadcrumb {
            display: flex;
            flex-wrap: wrap;
            padding: 0 0;
            margin-bottom: 1rem;
            list-style: none;
            justify-content: center;
        }
    </style>
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-lg-7 mx-auto">
                <div class="show_breadcrumbs my-1 mt-5 mt-md-0">
                    <div class="col-12">
                        <nav style="--bs-breadcrumb-divider: '➜';" class="pb-1 mb-0 rounded-3" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 justif-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="py-2"><i
                                            class="fas fa-home me-1 home_icon"></i>
                                        Home</a></li>
                                <li class="breadcrumb-item"><a href="#" class="py-2">Packing Calculator</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="top_info text-center mb-4">
                    <h1>Moving Box Calculator</h1>
                    <div class="col-lg-12 mx-auto">
                        <p>
                            Ever stood in your living room, staring at your stuff, wondering how many boxes it’ll actually
                            take to move it all? That’s where you need a moving box calculator. It is a quick way to know
                            exactly what you’ll need before the packing even begins.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 mt-5 mx-auto">
                <div class="form_wrapper">
                    <form action="" class=" main_banner_form mb-0" id="calculatorForm">
                        <div class="form_bg">
                            <div class="row">
                                <div class="col-xl-3 mt-lg-0 mt-2">
                                    <div class="input_outer">
                                        <label for="rooms">Number of Rooms</label>
                                        <input type="number" id="rooms" name="rooms" min="1" value="1"
                                            placeholder="Number of Rooms" required="">
                                    </div>
                                </div>
                                <div class="col-xl-3 mt-lg-0 mt-2">
                                    <div class="input_outer">
                                        <label for="people">Number of People Moving</label>
                                        <input type="number" id="people" name="people" min="1" value="1"
                                            required="" placeholder="Number of People">
                                    </div>
                                </div>
                                <div class="col-xl-3 mt-lg-0 mt-2">
                                    <div class="input_outer">
                                        <label for="packingStyle">Packing Style</label>
                                        <select id="packingStyle" name="packingStyle" required="">
                                            <option value="light">Light Packer</option>
                                            <option value="average" selected="">Average Packer</option>
                                            <option value="heavy">Heavy Packer</option>
                                        </select>
                                    </div>
                                </div>
                                <div
                                    class="col-xl-3 d-flex align-items-center justify-content-lg-end justify-content-center text-center mt-lg-0 mt-3">
                                    <button class="calculate-btn" type="submit">
                                        Calculate
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <div class="col-lg-10 mx-auto">
                <form id="calculatorForm">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rooms">Number of Rooms</label>
                                <input type="number" id="rooms" name="rooms" min="1" value="1"
                                    required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="people">Number of People Moving</label>
                                <input type="number" id="people" name="people" min="1" value="1"
                                    required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="packingStyle">Packing Style</label>
                                <select id="packingStyle" name="packingStyle" required="">
                                    <option value="light">Light Packer</option>
                                    <option value="average" selected="">Average Packer</option>
                                    <option value="heavy">Heavy Packer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="calculate-btn">
                                Calculate Moving Estimate
                            </button>
                        </div>
                    </div>
                </form>
            </div> --}}
        </div>
        <div class="form-container">
            <div id="results" class="result-section" style="display: none;">
                <div class="result-title">
                    <div style="font-size: 22px; font-weight: 700; color: #1e1a1a; margin-bottom: 15px;">Your Moving
                        Estimate</div>
                </div>
                <div class="my-4" id="boxEstimates">
                    <div class="box-result">
                        <div class="lower_boxes"><strong>Small Boxes:</strong></div>
                        <div class="min_max_cost">6 — $9.00</div>
                    </div>
                    <div class="box-result">
                        <div class="lower_boxes"><strong>Medium Boxes:</strong></div>
                        <div class="min_max_cost">6 — $12.00</div>
                    </div>
                    <div class="box-result">
                        <div class="lower_boxes"><strong>Large Boxes:</strong></div>
                        <div class="min_max_cost">3 — $7.50</div>
                    </div>
                    <div class="box-result">
                        <div class="lower_boxes"><strong>Wardrobe Boxes:</strong></div>
                        <div class="min_max_cost">1 — $10.00</div>
                    </div>
                    <div class="box-result">
                        <div class="lower_boxes"><strong>Dish Packs:</strong></div>
                        <div class="min_max_cost">1 — $5.00</div>
                    </div>
                </div>
                <div class="cost-section">
                    <div
                        style="font-size: 24px; font-weight: 600; color: #1e1a1a; margin-bottom: 10px; font-family: var(--para-family), sans-serif;">
                        Estimated Total Cost
                    </div>
                    <div id="totalCost" class="total-cost">$43.50</div>
                </div>
                {{-- <div class="text-center mt-3">
                        <button id="downloadBtn" class="pmc-download-btn" style="display: inline-block;"
                            aria-label="Download packing estimate PDF">
                            <i class="bi bi-download me-2"></i> Download PDF
                        </button>
                    </div> --}}
            </div>
            <div class="container_main mt-5">
                <div class="dice-box-highlight">
                    <div id="boxGuide" class="box_guide">
                        <h3 class="box_size">Box
                            size guide:</h3>
                        <ul class="list_sty list-unstyled my-4">
                            <li>
                                <div class="check-icon">
                                    <svg viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </div>
                                <span><strong>Small box:</strong> Books, tools, small appliances</span>
                            </li>
                            <li>
                                <div class="check-icon">
                                    <svg viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </div>
                                <span> <strong>Medium box:</strong> Kitchen items, toys, small
                                    electronics</span>
                            </li>
                            <li>
                                <div class="check-icon">
                                    <svg viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </div>
                                <span><strong>Large box:</strong> Linens, pillows, bulky clothing</span>
                            </li>
                            <li>
                                <div class="check-icon">
                                    <svg viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </div>
                                <span><strong>Wardrobe box:</strong> Hanging clothes, long garments</span>
                            </li>
                            <li>
                                <div class="check-icon">
                                    <svg viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </div>
                                <span><strong>Dish pack:</strong> Fragile kitchenware, glassware,
                                    dishes</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="content_sec">
                    <h2>How Our Moving Box Calculator Works</h2>
                    <p>Our <b>moving box calculator</b> keeps things simple. All you need to do is follow three simple
                        steps.
                    </p>
                    <ul class="list_sty list-unstyled my-4">
                        <li><strong>Step 1:</strong> Enter the <b>number of rooms</b> in your home. This helps the
                            calculator
                            understand how much space you’re
                            packing up.</li>
                        <li><strong>Step 2:</strong> Add the <b>number of people moving</b>. A family of four usually means
                            more
                            stuff
                            than a single mover, and
                            our calculator adjusts your box count accordingly.</li>
                        <li><strong>Step 3:</strong> Choose your <b>packing style</b>. Are you a light, <b>average
                                packer</b>,
                            or do you like
                            to keep everything “just
                            in case”? This tells the tool how much to estimate for your <b>moving boxes</b>, including
                            <b>small
                                boxes</b>,
                            <b>medium boxes</b>, <b>large boxes</b>, <b>extra-large boxes</b>, and even specialty types like
                            <b>wardrobe boxes</b>, <b>dish
                                barrel boxes</b>, or <b>TV boxes</b>.
                        </li>
                    </ul>
                    <p>Once you hit “Calculate,” the tool instantly gives you a realistic estimate. It is a smart way to
                        plan
                        your <b>packing supplies</b> and save time before your big move.</p>
                    <h2>What Affects How Many Boxes You’ll Need?</h2>
                    <p>Not every move is built the same, and that’s exactly why your results from the <b>moving box
                            calculator</b>
                        might differ from someone else’s. <a
                            href="https://mymovingjourney.com/blogs/how-many-boxes-do-you-need-for-moving"> <strong>The
                                number of moving boxes you need</strong> </a> depends on a few simple
                        things.
                    </p>
                    <div class="mb-3 upper_wrap">
                        <h3>Size of Your Home</h3>
                        <p>A studio or one-bedroom apartment might only need a few <b>small boxes</b> and <b>medium
                                boxes</b>,
                            while a
                            full-sized house can easily fill stacks of <b>large boxes</b> and <b>extra-large boxes</b>. More
                            space simply
                            means more stuff.</p>
                    </div>
                    <div class="mb-3 upper_wrap">
                        <h4>Nature of Your Belongings</h4>
                        <p>Some people live lightly; others keep memories in every corner. If you've got delicate items,
                            clothes, or collectibles, you'll likely need specialty options like <b>wardrobe boxes</b>,
                            <b>dish
                                barrel
                                boxes</b>, or <b>TV boxes</b>.
                        </p>
                    </div>
                    <div class="mb-3 upper_wrap">
                        <h4>Number of People Moving</h4>
                        <p>More people usually means more belongings, and the calculator automatically adjusts your estimate
                            based on that.</p>
                    </div>
                    <div class="mb-3 upper_wrap">
                        <h4>Your Packing Style</h4>
                        <p>Whether you’re a minimalist or a “pack everything just in case” type, your <b>packing
                                supplies</b>
                            and box
                            count will change. Light packers might get by with fewer boxes, while cautious movers prefer
                            extra
                            padding and spares.</p>
                    </div>
                    <h2>Average Box Count by Home Size</h2>
                    <p>If you’re the kind of person who likes to see numbers before making a plan, here’s a quick look at
                        how
                        many <b>moving boxes</b> most people use based on their home size.</p>
                    <p>Of course, your results from the <b>Moving Box Calculator</b> will be more precise (it factors in
                        your
                        <b>packing
                            style</b> and <b>the nature of your belongings</b>), but this chart gives you a handy starting
                        point.
                    </p>
                    <div class="table-responsive cost-table" style="font-family: var(--para-family);">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr class="align-middle">
                                    <th style="background-color: #ebfaff; color: #001f21; width: 30%;">Home Size</th>
                                    <th style="background-color: #ebfaff; color: #001f21;">Estimated Number of Boxes</th>
                                    <th style="background-color: #ebfaff; color: #001f21;">Suggested Box Types</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Studio Apartment
                                    </td>
                                    <td>
                                        10-20
                                    </td>
                                    <td>
                                        Mostly <b>small boxes</b> and a few <b>medium boxes</b>
                                    </td>
                                </tr>
                                <tr style="background-color: #EBFAFF;">
                                    <td>
                                        1 BR Apartment
                                    </td>
                                    <td>
                                        20-35
                                    </td>
                                    <td>
                                        Mix of <b>small</b>, <b>medium</b>, and a couple of <b>large boxes</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2-Bedroom Home
                                    </td>
                                    <td>
                                        40–60
                                    </td>
                                    <td>
                                        Balanced mix of <b>medium boxes</b>, <b>large boxes</b>, and <b>extra-large
                                            boxes</b>
                                    </td>
                                </tr>
                                <tr style="background-color: #EBFAFF;">
                                    <td>
                                        3-Bedroom Home
                                    </td>
                                    <td>
                                        60–80
                                    </td>
                                    <td>
                                        Includes <b>wardrobe boxes</b> and <b>dish barrel boxes</b> for added protection
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        4+ Bedrooms
                                    </td>
                                    <td>
                                        80–100+
                                    </td>
                                    <td>
                                        Full range: <b>small boxes</b>, <b>large boxes</b>, <b>extra-large boxes</b>,
                                        <b>TV
                                            boxes</b>, and more
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="mt-2"><strong>Note:</strong> Remember, these numbers are averages. Your space, your
                        belongings, and your habits all shape your perfect box count. That’s why our <b>moving
                            calculator</b>
                        gives
                        you a result that is custom-made for <em>your</em> move.</p>
                    <h2>Types of Moving Boxes and Their Standard Sizes</h2>
                    <p>Not every box serves the same purpose, and choosing the right one can make your move smoother and
                        safer.
                        When you use our <b>moving box calculator</b>, it automatically factors in these <b>types of
                            boxes</b>
                        and their
                        standard sizes.</p>
                    <div class="table-responsive cost-table" style="font-family: var(--para-family);">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr class="align-middle">
                                    <th style="background-color: #ebfaff; color: #001f21; width: 30%;">Box Type</th>
                                    <th style="background-color: #ebfaff; color: #001f21;">Standard Size (Approx.)</th>
                                    <th style="background-color: #ebfaff; color: #001f21;">Best For</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <b>Small Boxes</b>
                                    </td>
                                    <td>
                                        1.5 cu. ft.
                                    </td>
                                    <td>
                                        Books, canned goods, tools, small décor
                                    </td>
                                </tr>
                                <tr style="background-color: #EBFAFF;">
                                    <td>
                                        <b>Medium Boxes</b>
                                    </td>
                                    <td>
                                        3 cu. ft.
                                    </td>
                                    <td>
                                        Clothes, linens, kitchen items
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Large Boxes</b>
                                    </td>
                                    <td>
                                        4.5 cu. ft.
                                    </td>
                                    <td>
                                        Bedding, towels, toys
                                    </td>
                                </tr>
                                <tr style="background-color: #EBFAFF;">
                                    <td>
                                        <b>Extra-Large Boxes</b>
                                    </td>
                                    <td>
                                        6 cu. ft.
                                    </td>
                                    <td>
                                        Comforters, lampshades, stuffed toys
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Wardrobe Boxes</b>
                                    </td>
                                    <td>
                                        Varies (24" × 24" × 40")
                                    </td>
                                    <td>
                                        Hanging clothes
                                    </td>
                                </tr>
                                <tr style="background-color: #EBFAFF;">
                                    <td>
                                        <b>Dish Barrel Boxes</b>
                                    </td>
                                    <td>
                                        5 cu. ft. (thick-walled)
                                    </td>
                                    <td>
                                        Plates, glasses, and kitchenware
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>TV Boxes</b>
                                    </td>
                                    <td>
                                        Varies (32"–70" screens)
                                    </td>
                                    <td>
                                        Televisions, monitors
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h2>Expert Packing Tips to Save Time and Money
                    </h2>
                    <p>Packing doesn’t have to be chaos; it just needs a little plan. Here are a few tried-and-true ways to
                        make
                        your move smoother and a lot less stressful.</p>
                    <ul class="criteria-list list_fill list-unstyled">
                        <li class="criteria-item">
                            <div class="check-icon">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span>
                                <b>Declutter Before You Pack:</b> The fewer things you move, the fewer <b>moving boxes</b>
                                and
                                <b>packing
                                    supplies</b> you’ll need, which saves money and time when unpacking later.

                            </span>
                        </li>
                        <li class="criteria-item">
                            <div class="check-icon">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span>
                                <b>Pack Room by Room:</b> <a
                                    href="https://mymovingjourney.com/blogs/how-to-label-boxes-for-moving"><strong>Label
                                        each box clearly</strong></a>: kitchen, bedroom, bathroom, and use
                                <b>small
                                    boxes</b> for heavier items and <b>large boxes</b> or <b>extra-large boxes</b> for
                                lighter
                                things.
                            </span>
                        </li>
                        <li class="criteria-item">
                            <div class="check-icon">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span>
                                <b>Protect Fragile Items:</b> For dishes, glasses, and collectibles, use <b>dish barrel
                                    boxes</b> and
                                extra padding. If you’re <a
                                    href="https://mymovingjourney.com/blogs/how-to-pack-electronics-for-moving"><strong>moving
                                        electronics</strong></a>, never skip TV boxes; they’re designed to keep
                                screens safe from pressure and cracks.
                            </span>
                        </li>
                        <li class="criteria-item">
                            <div class="check-icon">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span>
                                <b>Make Use of Specialty Boxes:</b> <b>Wardrobe boxes</b> aren’t a luxury; they’re a
                                time-saver.
                                Hanging clothes directly saves folding, packing, and hours of ironing later.
                            </span>
                        </li>
                        <li class="criteria-item">
                            <div class="check-icon">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span>
                                <b>Balance the Weight:</b> A common mistake is stuffing everything into the biggest box you
                                have. Even <b>moving box rental companies</b> will tell you to keep it balanced. Heavy at
                                the
                                bottom,
                                light at the top, and no box should be too heavy to lift safely.

                            </span>
                        </li>
                    </ul>
                    <div class="mt-5">
                        <div class="faq-section">
                            <h2>Frequently Asked Questions</h2>

                            <div class="accordion" id="faqAccordion">
                                <div class="accordion-item">
                                    <h3 class="accordion-header m-0" id="headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                            How many boxes do I need to move a 2-bedroom home?
                                        </button>
                                    </h3>
                                    <div id="collapseOne" class="accordion-collapse collapse"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            It depends a lot on how much stuff you have and how you pack, but for a typical
                                            2-bedroom
                                            home, you might need <b>40–60 moving boxes</b> — a mix of <b>small boxes</b>,
                                            <b>medium
                                                boxes</b>, <b>large boxes</b>,
                                            and some specialty ones like <b>wardrobe boxes</b> and <b>TV boxes</b>.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h3 class="accordion-header m-0" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                            What types of moving boxes should I use for fragile items?
                                        </button>
                                    </h3>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            For <a
                                                href="https://mymovingjourney.com/blogs/how-to-pack-fragile-items-prep-tools-tips-and-more"><strong>fragile
                                                    items</strong></a>, lean on <b>dish barrel boxes</b> (with dividers) and
                                            extra
                                            padding.
                                            Use
                                            <b>small
                                                boxes</b> for heavier, delicate pieces (like glassware), and <b>medium
                                                boxes</b>
                                            with
                                            soft fillers for
                                            delicate decor. <b>TV boxes</b> and <b>wardrobe boxes</b> are best for
                                            electronics and
                                            clothes,
                                            respectively.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h3 class="accordion-header m-0" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                            Can I rent moving boxes instead of buying them?
                                        </button>
                                    </h3>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Yes, many <b>moving box rental companies</b> let you rent sturdy boxes for your
                                            move.
                                            After
                                            using
                                            our <b>moving box calculator</b>, you can rent just what you need, saving money
                                            and
                                            waste.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h3 class="accordion-header m-0" id="headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                            Does packing style or clutter change my box estimate?
                                        </button>
                                    </h3>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Absolutely. If you’re a light packer or have fewer belongings (minimal décor,
                                            fewer
                                            knick-knacks), your estimate will lean lower. But if your space is full, then
                                            you’ll
                                            need
                                            more.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h3 class="accordion-header m-0" id="headingFive">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                            What if I misestimate and buy too many or too few boxes?
                                        </button>
                                    </h3>
                                    <div id="collapseFive" class="accordion-collapse collapse"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            If you under-buy, you can grab extra <b>small</b>, <b>medium</b>, or <b>large
                                                boxes</b>,
                                            or
                                            rent from <b>moving box
                                                rental companies</b>. If you over-buy, many sellers accept returns, or you
                                            can reuse
                                            or
                                            recycle
                                            them.
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

    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "name": "Free Moving Box Calculator - Estimate How Many Boxes You Need ",
        "url": "https://mymovingjourney.com/packing-calculator",
        "description": " Plan your move smarter with our free moving box calculator. Estimate how many moving boxes you’ll need based on your
    home size and packing style.",    
        "potentialAction":{
                 "@type":"ReadAction"  ,
                 "target": "{{ url()->current() }}"  
                }
    }
</script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "WebSite",
        "name": "MyMovingJourney",
        "url": "https://mymovingjourney.com",
   "publisher": {
            "@type": "Organization",
            "name": "My Moving Journey",
            "url": "https://mymovingjourney.com",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ asset('assets/img/logo.png') }}"
            }
        },
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://mymovingjourney.com/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
</script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How many boxes do I need to move a 2-bedroom home?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "It depends on how much you own and how you pack, but for a typical 2-bedroom home, you may need around 40–60 moving boxes. This usually includes a mix of small, medium, large, wardrobe boxes, and TV boxes."
      }
    },
    {
      "@type": "Question",
      "name": "What types of moving boxes should I use for fragile items?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Fragile items should be packed in dish barrel boxes with dividers and extra padding. Small boxes are best for heavy fragile items like glassware, while medium boxes work well for decorative items with soft fillers. TV boxes and wardrobe boxes are ideal for electronics and clothing."
      }
    },
    {
      "@type": "Question",
      "name": "Can I rent moving boxes instead of buying them?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, many moving box rental companies allow you to rent durable boxes for your move. Renting can help you save money and reduce waste by using only the boxes you need."
      }
    },
    {
      "@type": "Question",
      "name": "Does packing style or clutter change my box estimate?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, packing style makes a big difference. Minimal belongings and light packing reduce the number of boxes needed, while cluttered or fully furnished spaces require more boxes."
      }
    },
    {
      "@type": "Question",
      "name": "What if I misestimate and buy too many or too few boxes?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "If you buy too few boxes, you can easily purchase or rent additional ones. If you buy too many, most retailers accept returns, or you can reuse or recycle the extra boxes."
      }
    }
  ]
}
</script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "{{ url('/') }}"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Packing Calculator",
                "item": "{{ url()->current() }}"
            }
        ]
    }
    </script>
    <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                 "@type": "WebApplication",
                "name": "Free Moving Box Calculator - Estimate How Many Boxes You Need",
                "applicationCategory": "UtilityApplication",
                "operatingSystem": "All",
                "description": "Plan your move smarter with our free moving box calculator. Estimate how many moving boxes you’ll need based on your home size and packing style.",
                "url": "{{ url()->current() }}",
                "image": "https://mymovingjourney.com/assets/img/logo.png",
                "publisher": {
                  "@type": "Organization",
                  "name": "My Moving Journey",
                  "url": "https://mymovingjourney.com",
                  "logo": {
                    "@type": "ImageObject",
                    "url": "https://mymovingjourney.com/assets/img/logo.png"
                  }
                },
                "offers": {
                  "@type": "Offer",
                  "price": "0",
                  "priceCurrency": "USD",
                  "description": "Free Online Packing & Moving Box Calculator"
                }
               
              }
        </script>


    <script>
        // main calculate function (no auto-update)
        function calculatePacking(doScroll = true) {
            const rooms = Math.max(1, parseInt(document.getElementById('rooms').value) || 1);
            const people = Math.max(1, parseInt(document.getElementById('people').value) || 1);
            const packingStyle = (document.getElementById('packingStyle') && document.getElementById('packingStyle')
                .value) || 'average';
            const distance = (document.getElementById('distance') && document.getElementById('distance').value) || 'local';
            const multiplier = packingStyle === "heavy" ? 1.3 : (packingStyle === "light" ? 0.8 : 1);
            const baseBoxes = (rooms * 10) + (people * 5);
            const totalBoxes = Math.max(1, Math.ceil(baseBoxes * multiplier));
            const results = {
                small: Math.ceil(totalBoxes * 0.4),
                medium: Math.ceil(totalBoxes * 0.35),
                large: Math.ceil(totalBoxes * 0.15),
                wardrobe: Math.ceil(totalBoxes * 0.05),
                dishPack: Math.ceil(totalBoxes * 0.05)
            };
            const prices = {
                small: 1.50,
                medium: 2.00,
                large: 2.50,
                wardrobe: 10.00,
                dishPack: 5.00
            };
            const costs = {
                small: (results.small * prices.small).toFixed(2),
                medium: (results.medium * prices.medium).toFixed(2),
                large: (results.large * prices.large).toFixed(2),
                wardrobe: (results.wardrobe * prices.wardrobe).toFixed(2),
                dishPack: (results.dishPack * prices.dishPack).toFixed(2)
            };
            const totalCost = (
                parseFloat(costs.small) +
                parseFloat(costs.medium) +
                parseFloat(costs.large) +
                parseFloat(costs.wardrobe) +
                parseFloat(costs.dishPack)
            ).toFixed(2);
            const resultsEl = document.getElementById('results');
            const boxEstimatesEl = document.getElementById('boxEstimates');
            const totalCostEl = document.getElementById('totalCost');
            if (!resultsEl || !boxEstimatesEl || !totalCostEl) {
                console.error('Required containers missing: #results, #boxEstimates, #totalCost');
                return;
            }
            // Render only when Calculate clicked
            boxEstimatesEl.innerHTML = `
        <div class="box-result">
          <div class="lower_boxes"><strong>Small Boxes:</strong></div>
          <div class="min_max_cost">${results.small} — $${costs.small}</div>
        </div>
        <div class="box-result">
          <div class="lower_boxes"><strong>Medium Boxes:</strong></div>
          <div class="min_max_cost">${results.medium} — $${costs.medium}</div>
        </div>
        <div class="box-result">
          <div class="lower_boxes"><strong>Large Boxes:</strong></div>
          <div class="min_max_cost">${results.large} — $${costs.large}</div>
        </div>
        <div class="box-result">
          <div class="lower_boxes"><strong>Wardrobe Boxes:</strong></div>
          <div class="min_max_cost">${results.wardrobe} — $${costs.wardrobe}</div>
        </div>
        <div class="box-result">
          <div class="lower_boxes"><strong>Dish Packs:</strong></div>
          <div class="min_max_cost">${results.dishPack} — $${costs.dishPack}</div>
        </div>
    `;
            totalCostEl.textContent = `$${totalCost}`;
            resultsEl.style.display = 'block';
            resultsEl.classList.add('show');
            const disclaimer = document.getElementById('disclaimer');
            if (disclaimer) disclaimer.style.display = 'block';
            const downloadBtn = document.getElementById('downloadBtn');
            if (downloadBtn) downloadBtn.style.display = 'inline-block';
            const thankYou = document.getElementById('thankYou');
            if (thankYou) thankYou.style.display = 'none';
            window.latestResults = {
                rooms,
                people,
                packingStyle,
                distance,
                ...results,
                smallCost: costs.small,
                mediumCost: costs.medium,
                largeCost: costs.large,
                wardrobeCost: costs.wardrobe,
                dishPackCost: costs.dishPack,
                totalCost
            };
            if (doScroll) resultsEl.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
        // PDF download (unchanged)
        async function downloadPDF() {
            if (!window.latestResults) return;
            let doc;
            if (window.jspdf && typeof window.jspdf.jsPDF === 'function') doc = new window.jspdf.jsPDF();
            else if (typeof window.jsPDF === 'function') doc = new window.jsPDF();
            else {
                console.error('jsPDF not found');
                return;
            }
            let startY = 20;
            doc.setFontSize(20);
            doc.setTextColor('#5C6AC4');
            doc.text("Packing Estimate", 105, startY, {
                align: "center"
            });
            startY += 15;
            doc.setFontSize(14);
            doc.setTextColor('#000');
            doc.text(`Rooms: ${window.latestResults.rooms}`, 20, startY);
            doc.text(`People: ${window.latestResults.people}`, 20, startY + 10);
            doc.text(`Packing Style: ${window.latestResults.packingStyle}`, 20, startY + 20);
            doc.line(20, startY + 25, 190, startY + 25);
            startY += 35;
            doc.setFontSize(16);
            doc.setTextColor('#5C6AC4');
            doc.text("Estimated Boxes & Costs:", 20, startY);
            startY += 10;
            doc.setFontSize(12);
            doc.setTextColor('#000');
            const boxes = [{
                    label: "Small Boxes",
                    qty: window.latestResults.small,
                    cost: window.latestResults.smallCost
                },
                {
                    label: "Medium Boxes",
                    qty: window.latestResults.medium,
                    cost: window.latestResults.mediumCost
                },
                {
                    label: "Large Boxes",
                    qty: window.latestResults.large,
                    cost: window.latestResults.largeCost
                },
                {
                    label: "Wardrobe Boxes",
                    qty: window.latestResults.wardrobe,
                    cost: window.latestResults.wardrobeCost
                },
                {
                    label: "Dish Packs",
                    qty: window.latestResults.dishPack,
                    cost: window.latestResults.dishPackCost
                }
            ];
            boxes.forEach(box => {
                doc.text(`${box.label}:`, 20, startY);
                doc.text(`${box.qty} — $${box.cost}`, 120, startY);
                startY += 10;
            });
            doc.line(20, startY + 5, 190, startY + 5);
            startY += 15;
            doc.setFontSize(16);
            doc.setTextColor('#22C55E');
            doc.text(`Total Estimated Cost: $${window.latestResults.totalCost}`, 105, startY, {
                align: "center"
            });
            startY += 20;
            doc.setFontSize(10);
            doc.setTextColor('#6B7280');
            doc.text("* This is an estimate. Actual box needs and costs may vary.", 105, startY, {
                align: "center"
            });
            doc.save("mygoodmovers-packing-estimate.pdf");
            const thankYou = document.getElementById('thankYou');
            if (thankYou) thankYou.style.display = 'block';
            if (typeof confetti === 'function') confetti({
                particleCount: 150,
                spread: 70,
                origin: {
                    y: 0.6
                }
            });
        }
        // wire up form only to submit (no live input handlers)
        (function() {
            const form = document.getElementById('calculatorForm') || document.getElementById('packingForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    calculatePacking(true); // update + scroll only on submit
                });
            }
            const dl = document.getElementById('downloadBtn');
            if (dl) dl.addEventListener('click', function(e) {
                e.preventDefault();
                downloadPDF();
            });
        })();
    </script>
@endsection
