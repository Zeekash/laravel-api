<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                How much time does it take to move from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Most movers complete the trip from {{ $cityToCityRoute->cityFrom->name }} and
                    {{ $cityToCityRoute->cityTo->name }} in one to seven days, depending on how much you’re moving, the route, and whether you hire professionals or move on your own.
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
                <p>Moving costs depend on your home’s size and the services you choose. On average, full-service movers charge between <b><span class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b> for a studio or one-bedroom move, with higher prices for larger homes.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
           What factors influence the cost of moving from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>Your total cost depends on several things like the size of your home or shipment, the type of moving service you select (full-service, DIY, or truck rental), and the time of year you move.</p>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingfour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefour">
                Will my living costs change after moving from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}?
            </button>
        </h3>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p>You might notice some changes in everyday expenses like groceries and utilities. It’s smart to compare costs ahead of time so you know how your budget might shift after the move.</p>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h3 class="accordion-header m-0" id="headingfive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefive">
                When should I plan my move from {{ $cityToCityRoute->cityFrom->name }} to
                        {{ $cityToCityRoute->cityTo->name }}?
                    </button>
                </h3>
                <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <p>Spring and fall usually offer the best balance of mild weather and reasonable prices. If you move during the winter, you might find even lower rates since it’s the off-season.</p>
                    </div>
                </div>
            </div>

        </div>
