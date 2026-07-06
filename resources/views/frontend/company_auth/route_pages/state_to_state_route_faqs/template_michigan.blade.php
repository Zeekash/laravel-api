<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                How much does it cost to move from {{ $stateToStateRoute->stateFrom->name }} to
                {{ $stateToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Moving from {{ $stateToStateRoute->stateFrom->name }} to
                {{ $stateToStateRoute->stateTo->name }} can cost anywhere from @isset($move_size_cost->moving_company_2_3_bedroom)
                <b>{{ str_replace(['-', '–', '—'], 'and', $move_size_cost->moving_company_2_3_bedroom) }}</b>@endisset. The price depends on
                how much you’re moving and which service you pick. Renting a truck is the cheapest option, while hiring
                full-service movers costs more because they handle everything for you.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                How long does it take to move from {{ $stateToStateRoute->stateFrom->name }} to
                {{ $stateToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                The trip from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}
                usually takes one to three days, depending on your start and end points. If you use a moving container,
                it might take up to a week for delivery.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                What is the cheapest way to move from {{ $stateToStateRoute->stateFrom->name }} to
                {{ $stateToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Renting a truck and driving it yourself is the lowest-cost way to move. You can also save money with
                moving containers, where you load your items and the company transports them for you.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefour">
                How do I choose the right moving company?
            </button>
        </h2>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Pick movers with strong reviews, fair pricing, and the proper licenses for out-of-state moves. Always
                compare several quotes and make sure they include insurance to protect your belongings.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefive">
                What should I do before moving from {{ $stateToStateRoute->stateFrom->name }} to
                {{ $stateToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Before your move, plan ahead and make a checklist. Reserve movers early, transfer your utilities, update
                your address, and change your driver’s license and registration once you settle in
                {{ $stateToStateRoute->stateTo->name }}.
            </div>
        </div>
    </div>

</div>
