@include('emails.city-featured-ads.partials.header', ['title' => 'City Featured Slot Cancellation'])

@if($isAdmin)
    <h3 style="margin-top:0;">A company cancelled a city featured slot.</h3>
@else
    <h3 style="margin-top:0;">Your cancellation request has been received.</h3>
@endif

<p style="line-height:1.6;color:#475569;">
    @if($subscription->cancel_at_period_end)
        The slot will remain active until the current paid period ends.
    @else
        The slot has been cancelled and released.
    @endif
</p>

@include('emails.city-featured-ads.partials.details')

@include('emails.city-featured-ads.partials.footer')
