<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                How long does it usually take to move from {{ $cityToCityRoute->cityFrom->name }},
                {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Most relocations between {{ $cityToCityRoute->cityFrom->name }} to
                    {{ $cityToCityRoute->cityTo->name }} take around one to two days. The exact timing depends on how much you’re moving, the route taken, and whether you choose full-service movers or handle the move yourself.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                What does it cost to move from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
           <p>Moving prices can vary widely based on your home size and the services you select. On this route, full-service movers often charge between <b><span class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b> for a studio or one-bedroom, with higher rates for larger homes.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                What influences the cost of a move from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Several things affect your final price, including how big your home or shipment is, the type of moving service you choose (full service, DIY, or truck rental), and the time of year you move.
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingfour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefour">
                Will the cost of living change after relocating from 
                {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              <p>Yes, there can be some adjustments. Daily expenses like groceries and utilities may change slightly. Some costs could increase, so comparing expenses ahead of time can help you plan your budget.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingfive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefive">
                What is the best time of year to move from {{ $cityToCityRoute->cityFrom->name }},
                (or {{ $cityToCityRoute->cityFrom->state->name }}) to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Spring and fall are often the best choices since they usually avoid peak prices and harsh weather. Moving during off-peak times, such as winter, may also come with lower rates.  </p>
            </div>
        </div>
    </div>

</div>
