<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                How much does it cost to move from {{ $stateToCityRoute->stateFrom->name }} to
                {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>The average cost to move from {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }} is between <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span> and <span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>, depending on your home size and moving service. Packing yourself or moving during
                    off-season months can lower your total cost.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                How far is {{ $stateToCityRoute->cityTo->name }} from
                {{ $stateToCityRoute->stateFrom->name }}?
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>The distance between {{ $stateToCityRoute->stateFrom->name }} and
                    {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}
                    is about <span class="miles_upp">{{ number_format($stateToCityRoute->miles) }} miles</span>, depending on your starting point.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                Is it worth moving to {{ $stateToCityRoute->cityTo->name }},
                {{ $stateToCityRoute->cityTo->state->abv }}?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Yes, moving to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}
                    can be a great choice if you’re looking for new opportunities and a better quality of life. The city
                    offers a mix of <b>affordable living, steady job options, and a welcoming community</b>. Before
                    moving,
                    check out details like the <b>cost of living, local job market, and lifestyle</b> to make sure it
                    fits what
                    you’re looking for.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefour">
                What is the best time of year to move from {{ $stateToCityRoute->stateFrom->name }} to
                {{ $stateToCityRoute->cityTo->name }}?
            </button>
        </h2>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>The best time to move is during spring or fall when the weather is mild and moving rates are lower.
                    Summer is the busiest and most expensive season, while winter offers cheaper prices but cooler
                    travel conditions.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefive">
                What should I do after moving to {{ $stateToCityRoute->cityTo->name }}?
            </button>
        </h2>
        <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>After you move, set up your utilities, update your address and driver’s license, and explore local
                    stores and services. Take time to visit popular places to get familiar with the area.</p>
            </div>
        </div>
    </div>

</div>
