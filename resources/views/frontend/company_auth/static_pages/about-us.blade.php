@extends('layouts.app')
@section('title')
    About Us | My Moving Journey
@endsection
@section('meta_description')
    We built My Moving Journey because moving was messy. Now it’s easier to find verified, reliable movers in USA without
    wasting time or energy.
@endsection
@section('meta_keywords',"About Us")

@section('head')
    <meta name="robots" content="index, follow">
@endsection

@section('og:title')
    About My Moving Journey - Our Story and Mission
@endsection
@section('og:description')
    Learn more about My Moving Journey, our mission to connect people with reliable moving companies, and how we make the
    moving process easier.
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/about-us.css') }}">

    <style>
        @media (max-width: 575px) {
            .main-responsive-nav .logo img {
                max-width: 100px !important;
                height: 40px;
            }

            .about-section h1 {
                font-size: 36px;
                font-weight: 800;
            }
        }
    </style>
    <section class="hero py-2 py-sm-5">
        <div class="container banner_head">
            <div class="row">
                <div class="col-lg-5">
                    <h1 class="my-2 fw-bold">About Us</h1>
                    <p class="my-2 fw-bold mt-2 fs-3">We Started My Moving Journey Because Moving
                        Wasn’t Supposed to Be This Hard.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="focus-section">
        <div class="container">
            <h2>What We Focus On</h2>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="focus-card">
                        <div class="focus-icon">

                            <img src="{{ asset('assets/img/cost-calculator.svg') }}" alt="cost-calculator"
                                class="img-fluid">
                        </div>
                        <h3>Moving Cost Calculator</h3>
                        <p>get instant estimates for your move. </p>
                        <a href="{{ route('company.cost-estimator') }}" class="btn-comp mt-4 d-block text-center px-2">Get
                            your Quote</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="focus-card">
                        <div class="focus-icon">
                            <img src="{{ asset('assets/img/moving-resources.svg') }}" alt="moving-resources"
                                class="img-fluid">
                        </div>
                        <h3>Best Long Distance Movers</h3>
                        <p>explore best movers that specialize in long-distance moves </p>
                        <a href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"
                            class="btn-comp mt-4 d-block text-center px-2">Get
                            the Best Movers</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="focus-card">
                        <div class="focus-icon">
                            <img src="{{ asset('assets/img/compare-movers.svg') }}" alt="compare-movers" class="img-fluid">
                        </div>
                        <h3>Compare Movers</h3>
                        <p>line them up side by side and choose</p>
                        <a href="{{ route('companies.comparePage') }}"
                            class="btn-comp mt-4 d-block text-center px-2">Compare Movers Now</a>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="focus-card">
                        <div class="focus-icon">
                            <img src="{{ asset('assets/img/movers-directory.svg') }}" alt="movers-directory"
                                class="img-fluid">
                        </div>
                        <h3>Verified Movers Directory</h3>
                        <p>browse licensed moving companies from our A–Z movers list</p>
                        <a href="{{ route('company.mover-list') }}" class="btn-comp mt-4 d-block text-center px-2">Find
                            Your Mover</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container_main">
        <div class="container">
            <h2 class="stm-faq-heading">How It All Started?</h2>
            <p>Every move starts with a reason. Ours started with frustration.</p>
            <p>Back then, moving felt like chaos; not the kind with boxes and tape, but the kind that comes from trying to
                find
                people you can trust. We were planning a move, just like anyone else, and we thought the internet would make
                it
                easy. </p>
            <p>Type movers in USA, scroll a bit, compare a few prices, book a mover, done. That’s how it was supposed to go.
            </p>
            <p class="according_to">It didn’t.</p>
            <p>
                We spent days jumping from one site to another. Some had hundreds of names, others barely worked. The
                reviews
                looked copied and pasted, the prices never matched what we were told over the phone, and every website
                claimed to be
                “the best.” We started wondering if anyone was checking what these companies actually did.

            </p>
            <p class="according_to">There wasn’t one place that felt real.</p>
            <p>
                Not one space where you could find verified moving companies and actually believe the information in
                front of you.
            </p>
            <p class="according_to mt-4"> That’s when the idea started to form.</p>
            <ol class="mb-0  list-unstyled">
                <p>
                    What if there was a single moving platform that didn’t try to sell you something first, but helped
                    you find movers online who were actually licensed, reviewed, and transparent?
                </p>
                <p>
                    We weren’t thinking of building a business. We were thinking of fixing something that clearly didn’t
                    work.
                </p>
                <p>
                    The early days of My Moving Journey were rough. We built lists by hand, called movers ourselves,
                    checked licenses, and read reviews line by line. We deleted more companies than we added.
                </p>
                <p>
                    But with every small check and every verified name, the idea felt more solid, like maybe we could
                    actually make moving a little less frustrating for people like us.
                </p>
                <p>
                    Over time, that list became a full moving directory USA; a place where you can compare moving
                    companies, read honest reviews, and choose from movers who are really in the business of helping,
                    not scamming.
                </p>
                <p>That’s how <b>My Moving Journey</b> started. A belief that if no one else was going to fix this, we would
                </p>
                <section class="focus-section">
                    <div class="container">
                        <h2>Our Track Record </h2>

                        <div class="row g-4">
                            <div class="col-lg-4 col-md-6">
                                <div class="focus_card">
                                    <h3>500+ Verified Movers</h3>
                                    <p>Every company you see here has been checked for licensing, reviews, and credibility
                                        before
                                        being added.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="focus_card">
                                    <h3>3,500+ Cities Covered</h3>
                                    <p>From small towns to major metros, we help people find movers in USA wherever they
                                        are.
                                    </p>

                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="focus_card">
                                    <h3>1000+ Users Helped
                                    </h3>
                                    <p>People across the USA rely on our platform to compare movers and make informed
                                        decisions.
                                    </p>


                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <h2 class="stm-faq-heading">What We Saw, What We Changed</h2>
                <p>The more we looked, the clearer it became; the moving world was just messy.</p>
                <p>People were doing everything right and still ending up with the wrong movers. </p>
                <p>So we slowed down, paid attention, and started changing things.</p>
                <p class="according_to">What We Saw</p>
                <div class="mt-4">
                    <div class="location-item"><i class="bi bi-check-circle-fill"></i>Movers listed on dozens of websites
                        with
                        no
                        real checks behind them.</div>
                    <div class="location-item"><i class="bi bi-check-circle-fill"></i> Prices are changing every day with
                        no
                        clear
                        reason.

                    </div>
                    <div class="location-item"><i class="bi bi-check-circle-fill"></i> Reviews written to impress, not to
                        inform.
                    </div>
                    <div class="location-item"><i class="bi bi-check-circle-fill"></i> People searching “local movers near
                        me”
                        or
                        “long distance movers in USA" and getting overwhelmed instead of
                        being helped.
                    </div>
                    <div class="location-item"><i class="bi bi-check-circle-fill"></i>A hundred “moving directories,” but
                        none
                        that
                        actually verified anything. </div>
                </div>
                <p class="according_to">What We Changed</p>
                <div class="my-4">
                    <div class="location-item"><i class="bi bi-check-circle-fill"></i>Every company listed on My Moving
                        Journey is a verified moving company, checked for licenses,
                        insurance, and authenticity.</div>
                    <div class="location-item"><i class="bi bi-check-circle-fill"></i>We built a moving platform that puts
                        clarity first, no fake stars and no hidden details.
                    </div>
                    <div class="location-item"><i class="bi bi-check-circle-fill"></i> We added tools that let people
                        compare
                        moving companies honestly, without needing ten tabs open.
                    </div>
                    <div class="location-item"><i class="bi bi-check-circle-fill"></i> We focused on quality, not
                        quantity.
                    </div>
                    <div class="location-item"><i class="bi bi-check-circle-fill"></i> We made information simple enough
                        for
                        anyone to find movers online without second-guessing every
                        click. </div>
                </div>
        </div>
        <!-- How We Rank Section -->
        <div class="container">
            <div class="ranking-section">
                <h2 class="mt-0">Our Mission</h2>
                <p>Our mission is to make finding movers in the USA clear, honest, and effortless. My Moving Journey was
                    built
                    to help people connect with verified moving companies they can truly trust.</p>
                <p>Moving is already stressful; finding help for it shouldn’t be. That’s really what drives us. </p>
            </div>
        </div>
        <div class="container mt-5">
            <div class="col-lg-12 ">
                <h2 class="stm-faq-heading">What You Can Expect From Us</h2>
                <div class="col-lg-10">
                    <p class="intro-text ">
                        We built My Moving Journey to make things clear for people who are tired of searching through
                        confusing
                        websites and uncertain listings. Everything here is made to be easy to understand and simple to use.
                    </p>
                </div>
                <p>
                    You will get reliable information that helps you find movers in USA you can actually count on
                </p>

                <div class="step-section">
                    <h3 class="step-subtitle">Verified movers only</h3>
                    <p class="step-content">Every mover listed here goes through a basic check for licensing, reviews, and
                        credibility. If something doesn’t add up, we don’t list it. We want you to see only trusted movers
                        in
                        USA, not random names copied from somewhere else.
                    </p>
                </div>

                <div class="step-section">
                    <h3 class="step-subtitle">Clear information</h3>
                    <p class="step-content">We avoid complicated terms and long descriptions. You’ll find pricing details,
                        services offered, and reviews, so you can make your decision without confusion.
                    </p>
                </div>

                <div class="step-section">
                    <h3 class="step-subtitle">Regular updates</h3>
                    <p class="step-content">Things change, and so do companies. We update listings often, review feedback,
                        and
                        remove movers that no longer meet our standards.
                    </p>
                </div>

                <div class="step-section">
                    <h3 class="step-subtitle">Useful tools</h3>
                    <p class="step-content">Whether you want to compare moving companies, find movers online near you, or
                        get a
                        free moving quote, everything is designed to save you time.
                    </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Steady improvement</h3>
                    <p class="step-content">We keep listening to people who use the site. Every review, every suggestion
                        helps
                        us make My Moving Journey a little more useful and trustworthy each day.

                    </p>
                </div>
                <section class="focus-section">
                    <div class="container">
                        <h2 class="text-start">We’re Glad You’re Here</h2>
                        <p>If you’ve read this far, you probably understand what My Moving Journey is really about.</p>
                        <p>We know what it feels like to be unsure about who to trust or where to start. That’s why
                            we built this space.</p>

                        <p>We’re not a big company. We’re a small group of people who’ve been through the same stress, the
                            same searching, the same late nights looking for <b>movers in USA</b> that won’t disappear when
                            things
                            get real. We built this for people like us; people who just want to move without being misled.
                        </p>

                        <p>So if My Moving Journey helps you find even one mover that makes your next step easier,
                            then it’s doing what it was meant to do.</p>

                        <div class="git-card my-4">
                            <h2 class="text-start mt-4 mb-2">Stay Connected</h2>
                        <p>We love keeping our moving community engaged! </p>
                        <p>Follow us on social media to get helpful moving tips, real
                            updates,
                            and small ideas
                            that make your next move easier.</p>
                        <div class="git-social">
                            <div class="git-social-icons">
                                <a href="https://www.facebook.com/mymovingjourney/" target="_blank" class="git-social-btn facebook">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="https://www.linkedin.com/company/mymovingjourney/" target="_blank" class="git-social-btn linkedin">
                            <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                            <span>LinkedIn</span>
                        </a>
                        <a href="https://x.com/mymovingjourney" target="_blank" class="git-social-btn twitter">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                            <span>Twitter</span>
                        </a>
                        <a href="https://www.pinterest.com/mymovingjourneyUS/" target="_blank" class="git-social-btn pinterest">
                            <i class="fab fa-pinterest" aria-hidden="true"></i>
                            <span>Pinterest</span>
                        </a>
                            </div>

                    </div>
                </section>
            </div>

        </div>
    </div>
    <script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "WebPage",
    "name": "About Us | My Moving Journey",
    "url": "https://www.mymovinjourney.com/about",
    "description": "We built My Moving Journey because moving was messy. Now it’s easier to find verified, reliable movers in USA without wasting time or energy.",
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
            "url": "https://www.mymovinjourney.com",
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
    <!-- End Company Dashboard Area -->
@endsection
