<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                How long will the move from {{ $cityToStateRoute->cityFrom->name }},
                {{ $cityToStateRoute->cityFrom->state->abv }} to
                {{ $cityToStateRoute->stateTo->name }} take?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>The move from {{ $cityToStateRoute->cityFrom->name }} to
                    {{ $cityToStateRoute->stateTo->name }} usually takes between one to two days. The duration depends
                    on the amount of belongings you're moving, the type of service you choose (full-service or DIY), and
                    your specific destination.
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
                    typically ranges from <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> to <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. Smaller moves, such as a
                        studio or one-bedroom apartment, usually cost between <b><span class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b>, while larger homes can go up to <b><span class="move_cost_4_bedroom_max">{{ $calculatedCosts['bedrooms4']['company']['max_formatted'] ?? '$0' }}</span></b>.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                Will my cost of living change significantly if I move from {{ $cityToStateRoute->cityFrom->name }} to
                {{ $cityToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>The cost of living won’t vary drastically, as many factors remain similar. However, areas like
                    housing and taxes may differ slightly, so it’s best to compare the specific costs that are most
                    important to you.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefour">
                What are the key steps I should take when moving to
                {{ $cityToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>When moving to {{ $cityToStateRoute->stateTo->name }}, make sure to update your address and set up
                    utilities in your new home. Then, get an {{ $cityToStateRoute->stateTo->name }}
                    driver’s license, register your vehicle, and update your voter registration. It’s also advisable to
                    review local taxes, schools, and healthcare options before settling in.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefive">
                Why are people choosing to move from {{ $cityToStateRoute->cityFrom->name }} to
                {{ $cityToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Many people are drawn to {{ $cityToStateRoute->stateTo->name }} for its affordable housing, abundant outdoor activities, and job opportunities. 
                </p>
            </div>
        </div>
    </div>

</div>
