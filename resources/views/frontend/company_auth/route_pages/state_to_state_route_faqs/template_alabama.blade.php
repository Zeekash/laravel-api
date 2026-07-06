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
                    @endisset, depending on the <a
                        href="https://mymovingjourney.com/blogs/how-to-estimate-your-move-size"><b>size of your
                            home</b></a>
                    and the type of moving service. A
                    rental truck is the cheapest option, while full-service movers cost more but handle everything for
                    you.
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
                    take 1 to 3 days, depending on your starting and ending cities. If you’re using a moving container,
                    delivery might take up to a week.</p>
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
                            move</b></a> is by renting a moving truck and driving it yourself. Moving containers are
                    another affordable choice since you load your items, and the company handles the transport.</p>
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
                <p>Look for movers with good reviews, transparent pricing, and proper licenses for interstate moves.
                    Compare quotes from a few companies before booking, and make sure they offer <a
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
                <p>Before moving, make a checklist to stay organized. Book movers early, transfer utilities, change your
                    address, and update your license and registration once you arrive in your new state.</p>
            </div>
        </div>
    </div>

</div>
