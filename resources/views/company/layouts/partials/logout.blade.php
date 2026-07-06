@php
    $company = auth()->guard('company')->user();
@endphp
<div class="user-profile pull-right">
    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
        {{ $company->company_name ?? 'Company User' }}
        <i class="fa fa-angle-down"></i>
    </h4>

    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('company.logout') }}"
            onclick="event.preventDefault(); document.getElementById('company-logout-form').submit();">
            Log Out
        </a>
    </div>

    <form id="company-logout-form" action="{{ route('company.logout') }}" method="GET" style="display: none;">
    </form>
</div>
