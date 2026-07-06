<style>
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

    /* TOP BAR */
    .topbar {
        background: white;
        border-bottom: 1px solid var(--border);
        padding: 35px 28px 28px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-shrink: 0;
        position: sticky;
        top: 0;
        z-index: 50;
    }

    .topbar-left {
        display: flex;
        align-items: center;
        gap: 8px
    }

    .topbar-title {
        font-family: 'Sora', sans-serif;
        font-size: 16px;
        font-weight: 700;
        color: var(--dark)
    }

    .topbar-sub {
        font-size: 12px;
        color: var(--muted)
    }

    .topbar-right {
        display: flex;
        align-items: center;
        gap: 10px
    }

    .topbar-icon-btn {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        border: 1.5px solid var(--border);
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        transition: .15s;
    }

    .topbar-icon-btn:hover {
        background: var(--lgray)
    }

    .topbar-icon-btn svg {
        width: 16px;
        height: 16px;
        stroke: var(--muted);
        stroke-width: 2;
        fill: none
    }

    .notif-dot {
        position: absolute;
        top: 6px;
        right: 6px;
        width: 7px;
        height: 7px;
        background: var(--orange);
        border-radius: 50%;
        border: 1.5px solid white
    }

    .topbar-admin {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 8px;
        transition: .15s
    }

    .topbar-admin:hover {
        background: var(--lgray)
    }

    .topbar-avatar {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: var(--navy);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 700;
        color: white;
        font-family: 'Sora', sans-serif
    }

    .topbar-admin-name {
        font-size: 13px;
        font-weight: 600;
        color: var(--dark)
    }

    /* Menu/Close Button */
    .menu-toggle {
        display: none;
        align-items: center;
        gap: 8px;
        margin-right: 16px;
    }

    .nav-btn {
        cursor: pointer;
        padding: 8px;
    }

    .nav-btn span {
        display: block;
        width: 20px;
        height: 2px;
        background: var(--dark);
        margin: 4px 0;
        transition: .15s;
    }

    .close-btn {
        cursor: pointer;
        padding: 8px;
    }

    .close-btn svg {
        width: 20px;
        height: 20px;
        stroke: var(--dark);
        stroke-width: 2;
        fill: none;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .menu-toggle {
            display: flex;
        }
    }
</style>
<?php
$notifications = App\Models\Notification::where('status', false)
    ->orderByDesc('created_at')
    ->take(5)
    ->get();
$count = App\Models\Notification::where('status', false)->count();
$company = Auth::guard('company')->user();
?>
<!-- header area start -->
<div class="topbar">
    <div class="topbar-left">
        <div class="menu-toggle">
            <div class="nav-btn" id="menu-btn" onclick="toggleSidebar()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="close-btn" id="close-btn" onclick="toggleSidebar()" style="display: none;">
                <svg viewBox="0 0 24 24">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </div>
        </div>
        <div>
            <div class="topbar-title" id="topbar-title">Dashboard</div>
            <div class="topbar-sub" id="topbar-sub">Good morning, {{ $company->name ?? 'Company' }} — here's today's overview
            </div>
        </div>
    </div>
    <div class="topbar-right">
        <div class="topbar-icon-btn" onclick="window.location.href='/'" title="Go to Website">
            <svg viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="2" y1="12" x2="22" y2="12"></line>
                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
            </svg>
        </div>
        <div class="topbar-admin">
            <div class="topbar-avatar">{{ strtoupper(substr($company->name ?? 'C', 0, 2)) }}</div>
            <span class="topbar-admin-name">{{ $company->name ?? 'Company' }}</span>
        </div>
    </div>
</div>
<!-- header area end -->
