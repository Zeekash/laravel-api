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
                <p>The average cost to move from {{ $stateToStateRoute->stateFrom->name }} to
                    {{ $stateToStateRoute->stateTo->name }} is between @isset($move_size_cost->moving_company_2_3_bedroom)
                        <b>{{ str_replace(['-', '–', '—'], 'and', $move_size_cost->moving_company_2_3_bedroom) }}</b>
                    @endisset. Prices depend on your <a
                        href="https://mymovingjourney.com/blogs/how-to-estimate-your-move-size"><b>home size</b></a> and
                    the
                    type of moving service.
                    Renting a truck is the cheapest option, while full-service movers cost more but handle the whole
                    process
                    for you.
                </p>
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
                <p>Most moves from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}
                    take one to three days, depending on your starting and ending cities. If you use a moving container,
                    delivery can take up to a week.</p>
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
                <p>The <a href="https://mymovingjourney.com/blogs/cheapest-way-to-move-out-of-state"><b>cheapest way to
                            move</b></a> is to rent a truck and drive it yourself. Moving containers are another
                    budget-friendly option since you load your items, and the company takes care of transport.</p>
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
                <p>Choose movers with good reviews, clear pricing, and proper licenses for long-distance moves. Compare
                    quotes from several companies, and make sure they offer <a
                        href="https://mymovingjourney.com/blogs/how-does-moving-insurance-work"><b>insurance for your
                            belongings</b></a>.</p>
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
                <p>Before moving, make a checklist to stay organized. Book your movers early, transfer utilities, change
                    your address, and update your driver’s license and vehicle registration once you arrive in
                    {{ $stateToStateRoute->stateTo->name }}.</p>
            </div>
        </div>
    </div>

</div>
