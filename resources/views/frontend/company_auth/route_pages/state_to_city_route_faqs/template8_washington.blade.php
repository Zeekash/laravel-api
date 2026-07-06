<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                What does it cost to move from {{ $stateToCityRoute->stateFrom->name }} to
                {{ $stateToCityRoute->cityTo->name }}?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Most people pay between <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span> and <span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b> to move from {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}. Your final price depends on how much furniture you have and
                    the moving service you choose. Packing your own boxes or moving between October and April can reduce
                    your bill.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                How long is the trip from {{ $stateToCityRoute->cityTo->name }} from
                {{ $stateToCityRoute->stateFrom->name }}?
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>You'll travel about <span class="miles_upp">{{ number_format($stateToCityRoute->miles) }} miles</span> from {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}. Your exact mileage will change based on where
                    you begin your trip.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                Should I move to {{ $stateToCityRoute->cityTo->name }},
                {{ $stateToCityRoute->cityTo->state->abv }}?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Moving to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}
                    can be a great decision for people seeking new opportunities and improved daily life. The city
                    provides affordable housing, consistent employment options, and friendly neighborhoods. Before you
                    commit, research the local living costs, job availability, and community atmosphere to ensure it
                    matches your preferences.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefour">
                When is the ideal time to move from {{ $stateToCityRoute->stateFrom->name }} to
                {{ $stateToCityRoute->cityTo->name }}?
            </button>
        </h2>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Spring and fall offer the best conditions for your move, with comfortable weather and lower moving
                    company rates. Summer brings the highest prices and greatest demand, while winter offers lower costs
                    but colder traveling weather.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefive">
                What should I do right after moving to {{ $stateToCityRoute->cityTo->name }}?
            </button>
        </h2>
        <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>After arriving in {{ $stateToCityRoute->cityTo->name }}, activate your essential utilities, change
                    your official address, and get your Alabama driver's license. Discover nearby stores and important
                    services, then visit well-known local spots to become familiar with your new surroundings.</p>
            </div>
        </div>
    </div>

</div>
