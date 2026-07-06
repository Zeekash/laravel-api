<!-- sidebar menu area start -->
@php
    $user = Auth::guard('admin')->user();
@endphp

<!-- Overlay for mobile -->
<div class="" onclick="toggleSidebar()"></div>

<div class="sidebar">
    <div class="sidebar-logo">
        <div class="sidebar-logo-box">
            <svg viewBox="0 0 24 24">
                <path
                    d="M1 3h15v13H1zM16 8h4l3 3v5h-7V8zM5.5 19a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm13 0a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
            </svg>
        </div>
        <div>
            <div class="sidebar-logo-name">MMJ Admin</div>
        </div>
    </div>

    <div class="nav-section">
        <div class="nav-section-label">Main</div>

        @if ($user->can('dashboard.view'))
            <div class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}"
                onclick="window.location.href='{{ route('admin.dashboard') }}'">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                </svg>
                Dashboard
            </div>
        @endif

        @if (
            $user->can('company.create') ||
                $user->can('company.view') ||
                $user->can('company.edit') ||
                $user->can('company.delete'))
            <div class="nav-item {{ Route::is('admin.companies.*') ? 'active' : '' }}" onclick="toggleSubmenu(this)">
                <svg viewBox="0 0 24 24">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
                Companies
                <svg class="nav-arrow" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>
            <div class="nav-submenu {{ Route::is('admin.companies.*') ? 'open' : '' }}">
                @if ($user->can('company.view'))
                    <a href="{{ route('admin.companies.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.companies.index') || Route::is('admin.companies.edit') ? 'active' : '' }}">All
                        Companies</a>
                @endif
                @if ($user->can('company.create'))
                    <a href="{{ route('admin.companies.create') }}"
                        class="nav-submenu-item {{ Route::is('admin.companies.create') ? 'active' : '' }}">Create
                        Company</a>
                @endif
            </div>
        @endif

        @if (
            $user->can('user-review.create') ||
                $user->can('user-review.view') ||
                $user->can('user-review.edit') ||
                $user->can('user-review.delete') ||
                $user->can('review-dispute.view') ||
                $user->can('review-dispute.edit') ||
                $user->can('review-dispute.delete') ||
                $user->can('user-review.view-trash') ||
                $user->can('user-review.restore') ||
                $user->can('user-review.force-delete'))
            <div class="nav-item {{ Route::is('admin.users.*') || Route::is('admin.alldisputes') ? 'active' : '' }}"
                onclick="toggleSubmenu(this)">
                <svg viewBox="0 0 24 24">
                    <polygon
                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                </svg>
                Reviews
                <span class="nav-badge amber">12</span>
                <svg class="nav-arrow" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>
            <div class="nav-submenu {{ Route::is('admin.users.*') || Route::is('admin.alldisputes') ? 'open' : '' }}">
                @if ($user->can('user-review.view'))
                    <a href="{{ route('admin.users.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.users.index') || Route::is('admin.users.edit') ? 'active' : '' }}">All
                        Reviews</a>
                @endif
                @if ($user->can('review-dispute.view'))
                    <a href="{{ route('admin.alldisputes') }}"
                        class="nav-submenu-item {{ Route::is('admin.alldisputes') ? 'active' : '' }}">Review
                        Disputes</a>
                @endif
            </div>
        @endif


    </div>

    <div class="nav-section">
        <div class="nav-section-label">Content</div>

        @if ($user->can('post.create') || $user->can('post.view') || $user->can('post.edit') || $user->can('post.delete'))
            <div class="nav-item {{ Route::is('admin.posts.*') ? 'active' : '' }}" onclick="toggleSubmenu(this)">
                <svg viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                    <polyline points="14 2 14 8 20 8" />
                </svg>
                Posts / Blog
                <svg class="nav-arrow" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>
            <div class="nav-submenu {{ Route::is('admin.posts.*') ? 'open' : '' }}">
                @if ($user->can('post.view'))
                    <a href="{{ route('admin.posts.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.posts.index') || Route::is('admin.posts.edit') ? 'active' : '' }}">All
                        Posts</a>
                @endif
                @if ($user->can('post.create'))
                    <a href="{{ route('admin.posts.create') }}"
                        class="nav-submenu-item {{ Route::is('admin.posts.create') ? 'active' : '' }}">Create Post</a>
                @endif
                @if ($user->can('post-category.view'))
                    <a href="{{ route('admin.post-categories.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.post-categories.index') || Route::is('admin.post-categories.edit') ? 'active' : '' }}">Categories</a>
                @endif
            </div>
        @endif

        @if (
            $user->can('post-category.create') ||
                $user->can('post-category.view') ||
                $user->can('post-category.edit') ||
                $user->can('post-category.delete'))
            <div class="nav-item {{ Route::is('admin.post-categories.*') ? 'active' : '' }}"
                onclick="toggleSubmenu(this)">
                <svg viewBox="0 0 24 24">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                </svg>
                Post Category
                <svg class="nav-arrow" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>
            <div class="nav-submenu {{ Route::is('admin.post-categories.*') ? 'open' : '' }}">
                @if ($user->can('post-category.view'))
                    <a href="{{ route('admin.post-categories.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.post-categories.index') || Route::is('admin.post-categories.edit') ? 'active' : '' }}">All
                        Categories</a>
                @endif
                @if ($user->can('post-category.create'))
                    <a href="{{ route('admin.post-categories.create') }}"
                        class="nav-submenu-item {{ Route::is('admin.post-categories.create') ? 'active' : '' }}">Create
                        Category</a>
                @endif
            </div>
        @endif

        @if (
            $user->can('post-faq.create') ||
                $user->can('post-faq.view') ||
                $user->can('post-faq.edit') ||
                $user->can('post-faq.delete'))
            <div class="nav-item {{ Route::is('admin.post-faq.*') ? 'active' : '' }}" onclick="toggleSubmenu(this)">
                <svg viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                    <polyline points="14 2 14 8 20 8" />
                    <line x1="16" y1="13" x2="8" y2="13" />
                </svg>
                Post FAQ
                <svg class="nav-arrow" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>
            <div class="nav-submenu {{ Route::is('admin.post-faq.*') ? 'open' : '' }}">
                @if ($user->can('post-faq.view'))
                    <a href="{{ route('admin.post-faq.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.post-faq.index') || Route::is('admin.post-faq.edit') ? 'active' : '' }}">All
                        FAQs</a>
                @endif
                @if ($user->can('post-faq.create'))
                    <a href="{{ route('admin.post-faq.create') }}"
                        class="nav-submenu-item {{ Route::is('admin.post-faq.create') ? 'active' : '' }}">Create
                        FAQ</a>
                @endif
            </div>
        @endif

        @if (
            $user->can('city-page.create') ||
                $user->can('city-page.view') ||
                $user->can('city-page.edit') ||
                $user->can('city-page.delete') ||
                $user->can('city-cost-of-living.create') ||
                $user->can('city-cost-of-living.view') ||
                $user->can('city-cost-of-living.edit') ||
                $user->can('city-cost-of-living.delete') ||
                $user->can('city-life-style.create') ||
                $user->can('city-life-style.view') ||
                $user->can('city-life-style.edit') ||
                $user->can('city-life-style.delete') ||
                $user->can('city-avg-cost.create') ||
                $user->can('city-avg-cost.view') ||
                $user->can('city-avg-cost.edit') ||
                $user->can('city-avg-cost.delete') ||
                $user->can('city-route-cost.create') ||
                $user->can('city-route-cost.view') ||
                $user->can('city-route-cost.edit') ||
                $user->can('city-route-cost.delete') ||
                $user->can('city-living-expense.create') ||
                $user->can('city-living-expense.view') ||
                $user->can('city-living-expense.edit') ||
                $user->can('city-living-expense.delete'))
            <div class="nav-item {{ Route::is('admin.citypages.*') || Route::is('admin.cityCostOfLiving.*') || Route::is('admin.cityLifeStyle.*') || Route::is('admin.city-avg-cost.*') || Route::is('admin.city-route-cost.*') || Route::is('admin.city-living-expense.*') ? 'active' : '' }}"
                onclick="toggleSubmenu(this)">
                <svg viewBox="0 0 24 24">
                    <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6" />
                </svg>
                City Pages
                <svg class="nav-arrow" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>
            <div
                class="nav-submenu {{ Route::is('admin.citypages.*') || Route::is('admin.cityCostOfLiving.*') || Route::is('admin.cityLifeStyle.*') || Route::is('admin.city-avg-cost.*') || Route::is('admin.city-route-cost.*') || Route::is('admin.city-living-expense.*') ? 'open' : '' }}">
                @if ($user->can('city-page.view'))
                    <a href="{{ route('admin.citypages.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.citypages.index') || Route::is('admin.citypages.edit') ? 'active' : '' }}">List</a>
                @endif
                @if ($user->can('city-page.create'))
                    <a href="{{ route('admin.citypages.create') }}"
                        class="nav-submenu-item {{ Route::is('admin.citypages.create') ? 'active' : '' }}">Create</a>
                @endif
                @if ($user->can('city-cost-of-living.view'))
                    <a href="{{ route('admin.cityCostOfLiving.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.cityCostOfLiving.index') ? 'active' : '' }}">Cost
                        Of Living</a>
                @endif
                @if ($user->can('city-avg-cost.view'))
                    <a href="{{ route('admin.city-avg-cost.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.city-avg-cost.index') ? 'active' : '' }}">Average
                        Cost</a>
                @endif
                @if ($user->can('city-route-cost.view'))
                    <a href="{{ route('admin.city-route-cost.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.city-route-cost.index') ? 'active' : '' }}">Route
                        Cost</a>
                @endif
                @if ($user->can('city-life-style.view'))
                    <a href="{{ route('admin.cityLifeStyle.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.cityLifeStyle.index') ? 'active' : '' }}">Life
                        Style</a>
                @endif
                @if ($user->can('city-living-expense.view'))
                    <a href="{{ route('admin.city-living-expense.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.city-living-expense.index') ? 'active' : '' }}">Living
                        Expense</a>
                @endif
            </div>
        @endif

        @if (
            $user->can('state-cost-of-living.create') ||
                $user->can('state-cost-of-living.view') ||
                $user->can('state-cost-of-living.edit') ||
                $user->can('state-cost-of-living.delete') ||
                $user->can('state-life-style.create') ||
                $user->can('state-life-style.view') ||
                $user->can('state-life-style.edit') ||
                $user->can('state-life-style.delete') ||
                $user->can('state-pros-cons.create') ||
                $user->can('state-pros-cons.view') ||
                $user->can('state-pros-cons.edit') ||
                $user->can('state-pros-cons.delete'))
            <div class="nav-item {{ Route::is('admin.stateCostOfLiving.*') || Route::is('admin.state-life-style.*') || Route::is('admin.state-pro-cons.*') ? 'active' : '' }}"
                onclick="toggleSubmenu(this)">
                <svg viewBox="0 0 24 24">
                    <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6" />
                </svg>
                State Pages
                <svg class="nav-arrow" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>
            <div
                class="nav-submenu {{ Route::is('admin.stateCostOfLiving.*') || Route::is('admin.state-life-style.*') || Route::is('admin.state-pro-cons.*') ? 'open' : '' }}">
                @if ($user->can('state-cost-of-living.view'))
                    <a href="{{ route('admin.stateCostOfLiving.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.stateCostOfLiving.index') ? 'active' : '' }}">Cost
                        Of Living</a>
                @endif
                @if ($user->can('state-life-style.view'))
                    <a href="{{ route('admin.state-life-style.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.state-life-style.index') ? 'active' : '' }}">Life
                        Style</a>
                @endif
                @if ($user->can('state-pros-cons.view'))
                    <a href="{{ route('admin.state-pro-cons.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.state-pro-cons.index') ? 'active' : '' }}">Pros
                        Cons</a>
                @endif
            </div>
        @endif

        @if (
            $user->can('resource-page.view') ||
                $user->can('resource-page.create') ||
                $user->can('resource-page.edit') ||
                $user->can('resource-page.delete') ||
                $user->can('resource-top-mover.view') ||
                $user->can('resource-top-mover.create') ||
                $user->can('resource-top-mover.edit') ||
                $user->can('resource-top-mover.delete') ||
                $user->can('resource-bottom-mover.view') ||
                $user->can('resource-bottom-mover.create') ||
                $user->can('resource-bottom-mover.edit') ||
                $user->can('resource-bottom-mover.delete') ||
                $user->can('resource-other-mover.view') ||
                $user->can('resource-other-mover.create') ||
                $user->can('resource-other-mover.edit') ||
                $user->can('resource-other-mover.delete') ||
                $user->can('resource-faq.view') ||
                $user->can('resource-faq.create') ||
                $user->can('resource-faq.edit') ||
                $user->can('resource-faq.delete'))
            <div class="nav-item {{ Route::is('admin.resource.*') || Route::is('admin.resource-faq.*') ? 'active' : '' }}"
                onclick="toggleSubmenu(this)">
                <svg viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                    <polyline points="14 2 14 8 20 8" />
                </svg>
                Resource Pages
                <svg class="nav-arrow" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>
            <div
                class="nav-submenu {{ Route::is('admin.resource.*') || Route::is('admin.resource-faq.*') ? 'open' : '' }}">
                @if ($user->can('resource-page.view'))
                    <a href="{{ route('admin.resource.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.resource.index') ? 'active' : '' }}">List</a>
                @endif
                @if ($user->can('resource-page.create'))
                    <a href="{{ route('admin.resource.create') }}"
                        class="nav-submenu-item {{ Route::is('admin.resource.create') ? 'active' : '' }}">Create</a>
                @endif
                @if ($user->can('resource-top-mover.view'))
                    <a href="{{ route('admin.resource.top.mover.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.resource.top.mover.index') ? 'active' : '' }}">Top
                        Movers</a>
                @endif
                @if ($user->can('resource-bottom-mover.view'))
                    <a href="{{ route('admin.resource.bottom.mover.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.resource.bottom.mover.index') ? 'active' : '' }}">Bottom
                        Movers</a>
                @endif
                @if ($user->can('resource-faq.view'))
                    <a href="{{ route('admin.resource-faq.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.resource-faq.index') ? 'active' : '' }}">FAQs</a>
                @endif
            </div>
        @endif
        <div class="nav-item" onclick="toggleSubmenu(this)">
            <svg viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="12" />
                <line x1="12" y1="16" x2="12.01" y2="16" />
            </svg>
            Other Content
            <svg class="nav-arrow" viewBox="0 0 24 24">
                <polyline points="6 9 12 15 18 9" />
            </svg>
        </div>
        <div class="nav-submenu">
            @if ($user->can('quotation.view') || $user->can('quotation.delete'))
                <div class="nav-submenu-item" onclick="toggleSubmenu(this)">
                    Quotations
                    <svg class="nav-arrow" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
                <div class="nav-submenu">
                    @if ($user->can('quotation.view'))
                        <a href="{{ route('admin.mover_quotations.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.mover_quotations.*') ? 'active' : '' }}">Mover
                            Quotations</a>
                    @endif
                    @if ($user->can('cost-estimate.view'))
                        <a href="{{ route('admin.cost-estimator.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.cost-estimator.*') ? 'active' : '' }}">Cost
                            Estimates</a>
                    @endif
                </div>
            @endif
            @if ($user->can('order.create') || $user->can('order.view') || $user->can('order.edit') || $user->can('order.delete'))
                <div class="nav-submenu-item" onclick="toggleSubmenu(this)">
                    Orders
                    <svg class="nav-arrow" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
                <div class="nav-submenu">
                    @if ($user->can('order.view'))
                        <a href="{{ route('admin.orders.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.orders.*') ? 'active' : '' }}">All Orders</a>
                    @endif
                </div>
            @endif
            @if (
                $user->can('company-faq.create') ||
                    $user->can('company-faq.view') ||
                    $user->can('company-faq.edit') ||
                    $user->can('company-faq.delete'))
                <div class="nav-submenu-item" onclick="toggleSubmenu(this)">
                    Company FAQ
                    <svg class="nav-arrow" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
                <div class="nav-submenu">
                    @if ($user->can('company-faq.view'))
                        <a href="{{ route('admin.company-faq.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.company-faq.*') ? 'active' : '' }}">List</a>
                    @endif
                    @if ($user->can('company-faq.create'))
                        <a href="{{ route('admin.company-faq.create') }}"
                            class="nav-submenu-item {{ Route::is('admin.company-faq.create') ? 'active' : '' }}">Create</a>
                    @endif
                </div>
            @endif
            @if (
                $user->can('company-live-calls.create') ||
                    $user->can('company-live-calls.view') ||
                    $user->can('company-live-calls.edit') ||
                    $user->can('company-live-calls.delete'))
                <div class="nav-submenu-item" onclick="toggleSubmenu(this)">
                    Company Live Calls
                    <svg class="nav-arrow" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
                <div class="nav-submenu">
                    @if ($user->can('company-live-calls.view'))
                        <a href="{{ route('admin.live-calls.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.live-calls.*') ? 'active' : '' }}">List</a>
                    @endif
                    @if ($user->can('company-live-calls.create'))
                        <a href="{{ route('admin.live-calls.create') }}"
                            class="nav-submenu-item {{ Route::is('admin.live-calls.create') ? 'active' : '' }}">Create</a>
                    @endif
                </div>
            @endif
            @if (
                $user->can('comment.create') ||
                    $user->can('comment.view') ||
                    $user->can('comment.edit') ||
                    $user->can('comment.delete'))
                <div class="nav-submenu-item" onclick="toggleSubmenu(this)">
                    Comments
                    <svg class="nav-arrow" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
                <div class="nav-submenu">
                    @if ($user->can('comment.view'))
                        <a href="{{ route('admin.comments.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.comments.*') ? 'active' : '' }}">All
                            Comments</a>
                    @endif
                </div>
            @endif
            @if (
                $user->can('product.create') ||
                    $user->can('product.view') ||
                    $user->can('product.edit') ||
                    $user->can('product.delete'))
                <div class="nav-submenu-item" onclick="toggleSubmenu(this)">
                    Products
                    <svg class="nav-arrow" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
                <div class="nav-submenu">
                    @if ($user->can('product.view'))
                        <a href="{{ route('admin.products.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.products.*') ? 'active' : '' }}">All
                            Products</a>
                    @endif
                    @if ($user->can('product.create'))
                        <a href="{{ route('admin.products.create') }}"
                            class="nav-submenu-item {{ Route::is('admin.products.create') ? 'active' : '' }}">Create
                            Product</a>
                    @endif
                </div>
            @endif
            @if (
                $user->can('calulator-estimate.view') ||
                    $user->can('calulator-estimate.show') ||
                    $user->can('calulator-estimate.delete'))
                <div class="nav-submenu-item" onclick="toggleSubmenu(this)">
                    Calculator Estimate
                    <svg class="nav-arrow" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
                <div class="nav-submenu">
                    @if ($user->can('calulator-estimate.view'))
                        <a href="{{ route('admin.get-quotes.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.get-quotes.*') ? 'active' : '' }}">All
                            Estimates</a>
                    @endif
                </div>
            @endif
            @if (
                $user->can('state-cost-page.create') ||
                    $user->can('state-cost-page.view') ||
                    $user->can('state-cost-page.edit') ||
                    $user->can('state-cost-page.delete'))
                <div class="nav-submenu-item" onclick="toggleSubmenu(this)">
                    State Cost Page
                    <svg class="nav-arrow" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
                <div class="nav-submenu">
                    @if ($user->can('state-cost-page.view'))
                        <a href="{{ route('admin.state-cost-pages.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.state-cost-pages.*') ? 'active' : '' }}">List</a>
                    @endif
                    @if ($user->can('state-cost-page.create'))
                        <a href="{{ route('admin.state-cost-pages.create') }}"
                            class="nav-submenu-item {{ Route::is('admin.state-cost-pages.create') ? 'active' : '' }}">Create</a>
                    @endif
                    @if ($user->can('state-cost-top-mover.view'))
                        <a href="{{ route('admin.state-cost.top-mover.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.state-cost.top-mover.*') ? 'active' : '' }}">Top
                            Movers</a>
                    @endif
                    @if ($user->can('state-cost-faq.view'))
                        <a href="{{ route('admin.state-cost-page-faqs.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.state-cost-page-faqs.*') ? 'active' : '' }}">FAQs</a>
                    @endif
                </div>
            @endif
            @if (
                $user->can('best-state-page.create') ||
                    $user->can('best-state-page.view') ||
                    $user->can('best-state-page.edit') ||
                    $user->can('best-state-page.delete'))
                <div class="nav-submenu-item" onclick="toggleSubmenu(this)">
                    Best State Page
                    <svg class="nav-arrow" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
                <div class="nav-submenu">
                    @if ($user->can('best-state-page.view'))
                        <a href="{{ route('admin.best-state-pages.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.best-state-pages.*') ? 'active' : '' }}">List</a>
                    @endif
                    @if ($user->can('best-state-page.create'))
                        <a href="{{ route('admin.best-state-pages.create') }}"
                            class="nav-submenu-item {{ Route::is('admin.best-state-pages.create') ? 'active' : '' }}">Create</a>
                    @endif
                    @if ($user->can('best-state-top-mover.view'))
                        <a href="{{ route('admin.best-state.top-mover.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.best-state.top-mover.*') ? 'active' : '' }}">Top
                            Movers</a>
                    @endif
                    @if ($user->can('best-state-faq.view'))
                        <a href="{{ route('admin.best-state-page-faqs.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.best-state-page-faqs.*') ? 'active' : '' }}">FAQs</a>
                    @endif
                </div>
            @endif
            @if (
                $user->can('city-to-city-route.view') ||
                    $user->can('state-to-state-route.view') ||
                    $user->can('state-to-city-route.view') ||
                    $user->can('city-to-state-route.view'))
                <div class="nav-submenu-item" onclick="toggleSubmenu(this)">
                    Moving Routes
                    <svg class="nav-arrow" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
                <div class="nav-submenu">
                    @if ($user->can('city-to-city-route.view'))
                        <a href="{{ route('admin.city-to-city-routes.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.city-to-city-routes.*') ? 'active' : '' }}">City
                            To City</a>
                    @endif
                    @if ($user->can('state-to-state-route.view'))
                        <a href="{{ route('admin.state-to-state-routes.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.state-to-state-routes.*') ? 'active' : '' }}">State
                            To State</a>
                    @endif
                    @if ($user->can('state-to-city-route.view'))
                        <a href="{{ route('admin.state-to-city-routes.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.state-to-city-routes.*') ? 'active' : '' }}">State
                            To City</a>
                    @endif
                    @if ($user->can('city-to-state-route.view'))
                        <a href="{{ route('admin.city-to-state-routes.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.city-to-state-routes.*') ? 'active' : '' }}">City
                            To State</a>
                    @endif
                </div>
            @endif
            @if (
                $user->can('checklist-category.create') ||
                    $user->can('checklist-category.view') ||
                    $user->can('checklist-category.edit') ||
                    $user->can('checklist-category.delete'))
                <div class="nav-submenu-item" onclick="toggleSubmenu(this)">
                    Checklist Categories
                    <svg class="nav-arrow" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
                <div class="nav-submenu">
                    @if ($user->can('checklist-category.view'))
                        <a href="{{ route('admin.checklist.categories.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.checklist.categories.*') ? 'active' : '' }}">List</a>
                    @endif
                    @if ($user->can('checklist-category.create'))
                        <a href="{{ route('admin.checklist.categories.create') }}"
                            class="nav-submenu-item {{ Route::is('admin.checklist.categories.create') ? 'active' : '' }}">Create</a>
                    @endif
                </div>
            @endif
            @if (
                $user->can('checklist.create') ||
                    $user->can('checklist.view') ||
                    $user->can('checklist.edit') ||
                    $user->can('checklist.delete'))
                <div class="nav-submenu-item" onclick="toggleSubmenu(this)">
                    Checklists
                    <svg class="nav-arrow" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
                <div class="nav-submenu">
                    @if ($user->can('checklist.view'))
                        <a href="{{ route('admin.checklists.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.checklists.*') ? 'active' : '' }}">Checklists</a>
                    @endif
                    @if ($user->can('checklist.create'))
                        <li class="nav-submenu-item {{ Route::is('admin.checklists.create') ? 'active' : '' }}"><a
                                href="{{ route('admin.checklists.create') }}">Create</a></li>
                    @endif
                </div>
            @endif
            @if ($user->can('user-contact-us.view') || $user->can('contact-us.show') || $user->can('contact-us.delete'))
                <div class="nav-submenu-item" onclick="toggleSubmenu(this)">
                    User Contact
                    <svg class="nav-arrow" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
                <div class="nav-submenu">
                    @if ($user->can('user-contact-us.view'))
                        <a href="{{ route('admin.user-contact-us.index') }}"
                            class="nav-submenu-item {{ Route::is('admin.user-contact-us.*') ? 'active' : '' }}">User
                            Contacts</a>
                    @endif
                </div>
            @endif
            @if ($user->can('page-view-visitor.view'))
                <div class="nav-submenu-item" onclick="toggleSubmenu(this)">
                    Analytics
                    <svg class="nav-arrow" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
                <div class="nav-submenu">
                    <a href="{{ route('admin.visitordetail') }}"
                        class="nav-submenu-item {{ Route::is('admin.visitordetail') ? 'active' : '' }}">Visitor
                        Details</a>
                    <a href="{{ route('admin.pageview') }}"
                        class="nav-submenu-item {{ Route::is('admin.pageview') ? 'active' : '' }}">Page Views</a>
                    <a href="{{ route('admin.pagevisitor') }}"
                        class="nav-submenu-item {{ Route::is('admin.pagevisitor') ? 'active' : '' }}">Page
                        Visitors</a>
                </div>
            @endif
        </div>
    </div>

    <div class="nav-section">
        <div class="nav-section-label">Settings</div>

        @if ($user->can('role.create') || $user->can('role.view') || $user->can('role.edit') || $user->can('role.delete'))
            <div class="nav-item {{ Route::is('admin.roles.*') ? 'active' : '' }}" onclick="toggleSubmenu(this)">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="11" width="18" height="11" rx="2" />
                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                </svg>
                Roles & Permissions
                <svg class="nav-arrow" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>
            <div class="nav-submenu {{ Route::is('admin.roles.*') ? 'open' : '' }}">
                @if ($user->can('role.view'))
                    <a href="{{ route('admin.roles.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.roles.index') || Route::is('admin.roles.edit') ? 'active' : '' }}">All
                        Roles</a>
                @endif
                @if ($user->can('role.create'))
                    <a href="{{ route('admin.roles.create') }}"
                        class="nav-submenu-item {{ Route::is('admin.roles.create') ? 'active' : '' }}">Create
                        Role</a>
                @endif
            </div>
        @endif

        @if ($user->can('admin.create') || $user->can('admin.view') || $user->can('admin.edit') || $user->can('admin.delete'))
            <div class="nav-item {{ Route::is('admin.admins.*') ? 'active' : '' }}" onclick="toggleSubmenu(this)">
                <svg viewBox="0 0 24 24">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                </svg>
                Team Management
                <svg class="nav-arrow" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>
            <div class="nav-submenu {{ Route::is('admin.admins.*') ? 'open' : '' }}">
                @if ($user->can('admin.view'))
                    <a href="{{ route('admin.admins.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.admins.index') || Route::is('admin.admins.edit') ? 'active' : '' }}">All
                        Admins</a>
                @endif
                @if ($user->can('admin.create'))
                    <a href="{{ route('admin.admins.create') }}"
                        class="nav-submenu-item {{ Route::is('admin.admins.create') ? 'active' : '' }}">Create
                        Admin</a>
                @endif
            </div>
        @endif

        @if ($user->can('contact-us.view') || $user->can('contact-us.show') || $user->can('contact-us.delete'))
            <div class="nav-item {{ Route::is('admin.contact-us.*') ? 'active' : '' }}"
                onclick="toggleSubmenu(this)">
                <svg viewBox="0 0 24 24">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                </svg>
                Contact Us
                <svg class="nav-arrow" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>
            <div class="nav-submenu {{ Route::is('admin.contact-us.*') ? 'open' : '' }}">
                @if ($user->can('contact-us.view'))
                    <a href="{{ route('admin.contact-us.index') }}"
                        class="nav-submenu-item {{ Route::is('admin.contact-us.index') ? 'active' : '' }}">All
                        Queries</a>
                @endif
            </div>
        @endif
    </div>

    <div class="sidebar-bottom">
        <div class="sidebar-user">
            <div class="sidebar-avatar">{{ substr($user->name ?? 'A', 0, 2) }}</div>
            <div>
                <div class="sidebar-user-name">{{ $user->name ?? 'Admin' }}</div>
                <div class="sidebar-user-role">{{ $user->role ?? 'Super Admin' }}</div>
            </div>
        </div>
        <button class="btn-signout"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <svg viewBox="0 0 24 24">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                <polyline points="16 17 21 12 16 7" />
                <line x1="21" y1="12" x2="9" y2="12" />
            </svg>
            Sign Out
        </button>
        <form id="logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
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

    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.querySelector('.sidebar-overlay');
        const menuBtn = document.getElementById('menu-btn');
        const closeBtn = document.getElementById('close-btn');

        sidebar.classList.toggle('open');
        overlay.classList.toggle('open');

        if (sidebar.classList.contains('open')) {
            menuBtn.style.display = 'none';
            closeBtn.style.display = 'block';
        } else {
            menuBtn.style.display = 'block';
            closeBtn.style.display = 'none';
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
        z-index: 10;
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
        padding: 8px 10px;
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
        transition: max-height 0.3s ease;
        padding-left: 34px;
    }

    .nav-submenu.open {
        max-height: 680px;
    }

    .nav-submenu-item {
        display: block;
        padding: 6px 10px;
        font-size: 12px;
        color: rgba(255, 255, 255, .5);
        text-decoration: none;
        border-radius: 6px;
        margin: 2px 0;
        transition: .15s;
        white-space: nowrap;

        display: flex;
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
<!-- sidebar menu area end -->
