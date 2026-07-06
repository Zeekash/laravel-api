@extends('layouts.app')
@section('title', 'The Ultimate Moving Checklist – Printable & Downloadable Edition')
@section('meta_description',
    'Get organized with our ultimate moving checklist! Download and print it to stay on track
    with every step of your move and ensure a smooth transition.')
@section('meta_keywords', 'Moving Checklist')
@section('og:title')
    The Ultimate Moving Checklist – Printable and Downloadable
@endsection
@section('og:description')
    Get organized with our ultimate moving checklist! Download and print it to stay on track with every step of your move
    and ensure a smooth transition.
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/checklist.css') }}">
    <div class="container">
        <!-- Breadcrumbs -->
        <div class="show_breadcrumbs mt-5 mt-md-0 mb-3 mb-md-0">
            <div class="col-12">
                <nav style="--bs-breadcrumb-divider: '➜';" class="pb-1 mb-0 rounded-3" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="py-2"><i
                                    class="fas fa-home me-1 home_icon"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/blogs') }}" class="py-2"> Blogs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Moving Checklist</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Title Section -->
        <div class="title-section mt-2 mb-5">
            <h1>The Ultimate Moving Checklist – Printable Version</h1>
            {{-- <p>Your comprehensive guide to a stress-free moving experience</p> --}}
        </div>

        <!-- Banner Section with Image -->
        <div class="banner-section">
            <img src="{{ asset('assets/img/check_list_2.webp') }}" alt="Moving boxes and a happy family in their new home"
                class="banner-image">
        </div>

        <!-- Intro Content -->
        <div class="intro-content">

            <p>Moving is considered one of the most exciting yet overwhelming milestones in life. It doesn't matter if
                you're moving across town or to a new state; the process of packing up your belongings and settling into a
                new home can feel so stressful.</p>
            <p>
                With so many tasks to juggle, it's no surprise that many people find it difficult to stay on top of
                everything.
            </p>
            <p>
                That's why you need this Ultimate Moving Checklist. It is designed to take the stress out of your move; this
                checklist will break down the moving process into easy-to-follow steps. With this, you can ensure that no
                task is overlooked and that each stage of the move is handled at the right time.
            </p>
            <p>
                Unlike many checklists, which leave you scrambling to remember important details, this printable edition is
                easy to follow.
            </p>
            <div class="table_content_checklist">
                <h2>Table of Content</h2>
                <ul>
                    @foreach ($checklist as $categoryId => $items)
                        <li class="">
                            <a href="#category{{ $categoryId }}" class="anchor_category">
                                {{ $items->first()->category->heading }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 mt-5">
                <div class="new_card p-sm-4 p-2">
                    <div class="card-body d-sm-flex align-items-center p-0">
                        <div class="content_div">
                            <p class="mb-0">Please keep in mind that some tasks in this checklist may overlap with other
                                categories. If
                                you’ve already completed a task listed in another section, feel free to skip it or simply
                                check it off. Continue working through the checklist and jump to the next task that applies
                                to your current stage of the move. </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="check_list_btn text-center my-4">
            <button type="button" onclick="printChecklist()">
                <i class="fa-solid fa-print"></i>
                <span>Print</span>
            </button>
            <button type="button" class="checklist_btn ms-2" onclick="downloadChecklist()">
                <i class="fa-solid fa-download"></i>
                <span>Download</span>
            </button>
        </div>
        <form id="checklist-form ">
            @csrf
            <div class="checklist-container">
                @foreach ($checklist as $categoryId => $items)
                    <div class="checklist-section">
                        <h2 id="category{{ $categoryId }}"> {{ $items->first()->category->heading }}</h2>
                        <p>{!! $items->first()->category->description !!}</p>
                        @foreach ($items as $index => $item)
                            <div class="check_list">
                                <label class="checklist-item" for="item{{ $item->id }}">
                                    <div class="checklist-top">
                                        <input type="checkbox" id="item{{ $item->id }}" name="checklist[]"
                                            value="{{ $item->id }}"
                                            {{ in_array($item->id, $checkedItems ?? []) ? 'checked' : '' }}>
                                        <strong class="item-title">{!! $item->heading !!}</strong>
                                    </div>
                                    <div class="item-details">
                                        <p>{!! $item->description !!}</p>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </div>
        </form>
        <div class="additional_tip my-5" id="additional_tips">
            <h3 class="fw-bold checklist_headi">
                Extra Moving Tips to Keep in Mind</h3>
            <p>
                The moving process is almost complete, but these
                final tips will help you wrap things up smoothly.
            </p>
            <div class="checklist_bottom "><span>
                    Don't Rush the Planning Process
                </span>
                <br>
                <p>
                    Starting your <a href="https://mymovingjourney.com/blogs/how-to-plan-a-move"
                        target="_blank"><strong>moving plan</strong></a> early is key to avoiding stress. Aim to begin at
                    least 6-8 weeks before your
                    <a href="https://mymovingjourney.com/blogs/moving-equipment-and-tools-you-must-have-on-moving-day"
                        target="_blank"><strong>moving day</strong></a>. This gives you time to pack efficiently without
                    feeling rushed.
                </p>
            </div>
            <div class="checklist_bottom "><span>
                    Label Boxes Like a Pro
                </span>
                <br>
                <p>
                    Instead of generic labels like "<a
                        href="https://mymovingjourney.com/blogs/how-to-pack-your-kitchen-for-moving"
                        target="_blank"><strong> Kitchen</strong></a>" or "Living Room," be specific—" Plates & Cups" or
                    " <a href="https://mymovingjourney.com/blogs/how-to-pack-fragile-items-prep-tools-tips-and-more"
                        target="_blank"><strong>Fragile</strong></a>:
                    Glassware." This will make your <a href="https://mymovingjourney.com/blogs/how-to-unpack-after-moving"
                        target="_blank"><strong>unpacking process</strong></a> easier and save you time in the long run.
                </p>
            </div>
            <div class="checklist_bottom "><span>
                    Take Detailed Inventory of Your Items
                </span>
                <br>
                <p>
                    Before you start packing, take an inventory of your belongings, especially
                    high-value or fragile items.
                    Photograph them and make a list, noting their condition. This will come in handy if you need to file any
                    insurance claims for <a href="https://mymovingjourney.com/blogs/how-to-file-a-damage-claim-after-a-move"
                        target="_blank"><strong>damaged goods</strong></a>.
                </p>
            </div>
            <div class="checklist_bottom "><span>
                    Use Smart Packing for Fragile Items
                </span>
                <br>
                <p>
                    Protect your most delicate items by packing them carefully. If you're handling fragile items like
                    glassware, <a href="https://mymovingjourney.com/blogs/how-to-pack-electronics-for-moving"
                        target="_blank"><strong>electronics</strong></a>, or <a
                        href="https://mymovingjourney.com/blogs/how-to-pack-artwork-for-moving"
                        target="_blank"><strong>artwork</strong></a>, wrap them securely in <a
                        href="https://mymovingjourney.com/blogs/where-to-buy-bubble-wrap-for-moving"
                        target="_blank"><strong>bubble wrap</strong></a> or
                    soft materials (<a href="https://mymovingjourney.com/blogs/what-are-moving-blankets-and-how-to-use-them"
                        target="_blank"><strong>blankets</strong></a> ,
                    towels, etc.).
                </p>
            </div>
            <div class="checklist_bottom "><span>
                    Prioritize Your Mental Well-being
                </span>
                <br>
                <p>
                    Moving is an emotional and physical rollercoaster. It's important to manage your stress levels and take
                    regular breaks. Hydrate, eat well and don't hesitate to ask for help from friends or professionals.
                </p>
            </div>
            <div class="checklist_bottom "><span>
                    Be Realistic About the Time You Need to Unpack
                </span>
                <br>
                <p>
                    Unpacking is a process, not a one-day job. Don't expect to be
                    fully settled in within a few hours. Focus
                    on unpacking one room at a time and give yourself grace if it takes a few days to get everything in its
                    place.
                </p>
            </div>
            <div class="checklist_bottom "><span>
                    Make Your First Night Comfortable
                </span>
                <br>
                <p>
                    The first night in <a href="https://mymovingjourney.com/blogs/tips-for-moving-into-a-new-house"
                        target="_blank"><strong>your new home</strong></a> can be hectic, so set up an area for comfort.
                    Make sure your essentials
                    box is easily accessible, and don't forget items that will help you settle in..
                </p>
            </div>
        </div>
    </div>

    <script>
        // Add smooth scrolling to table of contents links
        document.querySelectorAll('.anchor_category').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    const headerOffset = 230; // Adjust this value based on your header height
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Toggle the 'checked' class on the label when the checkbox changes
        document.querySelectorAll('.checklist-item input[type="checkbox"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                const label = this.closest('.checklist-item');
                if (this.checked) {
                    label.classList.add('checked');
                } else {
                    label.classList.remove('checked');
                }
            });
        });

        // Ensure clicking on the content area toggles the checkbox as well
        document.querySelectorAll('.checklist_content').forEach(function(content) {
            content.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent any default behavior
                const label = this.closest('.checklist-item');
                const checkbox = label.querySelector('input[type="checkbox"]');
                checkbox.checked = !checkbox.checked;
                checkbox.dispatchEvent(new Event('change'));
            });
        });
    </script>

    <script>
        function printChecklist() {
            const checklistContainer = document.querySelector('.checklist-container').cloneNode(true);

            // Apply styles for checked state
            checklistContainer.querySelectorAll('.check_list').forEach(function(item) {
                const checkbox = item.querySelector('input[type="checkbox"]');
                const label = item.querySelector('.checklist-item');

                if (checkbox.checked) {
                    label.classList.add('checked');
                } else {
                    label.classList.remove('checked');
                }

                // Show a visual replacement for checkboxes (static look)
                checkbox.outerHTML = checkbox.checked ?
                    '<span class="checkbox-print checked">&#10003;</span>' :
                    '<span class="checkbox-print">&#9634;</span>';
            });

            let printWindow = window.open('', '', 'width=800,height=600');
            printWindow.document.write(`
            <html>
                <head>
                    <title>Print Checklist</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            padding: 20px;
                        }
                        h2 {
                            border-bottom: 1px solid #ccc;
                            margin-top: 20px;
                        }
                        .check_list {
                            margin: 12px 0;
                        }
                        .checklist-item {
                            display: flex;
                            flex-direction: column;
                            padding: 8px;
                        }
                        .checklist-top {
                            display: flex;
                            align-items: center;
                            gap: 8px;
                        }
                        .checkbox-print {
                            font-size: 18px;
                            width: 20px;
                            display: inline-block;
                        }
                        .checked .item-title {
                            text-decoration: line-through;
                            color: #777;
                        }
                        .checked .item-details p {
                            text-decoration: line-through;
                            color: #999;
                        }
                    </style>
                </head>
                <body>
                    ${checklistContainer.innerHTML}
                </body>
            </html>
        `);
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            // printWindow.close();
        }
    </script>
    <script>
        function downloadChecklist() {
            let checklistItems = [];
            let checkedItems = [];

            // Collect all checklist items (checked and unchecked)
            document.querySelectorAll('input[name="checklist[]"]').forEach((checkbox) => {
                checklistItems.push(checkbox.value);
                if (checkbox.checked) {
                    checkedItems.push(checkbox.value);
                }
            });

            if (checklistItems.length === 0) {
                alert('Checklist is empty.');
                return;
            }

            let form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('checklist.download') }}";

            let csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = "{{ csrf_token() }}";
            form.appendChild(csrfInput);

            checklistItems.forEach((item) => {
                let inputValue = document.createElement('input');
                inputValue.type = 'hidden';
                inputValue.name = 'checklist[]';
                inputValue.value = item;
                form.appendChild(inputValue);
            });

            checkedItems.forEach((item) => {
                let inputChecked = document.createElement('input');
                inputChecked.type = 'hidden';
                inputChecked.name = 'checked[]';
                inputChecked.value = item;
                form.appendChild(inputChecked);
            });

            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        }
    </script>

    <!-- Schema Markup -->
    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "name": "The Ultimate Moving Checklist – Printable & Downloadable Edition",
        "url": "https://mymovingjourney.com/blogs/moving-checklist",
        "description": "Get organized with our ultimate moving checklist! Download and print it to stay on track with every step of your move and ensure a smooth transition."
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "WebSite",
        "name": "MyMovingJourney",
        "url": "https://mymovingjourney.com"
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "https://mymovingjourney.com/"
        }, {
            "@type": "ListItem",
            "position": 2,
            "name": "Blogs",
            "item": "https://mymovingjourney.com/blogs"
        }, {
            "@type": "ListItem",
            "position": 3,
            "name": "Moving Checklist",
            "item": "{{url()->current()}}"
        }]
    }
    </script>
@endsection
