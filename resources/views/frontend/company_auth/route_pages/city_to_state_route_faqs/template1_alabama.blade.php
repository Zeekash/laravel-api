<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                How much time does it usually take to relocate from {{ $cityToStateRoute->cityFrom->name }},
                {{ $cityToStateRoute->cityFrom->state->abv }} to
                {{ $cityToStateRoute->stateTo->name }} take?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Most moves from {{ $cityToStateRoute->cityFrom->name }} to
                    {{ $cityToStateRoute->stateTo->name }} take about one to four days, depending on how much you’re
                    moving, what kind of service you use (full-service vs DIY), and where exactly you’re going.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                What does it cost to move from {{ $cityToStateRoute->stateTo->name }} from
                {{ $cityToStateRoute->cityFrom->name }}?
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>The average cost to move from {{ $cityToStateRoute->cityFrom->name }},
                    {{ $cityToStateRoute->cityFrom->state->abv }} to
                    {{ $cityToStateRoute->stateTo->name }}
                    ranges from <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> to <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. Smaller moves, like a studio or
                        one-bedroom apartment, may cost around <b><span class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> to <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b>, while larger
                        homes can reach up to <b><span class="move_cost_4_bedroom_max">{{ $calculatedCosts['bedrooms4']['company']['max_formatted'] ?? '$0' }}</span></b>.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                Will the cost of living change much if I move from {{ $cityToStateRoute->cityFrom->name }} to
                {{ $cityToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Not drastically, many living-cost elements remain similar. Still, some things like housing or taxes
                    may shift a bit, so it’s smart to compare the specific cost items you care about.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefour">
                What important steps do I need to take when moving to
                {{ $cityToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              <p>When you move to {{ $cityToStateRoute->stateTo->name }}, start by updating your address and setting up your new utilities. Next, get an {{ $cityToStateRoute->stateTo->name }} driver’s license, register your vehicle, and update your voter registration. It’s also a good idea to check local rules for taxes, schools, and healthcare options before you settle in.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefive">
                Why are people choosing to move from {{ $cityToStateRoute->cityFrom->name }},
                (or {{ $cityToStateRoute->cityFrom->state->name }}) to
                {{ $cityToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Many are moving because {{ $cityToStateRoute->stateTo->name }} offers more affordable housing,
                    strong outdoor and lifestyle options, and job opportunities. </p>
            </div>
        </div>
    </div>

</div>
