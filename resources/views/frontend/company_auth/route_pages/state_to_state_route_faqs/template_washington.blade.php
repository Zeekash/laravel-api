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
                Moving from {{ $stateToStateRoute->stateFrom->name }} to
                {{ $stateToStateRoute->stateTo->name }} typically costs between @isset($move_size_cost->moving_company_2_3_bedroom)
                    <b>{{ str_replace(['-', '–', '—'], 'and', $move_size_cost->moving_company_2_3_bedroom) }}</b>
                @endisset. The total depends on the <a
                    href="https://mymovingjourney.com/blogs/how-to-estimate-your-move-size"><b>size of your home</b></a>
                and the service you
                choose. Renting a truck is the most affordable choice, while full-service movers charge more but handle
                everything for you.
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
                The trip from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}
                usually takes about one to three days, depending on where you start and end. If you use a moving
                container, it may take up to a week for delivery.
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
                Renting a moving truck and driving it yourself is the least <a
                    href="https://mymovingjourney.com/blogs/cheapest-way-to-move-out-of-state"><b>expensive way to
                        move</b></a>. Moving containers are
                another low-cost choice since you do the packing, and the company handles transportation.
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
                Look for movers with positive reviews, honest pricing, and the right licenses for interstate moves.
                Compare several estimates before booking, and make sure the company provides <a
                    href="https://mymovingjourney.com/blogs/how-does-moving-insurance-work"><b>insurance for your
                        belongings</b></a>.
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
                Before your move, make a detailed checklist to stay on schedule. Reserve your movers early, arrange for
                utility transfers, <a
                    href="https://mymovingjourney.com/blogs/how-to-change-your-address-when-you-move"><b>update your
                        address</b></a>, and get your new driver’s license and vehicle registration once
                you settle in {{ $stateToStateRoute->stateTo->name }}.
            </div>
        </div>
    </div>

</div>
