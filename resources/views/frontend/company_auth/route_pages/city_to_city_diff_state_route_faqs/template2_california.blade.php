<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button " type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                How much time does it take to move from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>A typical move between {{ $cityToCityRoute->cityFrom->name }} and
                    {{ $cityToCityRoute->cityTo->name }} usually takes around three to five days, depending on how much
                    you’re moving, the route you take, and whether you hire professionals or handle the move yourself.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                What’s the average price to relocate from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>The cost depends on your home’s size and the moving services you choose. On average, full-service
                    movers charge between <b><span class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b> for a studio or one-bedroom
                        move, with prices increasing for larger homes. </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                Which factors influence the moving cost from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Your total cost depends on a few main things, such as the size of your move, the type of service you
                    pick (full-service movers, DIY, or truck rental), and the time of year you relocate. </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseFour">
                Will living expenses change after moving from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>You might notice some cost differences. Everyday items like groceries and utilities can vary, so
                    it’s smart to compare expenses ahead of time to see how your budget might adjust.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseFive">
                What’s the best season to move from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Spring and fall are often the best times since the weather is mild and moving costs are
                    lower. You can also find better rates if you move during the off-season, such as winter.
                </p>
            </div>
        </div>
    </div>
</div>
