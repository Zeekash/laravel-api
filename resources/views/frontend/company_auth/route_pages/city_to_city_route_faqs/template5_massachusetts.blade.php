<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                How Much Does It Cost to Move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }}?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Expect to spend between <b><span
                            class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> – <b><span
                            class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b> when moving from
                    {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }}. The total cost changes depending on the season and
                    whether you add services like packing or storage. Most moving companies give free quotes, so compare
                    a few before you book.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                How Long Does It Take to Move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }}?
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Driving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} usually takes about <b><span class="duration_text">{{ $duration ?? '0 hours 0 minutes' }}</span></b>. Most moves
                    finish the same day unless you have a large home or make extra stops along the way. </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                When Is the Best Time to Move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }} route?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Spring and fall usually offer the best time to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} because the weather stays mild and movers have lighter
                    schedules. Summer tends to be the busiest season, which drives prices up, while winter moves can
                    slow down if the weather gets rough.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseFour">
                What Services Do Movers Provide for a {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }} Move?
            </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Movers usually handle packing, loading, transport, and unloading. Many also offer add-ons like
                    storage, furniture setup, and packing materials if you need them.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseFive">
                How Can You Make Your Move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }} Easier?
            </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Start packing early, label every box, and keep your first-night essentials with you. Book your movers
                    a few weeks ahead to get better prices and avoid last-minute stress.</p>
            </div>
        </div>
    </div>
</div>
