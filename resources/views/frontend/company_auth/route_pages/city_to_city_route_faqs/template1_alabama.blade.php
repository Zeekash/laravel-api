<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                How much will it cost to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }}?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Moving costs from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} typically range between <b><span
                            class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> and <b><span
                            class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b>. The final price can also vary based on the time
                    of year and whether you need packing or storage services. Most moving companies offer free quotes,
                    so it’s best to compare a few options before booking.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                How long does a move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }} take?
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>The move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} usually takes around <b><span class="duration_text">{{ $duration ?? '0 hours 0 minutes' }}</span></b> of driving
                    time. Most moves can be completed early unless you have a large home or extra stops along the way.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                When is the best time to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }} route?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Spring and fall are often the best seasons to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} because the weather is mild and moving companies are
                    less
                    busy. Summer is the most popular time, so prices can be higher, and winter moves may take longer if
                    the weather is bad.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseFour">
                What do movers include when moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }}?
            </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Most movers help with packing, loading, transportation, and unloading. Some also offer extra services
                    like storage, furniture assembly, or packing supplies if you need them.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseFive">
                How can I make my move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }} easier?
            </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>You can make your move smoother by packing early, labeling boxes clearly, and keeping essentials with
                    you for the first night. Booking your movers a few weeks in advance also helps you get better rates
                    and avoid last-minute stress.</p>
            </div>
        </div>
    </div>
</div>
