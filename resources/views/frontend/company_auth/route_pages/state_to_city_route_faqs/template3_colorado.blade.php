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
                <p>Most moves from {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }} cost between <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span> and <span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The price changes based on your home size and the type of help you choose. Packing your own things or moving during slower months can bring the cost down.
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
                <p>The trip from {{ $stateToCityRoute->stateFrom->name }} and
                    {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}
                    is roughly <span class="miles_upp">{{ number_format($stateToCityRoute->miles) }} miles</span>, though the exact distance depends on where you start.</p>
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
                <p>Yes,{{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} can be a solid choice if you want fresh opportunities and a better quality of life. The city offers affordable living, steady job options, and a friendly community. Make sure you check things like cost of living, job openings, and lifestyle to see if it matches what you want.
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
                <p>Spring and fall usually offer the best mix of mild weather and lower moving rates. Summer costs more and gets busy, while winter is cheaper but colder for travel.</p>
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
                <p>Once you arrive, set up your utilities, update your address and driver’s license, and learn where the nearby stores and services are. Spend some time visiting local spots so you can get comfortable with the area.</p>
            </div>
        </div>
    </div>

</div>
