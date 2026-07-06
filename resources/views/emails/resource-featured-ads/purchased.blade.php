@include('emails.resource-featured-ads.partials.header', ['title' => 'Resource Featured Slot Purchased'])

@if($isAdmin)
    <h3 style="margin-top:0;">A company purchased a resource featured slot.</h3>
@else
    <h3 style="margin-top:0;">Your resource featured slot is now active.</h3>
@endif

@include('emails.resource-featured-ads.partials.details')

@include('emails.resource-featured-ads.partials.footer')
