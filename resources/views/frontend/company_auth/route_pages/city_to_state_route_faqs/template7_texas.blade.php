<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                How long does it take to move from {{ $cityToStateRoute->cityFrom->name }},
                {{ $cityToStateRoute->cityFrom->state->abv }} to
                {{ $cityToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Typically, a move from {{ $cityToStateRoute->cityFrom->name }} to
                    {{ $cityToStateRoute->stateTo->name }} takes anywhere from two to five days. The duration depends on
                    the amount you're moving, the type of service you choose (full-service or DIY), and your exact
                    destination.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                What is the cost of relocating from {{ $cityToStateRoute->stateTo->name }} from
                {{ $cityToStateRoute->cityFrom->name }}?
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>The cost to move from {{ $cityToStateRoute->cityFrom->name }},
                    {{ $cityToStateRoute->cityFrom->state->abv }} to
                    {{ $cityToStateRoute->stateTo->name }}
                    usually falls between <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. Smaller moves, like a studio
                        or one-bedroom apartment, tend to range from <b><span class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> to <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b>, while larger homes could go up to <b><span
                            class="move_cost_4_bedroom_max">{{ $calculatedCosts['bedrooms4']['company']['max_formatted'] ?? '$0' }}</span></b>.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                Will my cost of living change if I relocate from {{ $cityToStateRoute->cityFrom->name }} to
                {{ $cityToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>The change in living costs will not be significant. Most aspects of living expenses are quite
                    similar. However, certain factors such as housing or taxes may vary, so it's advisable to compare
                    the specific costs that matter most to you.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefour">
                What essential tasks should I complete when moving to
                {{ $cityToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Start by changing your address and setting up utilities for your new home. Then, update your driver's
                    license, register your car, and update your voter registration. It's also a good idea to familiarize
                    yourself with local tax regulations, school options, and healthcare services before settling in.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefive">
                Why are people choosing to move to {{ $cityToStateRoute->cityFrom->name }},
                (or {{ $cityToStateRoute->cityFrom->state->name }}) to
                {{ $cityToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Many people are drawn to {{ $cityToStateRoute->stateTo->name }} for its affordable housing, ample
                    outdoor activities, lifestyle opportunities, and job market.
                </p>
            </div>
        </div>
    </div>

</div>
