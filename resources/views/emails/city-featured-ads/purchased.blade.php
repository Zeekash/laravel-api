@include('emails.city-featured-ads.partials.header', ['title' => 'City Featured Slot Purchased'])

@if($isAdmin)
    <h3 style="margin-top:0;">A company purchased a city featured slot.</h3>
@else
    <h3 style="margin-top:0;">Your city featured slot is now active.</h3>
@endif

@include('emails.city-featured-ads.partials.details')

@include('emails.city-featured-ads.partials.footer')
