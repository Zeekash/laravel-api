@extends('layouts.app')
@section('title', 'Movers A–Z Directory | Search Licensed Movers in the USA')
@section('meta_description')
    Looking for a mover you can actually trust? Use our A–Z movers directory to search movers in the USA. They are all
    verified and easy to browse.
@endsection
@section('meta_keywords', 'Movers List')
@section('head')
    <meta name="robots" content="index, follow">
@endsection
@section('og:title')
    Movers A–Z Directory | Search Licensed Movers in the USA
@endsection
@section('og:description')
    Looking for a mover you can actually trust? Use our A–Z movers directory to search movers in the USA. They are all
    verified and easy to browse.
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/mover-list.css') }}">

    <style>
        /* Exact yellow, tight look, no extra spacing */
        .hl {
            background: #ffd73a;
            /* the color you showed */
            display: inline;
            padding: 0;
            margin: 0;
            border-radius: 2px;
            /* optional */
            box-decoration-break: clone;
            -webkit-box-decoration-break: clone;
        }

        /* Optional: tiny outline to sharpen edges (remove if not desired) */
        .hl {
            outline: 1px solid rgba(0, 0, 0, 0.05);
        }
    </style>
    <div class=" container_main">
        <div class="container">
            <div class="container py-4">
                <!-- Breadcrumb -->
                <div class="show_breadcrumbs my-1 mt-5 mt-md-0">
                    <div class="col-12">
                        <nav style="--bs-breadcrumb-divider: '➜';" class="pb-1 mb-0 rounded-3" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 justif-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="py-2"><i
                                            class="fas fa-home me-1 home_icon"></i>
                                        Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    Movers List
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- Heading -->
                <h1 class="mb-3 text_col">Mover List A-Z</h1>

                <!-- Author Box -->
                <div class="author-box">
                    <div class="author-info">
                        <img src="{{ asset('assets/img/author_img.png') }}" alt="Author" />
                        <div>
                            <span class="author-label">Author</span>
                            <h6 class="author_name"><a href="https://www.linkedin.com/in/honey-jay/" target="_blank">Honey
                                    Jay <i class="fa-brands fa-linkedin" style="color: var(--bg);"></i></a></h6>
                        </div>
                    </div>
                    <div class="text-end">
                        <span class="author-label">Updated:</span><br />
                        <strong>{{ date('M') }} {{ date('Y') }}</strong>
                    </div>
                </div>
                <p>Below is our ultimate Movers Directory, last updated in {{ date('M') }} {{ date('Y') }}. Our
                    movers' list is arranged in
                    alphabetical order. You can browse all mover brands — over <b>{{ $total_company }} </b>in total —
                    from A to Z here.</p>


                <section class="mover-search-section mt-4 pb-3">
                    <div class="col-lg-9 mover-box  mx-auto">
                        <form action="{{ route('company.mover-list') }}#mover" method="GET">
                            <h2 class="mover-box-title m-0">Search Movers</h2>

                            <p class="mb-0">Find reliable and professional movers for your next relocation</p>
                            <div class="row align-items-end">
                                <div class="col-md-8">
                                    <div class="mover-search-bar" id="mover">


                                        <div class="input-group mover-input-group">
                                            <input type="search" name="search" class="form-control mover-search-input"
                                                value="{{ request('search') }}" placeholder="Search Movers By Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center mt-md-4 mt-2">
                                        <button class="btn mover-submit-btn w-100 py-2">Search</button>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </section>

            </div>

            <div class="container py-4">
                {{-- Title --}}
                <div class="mt-4">
                    @if ($search === '')
                        <h3>All Movers ({{ $total_company }})</h3>
                    @else
                        <h3>Found {{ $count }} result{{ $count === 1 ? '' : 's' }} for “{{ e($search) }}”
                        </h3>
                    @endif
                </div>
                <hr />

                {{-- Group by first letter, separate numeric --}}
                @php
                    $companiesByLetter = [];
                    $numericCompanies = [];

                    foreach ($companies as $company) {
                        $firstLetter = strtoupper(substr($company->company_name, 0, 1));
                        if (is_numeric($firstLetter)) {
                            $numericCompanies[] = $company;
                        } else {
                            $companiesByLetter[$firstLetter] = $companiesByLetter[$firstLetter] ?? [];
                            $companiesByLetter[$firstLetter][] = $company;
                        }
                    }
                    ksort($companiesByLetter);
                @endphp

                {{-- 0–9 --}}
                @if (count($numericCompanies) > 0)
                    <div class="brand-section">
                        <h5>0–9</h5>
                        <div class="brand-links">
                            @foreach ($numericCompanies as $index => $company)
                                <a href="{{ route('company.show', $company->slug) }}"
                                    class="company-link {{ $index >= 8 ? 'hidden-company' : '' }}">
                                    {!! $company->highlighted_name ?? e($company->company_name) !!}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @if (count($numericCompanies) > 8)
                        <a href="javascript:void(0)" class="see-toggle-link">See More</a>
                    @endif
                    <hr />
                @endif




                {{-- A–Z --}}
                @foreach ($companiesByLetter as $letter => $letterCompanies)
                    <div class="brand-section">
                        <h5>{{ $letter }}</h5>
                        <div class="brand-links">
                            @foreach ($letterCompanies as $index => $company)
                                <a href="{{ route('company.show', $company->slug) }}"
                                    class="company-link {{ $index >= 8 ? 'hidden-company' : '' }}">
                                    {!! $company->highlighted_name ?? e($company->company_name) !!}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @if (count($letterCompanies) > 8)
                        <a href="javascript:void(0)" class="see-toggle-link">See More</a>
                    @endif
                    <hr />
                @endforeach

            </div>

            <section class="container py-3">
                <p class="according_to"> Key Facts:</p>
                <ol class="mb-0 mt-4 list-unstyled">
                    <li>
                        <div class="listing">
                            <span class="list_description">
                                100% of the movers listed here are licensed movers in the USA, verified through official
                                databases
                            </span>
                        </div>
                    </li>
                    <li>
                        <div class="listing">
                            <span class="list_description">
                                Around 80% of the companies in our Moving Companies Directory offer instant quotes or
                                online booking.

                            </span>
                        </div>
                    </li>
                    <li>
                        <div class="listing">
                            <span class="list_description">
                                Every mover in this A–Z list operates with a valid USDOT number or state
                                authorization.
                            </span>
                        </div>
                    </li>
                    <li>
                        <div class="listing">
                            <span class="list_description">
                                Nearly 60% of the movers on our list specialize in interstate or long-distance moves,
                                while others focus on local moving services within your area.
                            </span>
                        </div>
                    </li>
                    <li>
                        <div class="listing">
                            <span class="list_description">
                                Our database includes <b>{{ $total_company }}</b> active moving companies, and we
                                update it monthly to help
                                users find movers they can trust
                            </span>
                        </div>
                    </li>
                </ol>

                <section class="movers-by-state-section mb-5">
                    <div class="movers-state-card">
                        <div class="state-header">
                            <h2 class="state-title my-0">Movers by State</h2>
                            {{-- <button id="toggleStates" class="see-more-btn">
                                See More
                            </button> --}}
                        </div>

                        <div class="states-grid" id="statesList">
                            @if (isset($all_states) && $all_states->count() > 0)
                                @foreach ($all_states as $index => $state)
                                    <div
                                        class="state-item
                                        {{-- {{ $index >= 6 ? 'hidden-state d-none' : '' }} --}}
                                         ">
                                        <a href="{{ route('state.show', $state->slug) }}" class="state-link">

                                            <span class="state-name">{{ $state->state }}</span>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </section>

                <div class="faq-section mt-5">
                    <h2>Frequently Asked Questions</h2>

                    <div class="accordion mt-4" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header m-0" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne">
                                    How do I know if a moving company is licensed and verified?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Before hiring, always check if the mover has a valid USDOT number listed under the
                                    <a href="https://www.fmcsa.dot.gov/" target='_blank' rel='nofollow'>Federal Motor
                                        Carrier Safety Administration (FMCSA)</a>. Every mover in our directory is licensed
                                    and
                                    verified
                                    through these records, so you don’t have to double-guess their legitimacy.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header m-0" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo">
                                    What should I look for when comparing moving companies?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Start with the basics: licensing, insurance, and clear pricing. Then compare how
                                    they
                                    communicate, how detailed their quotes are, and what real customers say about them.
                                    A
                                    mover that
                                    answers clearly and gives you time to decide is usually the one you can trust.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header m-0" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree">
                                    Are local movers and long-distance movers different?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes. Local movers handle short-distance or in-state relocations, while interstate or
                                    long-distance movers manage moves across state lines. Each type follows different
                                    licensing
                                    rules.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header m-0" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour">
                                    How can I avoid moving scams or fake companies?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Stay away from movers who ask for large cash deposits upfront, don’t share a
                                    business
                                    address,
                                    or refuse to give a <a
                                        href="https://mymovingjourney.com/blogs/how-to-check-a-moving-companys-usdot-number">USDOT
                                        number</a>. Always use trusted sources so you can find movers
                                    without
                                    worrying about scams.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('.brand-section');
            sections.forEach(section => {
                let toggle = section.querySelector('.see-toggle-link');
                if (!toggle) {
                    const sib = section.nextElementSibling;
                    if (sib && sib.classList && sib.classList.contains('see-toggle-link')) {
                        toggle = sib;
                    }
                }
                const container = section.querySelector('.brand-links');
                const items = Array.from(section.querySelectorAll('.company-link'));
                if (!toggle) return;
                if (items.length <= 8) {
                    toggle.style.display = 'none';
                    return;
                }
                let expanded = items.filter(a => a.classList.contains('hidden-company')).length === 0;

                function apply() {
                    if (expanded) {
                        items.forEach(a => a.classList.remove('hidden-company'));
                        toggle.textContent = 'See Less';
                        // Keep toggle at bottom (outside brand-links)
                    } else {
                        items.forEach((a, i) => {
                            if (i >= 8) a.classList.add('hidden-company');
                            else a.classList.remove('hidden-company');
                        });
                        toggle.textContent = 'See More';
                        // Keep toggle at bottom (outside brand-links)
                    }
                }
                apply();
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    const savedY = window.scrollY;
                    toggle.blur();
                    expanded = !expanded;
                    apply();
                    if (expanded) {
                        // Keep the page at the same position on expand
                        window.scrollTo({
                            top: savedY
                        });
                    } else {
                        // Keep the page at the same position on collapse as well
                        window.scrollTo({
                            top: savedY
                        });
                    }
                });
            });
        });
    </script>

    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "name": "Movers A–Z Directory | Search Licensed Movers in the USA",
        "url": "{{url()->current()}}",
        "description": "Looking for a mover you can actually trust? Use our A–Z movers directory to search movers in the USA. They are all verified and easy to browse.",
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
        "name": "My Moving Journey",
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

    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "My Moving Journey",
        "item": "https://mymovingjourney.com/"
        }, {
        "@type": "ListItem",
        "position": 2,
        "name": "Mover List (A-Z)",
        "item": "{{url()->current()}}"
        }]
    }
</script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How do I know if a moving company is licensed and verified?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Before hiring, always check if the mover has a valid USDOT number listed under the Federal Motor Carrier Safety Administration (FMCSA). Every mover in our directory is licensed and verified through these records, so you don’t have to double-guess their legitimacy."
          }
        },
        {
          "@type": "Question",
          "name": "What should I look for when comparing moving companies?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Start with the basics: licensing, insurance, and clear pricing. Then compare how they communicate, how detailed their quotes are, and what real customers say about them. A mover that answers clearly and gives you time to decide is usually the one you can trust."
          }
        },
        {
          "@type": "Question",
          "name": "Are local movers and long-distance movers different?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Local movers handle short-distance or in-state relocations, while interstate or long-distance movers manage moves across state lines. Each type follows different licensing rules."
          }
        },
        {
          "@type": "Question",
          "name": "How can I avoid moving scams or fake companies?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Stay away from movers who ask for large cash deposits upfront, don’t share a business address, or refuse to give a USDOT number. Always use trusted sources so you can find movers without worrying about scams."
          }
        }
      ]
    }
    </script>

@endsection
