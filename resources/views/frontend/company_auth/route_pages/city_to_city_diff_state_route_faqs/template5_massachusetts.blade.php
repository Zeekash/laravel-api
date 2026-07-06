<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                What is the average driving time for a move from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Your move from {{ $cityToCityRoute->cityFrom->name }} and
                    {{ $cityToCityRoute->cityTo->name }} will typically take between four and six days. The exact time depends on the size of your shipment, the specific route, and whether you hire a full-service moving company or manage the move yourself. 
                </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                How much does it cost to relocate from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>The price can vary greatly depending on the size of your home and the services you choose. For example, full-service moving companies usually charge between <b><span class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b> for a studio or 1-bedroom apartment, with prices rising for larger homes.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
           What factors impact the cost of moving from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Several things influence your moving costs, such as the size of your home or load, the type of services you select (full-service, DIY, or truck rental), and the timing of your move (seasonal fluctuations). All of these will affect your final price. </p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingfour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefour">
                Will my cost of living change after moving from  {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Yes, you can expect some changes in your cost of living. Everyday items like groceries and utilities will likely have different price points. We recommend comparing specific expenses beforehand to understand how your budget will be affected. </p>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingfive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefive">
                When is the best time to schedule a move from {{ $cityToCityRoute->cityFrom->name }} to
                        {{ $cityToCityRoute->cityTo->name }}?
                    </button>
                </h3>
                <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <p>For the best balance of price and weather, we suggest planning your move for the spring or fall. If you want to secure the lowest possible rates, consider scheduling during the off-peak winter season. </p>
                    </div>
                </div>
            </div>

        </div>
