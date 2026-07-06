<div class="accordion mt-4" id="faqAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne">
                How much does it cost to move from {{ $stateToStateRoute->stateFrom->name }} to
                {{ $stateToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <a href="https://mymovingjourney.com/blogs/what-is-the-average-cost-of-hiring-a-moving-company"><b>The average cost of moving</b></a> from {{ $stateToStateRoute->stateFrom->name }} to
                {{ $stateToStateRoute->stateTo->name }} is between @isset($move_size_cost->moving_company_2_3_bedroom)
                <b>{{ str_replace(['-', '–', '—'], 'and', $move_size_cost->moving_company_2_3_bedroom) }}</b>@endisset. The total cost depends on your <a href="https://mymovingjourney.com/blogs/how-to-estimate-your-move-size"><b>home size</b></a> and the type of moving
                service you choose. Renting a truck is the most affordable option, while full-service movers cost more
                but handle every part of the move for you.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo">
                How long does it take to move from {{ $stateToStateRoute->stateFrom->name }} to
                {{ $stateToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Most moves from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}
                take one to three days, depending on your starting and ending locations. If you use a moving container,
                delivery may take up to a week.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree">
                What is the cheapest way to move from {{ $stateToStateRoute->stateFrom->name }} to
                {{ $stateToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <a href="https://mymovingjourney.com/blogs/cheapest-way-to-move-out-of-state"><b>The cheapest way to move</b></a> is by renting a truck and driving it yourself. Moving containers are another
                affordable choice since you pack your belongings, and the company manages the transport.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefour">
                How do I choose the right moving company?
            </button>
        </h2>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Look for movers with strong reviews, clear pricing, and the right licenses for long-distance moves.
                Compare a few quotes before booking and confirm they provide <a href="https://mymovingjourney.com/blogs/how-does-moving-insurance-work"><b>insurance for your belongings</b></a>.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header m-0" id="headingfive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsefive">
                What should I do before moving from {{ $stateToStateRoute->stateFrom->name }} to
                {{ $stateToStateRoute->stateTo->name }}?
            </button>
        </h2>
        <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Before you move, make a checklist to stay organized. Schedule your movers early, transfer utilities,
                change your address, and update your driver’s license and vehicle registration once you arrive in
                {{ $stateToStateRoute->stateTo->name }}.
            </div>
        </div>
    </div>

</div>
