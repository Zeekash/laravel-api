<!-- sidebar menu area start -->
@php
    $company = Auth::guard('company')->user();
    $ordersCount = 0;
    if ($company) {
        $ordersCount = \App\Models\Order::where('company_id', $company->id)->count();
    }
@endphp

<!-- Overlay for mobile -->
<div class="" onclick="toggleSidebar()"></div>

<div class="sidebar">
    <div class="sidebar-logo">
        <div class="sidebar-logo-box">
            <svg viewBox="0 0 24 24">
                <path d="M1 3h15v13H1zM16 8h4l3 3v5h-7V8zM5.5 19a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm13 0a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
            </svg>
        </div>
        <div>
            <div class="sidebar-logo-name">MY Moving Journey</div>
        </div>
    </div>

    <div class="nav-section">
        <div class="nav-section-label">Main</div>

        @if ($company)
            <div class="nav-item {{ Route::is('company.dashboard') ? 'active' : '' }}"
                onclick="window.location.href='{{ route('company.dashboard') }}'">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                </svg>
                Dashboard
            </div>

            <div class="nav-item {{ Route::is('company.edit') ? 'active' : '' }}"
                onclick="window.location.href='{{ route('company.edit', $company->slug) }}'">
                <svg viewBox="0 0 24 24">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
                Manage Profile
            </div>

            <div class="nav-item {{ Route::is('company.review') ? 'active' : '' }}"
                onclick="window.location.href='{{ route('company.review', $company->slug) }}'">
                <svg viewBox="0 0 24 24">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                </svg>
                Manage Reviews
            </div>

            <div class="nav-item {{ Route::is('company.mover_leads') ? 'active' : '' }}"
                onclick="window.location.href='{{ route('company.mover_leads') }}'">
                <svg viewBox="0 0 24 24">
                    <rect x="1" y="3" width="15" height="13" />
                    <polygon points="16 8 20 8 23 11 23 16 16 16 16 8" />
                    <circle cx="5.5" cy="18.5" r="2.5" />
                    <circle cx="18.5" cy="18.5" r="2.5" />
                </svg>
                Mover Leads
            </div>

            @if ($ordersCount > 0)
                <div class="nav-item {{ Route::is('company.orders.list') ? 'active' : '' }}"
                    onclick="window.location.href='{{ route('company.orders.list') }}'">
                    <svg viewBox="0 0 24 24">
                        <circle cx="9" cy="21" r="1" />
                        <circle cx="20" cy="21" r="1" />
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                    </svg>
                    Orders
                </div>
            @endif

            <div class="nav-item {{ Route::is('company.contact-us') ? 'active' : '' }}"
                onclick="window.location.href='{{ route('company.contact-us', $company->slug) }}'">
                <svg viewBox="0 0 24 24">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                </svg>
                Contact Us
            </div>

            <div class="nav-item {{ Route::is('company.payment-methods.index') ? 'active' : '' }}"
                onclick="window.location.href='{{ route('company.payment-methods.index', $company->slug) }}'">
                <svg viewBox="0 0 24 24">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2" />
                    <line x1="1" y1="10" x2="23" y2="10" />
                </svg>
                Payment Methods
            </div>

            <div>
                <label class="nav-section-label">Subscription Plans</label>
            </div>
            

            <div class="nav-item {{ Route::is('company.sponsored-posts.*') ? 'active' : '' }}"
                onclick="window.location.href='{{ route('company.sponsored-posts.index') }}'">
                <svg viewBox="0 0 24 24">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
                Sponsored Blogs
            </div>

            @php
                $cityActive     = Route::is('company.city-featured-ads.*') || Route::is('company.city-featured-invoices.*');
                $stateActive    = Route::is('company.state-featured-ads.*') || Route::is('company.state-featured-invoices.*');
                $routeActive    = Route::is('company.route-featured-ads.*') || Route::is('company.route-featured-invoices.*');
                $resourceActive = Route::is('company.resource-featured-ads.*') || Route::is('company.resource-featured-invoices.*');
                $featActive     = $cityActive || $stateActive || $routeActive || $resourceActive;
            @endphp

            <div class="nav-item {{ $featActive ? 'active' : '' }}" onclick="toggleSubmenu(this)">
                <svg viewBox="0 0 24 24">
                    <polygon points="12 2 22 7 12 12 2 7 12 2"></polygon>
                    <polyline points="2 17 12 22 22 17"></polyline>
                    <polyline points="2 12 12 17 22 12"></polyline>
                </svg>
                Feature Subscriptions
                <svg class="nav-arrow" viewBox="0 0 24 24" style="{{ $featActive ? 'transform:rotate(180deg);' : '' }}">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </div>
            <div class="nav-submenu {{ $featActive ? 'open' : '' }}">

                {{-- City Features --}}
                <div class="nav-submenu-group-header {{ $cityActive ? 'active' : '' }}" onclick="toggleNestedSubmenu(this)">
                    City Features
                    <svg class="nav-arrow" viewBox="0 0 24 24" style="{{ $cityActive ? 'transform:rotate(180deg);' : '' }}">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
                <div class="nav-nested-submenu {{ $cityActive ? 'open' : '' }}">
                    <a href="{{ route('company.city-featured-ads.index') }}" class="nav-nested-item {{ Route::is('company.city-featured-ads.*') ? 'active' : '' }}">Plans</a>
                    <a href="{{ route('company.city-featured-invoices.index') }}" class="nav-nested-item {{ Route::is('company.city-featured-invoices.*') ? 'active' : '' }}">Invoices</a>
                </div>

                {{-- State Features --}}
                <div class="nav-submenu-group-header {{ $stateActive ? 'active' : '' }}" onclick="toggleNestedSubmenu(this)">
                    State Features
                    <svg class="nav-arrow" viewBox="0 0 24 24" style="{{ $stateActive ? 'transform:rotate(180deg);' : '' }}">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
                <div class="nav-nested-submenu {{ $stateActive ? 'open' : '' }}">
                    <a href="{{ route('company.state-featured-ads.index') }}" class="nav-nested-item {{ Route::is('company.state-featured-ads.*') ? 'active' : '' }}">Plans</a>
                    <a href="{{ route('company.state-featured-invoices.index') }}" class="nav-nested-item {{ Route::is('company.state-featured-invoices.*') ? 'active' : '' }}">Invoices</a>
                </div>

                {{-- Route Features --}}
                <div class="nav-submenu-group-header {{ $routeActive ? 'active' : '' }}" onclick="toggleNestedSubmenu(this)">
                    Route Features
                    <svg class="nav-arrow" viewBox="0 0 24 24" style="{{ $routeActive ? 'transform:rotate(180deg);' : '' }}">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
                <div class="nav-nested-submenu {{ $routeActive ? 'open' : '' }}">
                    <a href="{{ route('company.route-featured-ads.index') }}" class="nav-nested-item {{ Route::is('company.route-featured-ads.*') ? 'active' : '' }}">Plans</a>
                    <a href="{{ route('company.route-featured-invoices.index') }}" class="nav-nested-item {{ Route::is('company.route-featured-invoices.*') ? 'active' : '' }}">Invoices</a>
                </div>

                {{-- Resource Features --}}
                <div class="nav-submenu-group-header {{ $resourceActive ? 'active' : '' }}" onclick="toggleNestedSubmenu(this)">
                    Resource Features
                    <svg class="nav-arrow" viewBox="0 0 24 24" style="{{ $resourceActive ? 'transform:rotate(180deg);' : '' }}">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
                <div class="nav-nested-submenu {{ $resourceActive ? 'open' : '' }}">
                    <a href="{{ route('company.resource-featured-ads.index') }}" class="nav-nested-item {{ Route::is('company.resource-featured-ads.*') ? 'active' : '' }}">Plans</a>
                    <a href="{{ route('company.resource-featured-invoices.index') }}" class="nav-nested-item {{ Route::is('company.resource-featured-invoices.*') ? 'active' : '' }}">Invoices</a>
                </div>

            </div>
        @else
            <p class="text-center" style="color: var(--muted); padding: 20px;">Please sign in to access your dashboard.</p>
        @endif
    </div>

    @if ($company)
        <div class="sidebar-bottom">
            <div class="sidebar-user">
                <div class="sidebar-avatar">{{ substr($company->name ?? 'C', 0, 2) }}</div>
                <div>
                    <div class="sidebar-user-name">{{ $company->name ?? 'Company' }}</div>
                    <div class="sidebar-user-role">{{ $company->company_name ?? 'Company' }}</div>
                </div>
            </div>
            <button class="btn-signout" onclick="window.location.href='{{ route('company.logout') }}'">
                <svg viewBox="0 0 24 24">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" y1="12" x2="9" y2="12" />
                </svg>
                Sign Out
            </button>
        </div>
    @endif
</div>

<script>
    function toggleSubmenu(element) {
        const submenu = element.nextElementSibling;
        const arrow = element.querySelector('.nav-arrow');

        if (submenu && submenu.classList.contains('nav-submenu')) {
            submenu.classList.toggle('open');
            if (arrow) {
                arrow.style.transform = submenu.classList.contains('open') ? 'rotate(180deg)' : 'rotate(0deg)';
            }
        }
    }

    function toggleNestedSubmenu(element) {
        const nested = element.nextElementSibling;
        const arrow = element.querySelector('.nav-arrow');

        if (nested && nested.classList.contains('nav-nested-submenu')) {
            nested.classList.toggle('open');
            if (arrow) {
                arrow.style.transform = nested.classList.contains('open') ? 'rotate(180deg)' : 'rotate(0deg)';
            }
        }
    }

    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.querySelector('.sidebar-overlay');
        const menuBtn = document.getElementById('menu-btn');
        const closeBtn = document.getElementById('close-btn');

        sidebar.classList.toggle('open');
        if (overlay) overlay.classList.toggle('open');

        if (sidebar.classList.contains('open')) {
            if (menuBtn) menuBtn.style.display = 'none';
            if (closeBtn) closeBtn.style.display = 'block';
        } else {
            if (menuBtn) menuBtn.style.display = 'block';
            if (closeBtn) closeBtn.style.display = 'none';
        }
    }
</script>

<style>
    /* SIDEBAR OVERLAY */
    .sidebar-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        z-index: 999;
        opacity: 0;
        transition: opacity .3s ease;
    }

    .sidebar-overlay.open {
        opacity: 1;
    }

    /* SIDEBAR */
    .sidebar {
        overflow: auto;
        flex-shrink: 0;
        background: var(--navy, #0D1B38);
        display: flex;
        flex-direction: column;
        height: 100vh;
        overflow-y: auto;
        position: fixed;
        z-index: 1000;
        position: fixed;
        left: 0;
        top: 0;

        height: 100vh;
        width: 280px;
        transition: transform .3s ease;


    }

    .sidebar-logo {
        padding: 20px 18px 16px;
        display: flex;
        align-items: center;
        gap: 9px;
        border-bottom: 1px solid rgba(255, 255, 255, .07);
        margin-bottom: 8px;
    }

    .sidebar-logo-box {
        width: 30px;
        height: 30px;
        background: var(--orange, #E8521A);
        border-radius: 7px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .sidebar-logo-box svg {
        width: 17px;
        height: 17px;
        fill: white;
    }

    .sidebar-logo-name {
        font-family: 'Sora', sans-serif;
        font-size: 14px;
        font-weight: 700;
        color: white;
        letter-spacing: -0.2px;
    }

    .nav-section {
        padding: 6px 10px;
        margin-bottom: 2px;
    }

    .nav-section-label {
        font-size: 9px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: rgba(255, 255, 255, .3);
        padding: 4px 8px;
        margin-bottom: 2px;
        font-family: 'Sora', sans-serif;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 12px 10px;
        border-radius: 8px;
        cursor: pointer;
        transition: .15s;
        font-size: 13px;
        font-weight: 500;
        color: rgba(255, 255, 255, .6);
        position: relative;
    }

    .nav-item:hover {
        background: rgba(255, 255, 255, .07);
        color: rgba(255, 255, 255, .9);
    }

    .nav-item.active {
        background: rgba(232, 82, 26, .15);
        color: #FF8C60;
        font-weight: 600;
    }

    .nav-item svg:first-child {
        width: 15px;
        height: 15px;
        stroke: currentColor;
        stroke-width: 1.8;
        fill: none;
        flex-shrink: 0;
    }

    .nav-item svg:first-child path,
    .nav-item svg:first-child rect,
    .nav-item svg:first-child polygon,
    .nav-item svg:first-child polyline,
    .nav-item svg:first-child circle,
    .nav-item svg:first-child line {
        stroke: currentColor;
        stroke-width: 1.8;
        fill: none;
    }

    .nav-arrow {
        width: 12px;
        height: 12px;
        stroke: currentColor;
        stroke-width: 2;
        fill: none;
        margin-left: auto;
        transition: transform 0.2s ease;
    }

    .nav-badge {
        margin-left: auto;
        background: var(--orange, #E8521A);
        color: white;
        font-size: 10px;
        font-weight: 700;
        padding: 1px 6px;
        border-radius: 10px;
        font-family: 'Sora', sans-serif;
    }

    .nav-badge.amber {
        background: var(--amber, #A86B00);
    }

    .nav-submenu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.35s ease;
        padding-left: 12px;
    }

    .nav-submenu.open {
        max-height: 900px;
    }

    .nav-submenu-item {
        display: flex;
        padding: 9px 10px;
        font-size: 13px;
        color: rgba(255, 255, 255, .5);
        text-decoration: none;
        border-radius: 6px;
        margin: 2px 0;
        transition: .15s;
        white-space: nowrap;
    }

    .nav-submenu-item:hover {
        background: rgba(255, 255, 255, .05);
        color: rgba(255, 255, 255, .8);
    }

    .nav-submenu-item.active {
        background: rgba(232, 82, 26, .1);
        color: #FF8C60;
        font-weight: 600;
    }

    /* Level 2 — City Features / State Features group header */
    .nav-submenu-group-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 9px 10px;
        font-size: 12.5px;
        font-weight: 600;
        color: rgba(255, 255, 255, .55);
        border-radius: 6px;
        margin: 2px 0;
        cursor: pointer;
        transition: .15s;
        user-select: none;
    }

    .nav-submenu-group-header:hover {
        background: rgba(255, 255, 255, .06);
        color: rgba(255, 255, 255, .85);
    }

    .nav-submenu-group-header.active {
        color: #FF8C60;
    }

    .nav-submenu-group-header .nav-arrow {
        width: 11px;
        height: 11px;
        flex-shrink: 0;
    }

    /* Level 3 — Plans / Invoices links */
    .nav-nested-submenu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.28s ease;
        padding-left: 14px;
        margin-bottom: 2px;
    }

    .nav-nested-submenu.open {
        max-height: 200px;
    }

    .nav-nested-item {
        display: flex;
        align-items: center;
        gap: 7px;
        padding: 7px 10px;
        font-size: 12px;
        color: rgba(255, 255, 255, .42);
        text-decoration: none;
        border-radius: 5px;
        margin: 1px 0;
        transition: .15s;
    }

    .nav-nested-item::before {
        content: '';
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: currentColor;
        opacity: 0.5;
        flex-shrink: 0;
    }

    .nav-nested-item:hover {
        background: rgba(255, 255, 255, .05);
        color: rgba(255, 255, 255, .75);
    }

    .nav-nested-item.active {
        background: rgba(232, 82, 26, .08);
        color: #FF8C60;
        font-weight: 600;
    }

    .sidebar-bottom {
        margin-top: auto;
        border-top: 1px solid rgba(255, 255, 255, .07);
        padding: 14px 18px;
    }

    .sidebar-user {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px;
    }

    .sidebar-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: rgba(232, 82, 26, .25);
        border: 1.5px solid rgba(232, 82, 26, .4);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-family: 'Sora', sans-serif;
        font-size: 12px;
        font-weight: 700;
        color: #FF8C60;
    }

    .sidebar-user-name {
        font-size: 12px;
        font-weight: 600;
        color: white;
        font-family: 'Sora', sans-serif;
    }

    .sidebar-user-role {
        font-size: 10px;
        color: rgba(255, 255, 255, .4);
    }

    .btn-signout {
        width: 100%;
        padding: 8px;
        background: rgba(255, 255, 255, .06);
        color: rgba(255, 255, 255, .6);
        border: 1px solid rgba(255, 255, 255, .1);
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        font-family: 'DM Sans', sans-serif;
        transition: .15s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .btn-signout:hover {
        background: rgba(192, 57, 43, .2);
        color: var(--red, #C0392B);
        border-color: rgba(192, 57, 43, .3);
    }

    .btn-signout svg {
        width: 13px;
        height: 13px;
        stroke: currentColor;
        stroke-width: 2;
        fill: none;
    }

    :root {
        --navy: #0D1B38;
        --navy2: #122350;
        --navy3: #1A3166;
        --orange: #E8521A;
        --orange-h: #D44510;
        --green: #1A7A4A;
        --green-bg: #E8F7EF;
        --red: #C0392B;
        --red-bg: #FDECEA;
        --amber: #A86B00;
        --amber-bg: #FEF3E2;
        --blue: #2563A8;
        --blue-bg: #EEF3FB;
        --purple: #5B2D9E;
        --purple-bg: #F3EEFF;
        --white: #fff;
        --dark: #0D1B38;
        --mid: #3A4F6E;
        --muted: #7A8BA8;
        --border: #DDE3EE;
        --lgray: #F4F6FA;
        --mgray: #E8ECF4;
        --sidebar: 220px;
    }

    /* MOBILE RESPONSIVE */
    @media (max-width: 768px) {
        .sidebar-overlay {
            display: block;
        }

        .sidebar {
            transform: translateX(-100%);
        }

        .sidebar.open {
            transform: translateX(0);
        }

        .sidebar-overlay.open {
            display: block;
        }
    }
</style>
