<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                What is the average cost to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }}?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>The cost to move from  when moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} usually falls between <b><span
                            class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> and <b><span
                            class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b>. The total may change depending on the season and if you choose packing or storage services. Most moving companies provide free estimates, so comparing several options before you book is a smart move.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                How much time does a move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }} usually take?
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Driving time for this move sits around <b><span class="duration_text">{{ $duration ?? '0 hours 0 minutes' }}</span></b>. Most moves finish quickly unless you have a large home or plan for extra stops on the way.  </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                Which season works best for moving from  {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }} route?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Spring and fall usually make the ideal seasons to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} since the weather stays comfortable and moving companies are not as busy. Summer remains the most in-demand period, which can raise prices, while winter moves may take more time if poor weather causes delays.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseFour">
                What services do movers provide for {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }} moves?
            </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Most movers handle packing, loading, transport, and unloading. Some companies also provide add-on options such as storage, furniture assembly, or packing materials if you need extra help.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseFive">
              What steps can make this move easier?
            </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Start packing early, mark boxes clearly, and keep your first-night items close by. Scheduling movers a few weeks ahead also helps you secure better pricing and reduces last-minute stress.</p>
            </div>
        </div>
    </div>
</div>
