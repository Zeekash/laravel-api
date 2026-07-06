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
                <p>Most moves between {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }} fall between <b><span
                            class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> – <b><span
                            class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b>.
                 Your final total can change based on the season and whether you add packing or storage. Many companies provide free estimates, so checking a few options before booking is a smart move.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                How much time does a move between these cities usually take?
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Driving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }},
                {{ $cityToCityRoute->cityTo->state->abv }} takes about <b><span class="duration_text">{{ $duration ?? '0 hours 0 minutes' }}</span></b>. In most cases, movers finish the job the same day unless the home is large or there are extra stops planned.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
             Which time of year is best for this move?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Spring and fall tend to offer the most comfortable conditions. Mild weather and lower demand make these seasons easier on both scheduling and cost. Summer brings higher prices, while bad winter weather can slow things down. </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseFour">
              What services are typically included with movers on this route?
            </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Moving companies often handle packing, loading, transport, and unloading. Some also provide add-ons like storage, furniture setup, or packing materials if requested.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseFive">
               What steps can make this move less stressful?
            </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Start packing ahead of time, label each box clearly, and keep important items close for your first night. Scheduling movers early also helps you secure better rates and avoid last-minute pressure.</p>
            </div>
        </div>
    </div>
</div>
