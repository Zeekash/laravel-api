<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                How long does it take to move from {{ $cityToCityRoute->cityFrom->name }},
                {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Most moves along {{ $cityToCityRoute->cityFrom->name }} to
                    {{ $cityToCityRoute->cityTo->name }} take about five to seven days. The exact time depends on how
                    much you’re moving, the route you take, and whether you hire professional movers or handle it
                    yourself.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                What is the cost of moving from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Moving expenses can vary widely based on your home size and chosen services. For example,
                    full-service movers often charge between <b><span class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b> for a
                        studio or one-bedroom, with prices increasing for larger homes.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                What influences moving costs from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>The main factors include the size of your home or load, the type of moving services you pick
                    (full-service, DIY, or truck rental), and the timing of your move. Each of these can affect your
                    final cost.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingfour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefour">
                Will my living expenses change after relocating from
                {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Some costs may shift. Everyday expenses like groceries and utilities can be slightly higher or lower.
                    It’s smart to compare costs beforehand so you know how your budget might adjust.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingfive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefive">
                When is the best time to move from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Spring and fall are often the best times to move because you avoid peak rates and harsh weather.
                    Moving during slower seasons, like winter, can sometimes save money.</p>
            </div>
        </div>
    </div>

</div>
