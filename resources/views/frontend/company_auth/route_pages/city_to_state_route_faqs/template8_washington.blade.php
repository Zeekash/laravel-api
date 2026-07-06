<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                How long will it take to move from {{ $cityToStateRoute->cityFrom->name }},
                {{ $cityToStateRoute->cityFrom->state->abv }} to
                {{ $cityToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>It usually takes about three to four days to move from {{ $cityToStateRoute->cityFrom->name }} to
                    {{ $cityToStateRoute->stateTo->name }}. The time depends on how much stuff you’re moving, whether you choose a full-service move or do it yourself, and where exactly you’re headed in {{ $cityToStateRoute->stateTo->name }}.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                How much does it cost to move from {{ $cityToStateRoute->stateTo->name }} from
                {{ $cityToStateRoute->cityFrom->name }}?
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>The cost of moving from {{ $cityToStateRoute->cityFrom->name }},
                    {{ $cityToStateRoute->cityFrom->state->abv }} to
                    {{ $cityToStateRoute->stateTo->name }}
                    can range from <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> to <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. Smaller moves, like for a studio or one-bedroom apartment, might cost between <b><span class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b>, while moving larger homes can go up to <b><span
                            class="move_cost_4_bedroom_max">{{ $calculatedCosts['bedrooms4']['company']['max_formatted'] ?? '$0' }}</span></b>.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                Will my cost of living change if I move from {{ $cityToStateRoute->cityFrom->name }} to
                {{ $cityToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Not by much. Most of the living expenses stay about the same, but you might see some changes in housing costs or taxes. It’s a good idea to compare the specific things that matter most to you.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefour">
                What should I do when moving to
                {{ $cityToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Start by updating your address and setting up utilities. Then, get an {{ $cityToStateRoute->stateTo->name }} driver’s license, register your car, and update your voter registration. It’s also a good idea to look into local tax rules, schools, and healthcare options before you fully settle in.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefive">
                Why are people moving from {{ $cityToStateRoute->cityFrom->name }},
                (or {{ $cityToStateRoute->cityFrom->state->name }}) to
                {{ $cityToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>A lot of people are making the move because {{ $cityToStateRoute->stateTo->name }} offers affordable housing, lots of outdoor activities, and good job opportunities.
                </p>
            </div>
        </div>
    </div>

</div>
