<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                What does a move from {{ $stateToCityRoute->stateFrom->name }} to
                {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} usually cost?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Most moves from {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }} fall between <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span> and <span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The price depends on your home size and the type of moving help you choose. Packing your
                    own items or moving during slower months can bring the cost down.
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
                    covers roughly <span class="miles_upp">{{ number_format($stateToCityRoute->miles) }} miles</span>, though the distance changes based on where you
                    start.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                Is moving to {{ $stateToCityRoute->cityTo->name }},
                {{ $stateToCityRoute->cityTo->state->abv }} a good idea?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Yes, {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}
                    can be a strong choice if you want new opportunities and a better quality of life. The city offers
                    affordable living, solid job options, and a friendly community. Make sure you look into the cost of
                    living, local jobs, and lifestyle to see if it fits what you want.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefour">
                When is the best season to move from {{ $stateToCityRoute->stateFrom->name }} to
                {{ $stateToCityRoute->cityTo->name }}?
            </button>
        </h2>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Spring and fall usually offer mild weather and lower moving rates. Summer tends to cost more and
                    stays busy, while winter brings cheaper prices but colder travel conditions.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefive">
                What should I take care of after moving to {{ $stateToCityRoute->cityTo->name }}?
            </button>
        </h2>
        <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Once you settle in, turn on your utilities, update your address and driver’s license, and find nearby
                    stores and services. Spend some time checking out popular spots so you can get used to the area.</p>
            </div>
        </div>
    </div>

</div>
