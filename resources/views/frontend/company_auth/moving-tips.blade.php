@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row my-5">
                <div class="move-tip-img position-relative">
                    <img src="{{ asset('assets/img/tip-img1.jpg') }}" style="z-index: 3;"
                        class="position-relative img-fluid px-md-5 px-0 w-100" alt="Image">
                    <h1 style="z-index: 3;" class="px-md-5 px-2 my-5 text-center fw-bolder">Moving Tips</h1>
                    <p class="fs-5 text-black px-md-5 px-2">It's good that there's a lot of tried-and-true guidance to help
                        make relocating easier. This is hardly surprising considering how commonplace it is for people to
                        relocate. An effective moving tip is to commit to keeping a happy mindset despite all the
                        approaching turmoil by applying a moving checklist before, during, and after the move.</p>
                    <p class="fs-5 text-black px-md-5 px-2">While some articles advise readers on how to load a moving truck
                        efficiently, others highlight the need to cancel services and get a new place set up. Other advice
                        addresses the finer points of moving, such as what to do if the movers are running late or how to
                        take care of pets throughout the transition. However, the actual move itself may be the most
                        important thing to know before moving.</p>
                    <p class="fs-5 text-black px-md-5 px-2">The chances of something going wrong during a move are high.
                        Since there are so many different aspects to moving and subtleties to consider, no universal moving
                        guide can provide advice for every possible scenario. In most cases, the information on this basic
                        list of moving tips and tricks will be useful. However, individual people will have different needs
                        or worries, such as how to pack dishes for moving or carry delicate heirlooms or costly wood
                        furniture properly. If you take a glance now, you'll be ready for a speedier, simpler, and more
                        efficient relocation later.</p>
                </div>
                <section class="bg-of-aqua-shade py-3">
                    <div class="container row">
                        <hr>
                        @foreach ($post as $posts)
                            <div class="col-lg-4 col-md-6 col-12 my-3">
                                <a href="{{ route('company.post-show', $posts->id) }}">
                                    <img src="{{ URL::to('/posts/image/' . $posts->image) }}"
                                        class="my-3 w-100 img2-of-blogs" alt="Image">
                                    <div class="blog-2-inner-content my-3">
                                        <h4 class="heading-check-list fs-5">{{ $posts->title }}</h4>
                                        <div class="d-flex justify-content-between">
                                            <p class="para-check-list fs-14 my-0"><i
                                                    class="fa fa-user me-1 text-danger"></i> {{ $posts->admin->name }} </p>
                                            <p class="para-check-list my-0 fs-14"><i
                                                    class="fa fa-clock me-1 text-danger"></i>
                                                {{ \Carbon\Carbon::parse($posts->created_at)->format('M d, Y') }} </p>
                                        </div>
                                        <p class="para-check-list my-0 fs-14 fw-normal">
                                            {{ substr(strip_tags($posts->description), 0, 85) }}
                                            <span style="color:#123269;"
                                                class="fw-bold">{{ strlen(strip_tags($posts->description)) > 85 ? '...ReadMore' : '' }}</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <div class="pagination-container d-flex justify-content-center wow zoomIn mar-b-1x my-3"
                            data-wow-duration="0.5s">
                            <ul class="pagination">

                            </ul>
                        </div>
                    </div>
                </section>
                <h3 class="px-md-5 px-2">Car transportation</h3>
                <p class="fs-5 text-black px-md-5 px-2">To have a car transferred from one location to another, a customer
                    must first get in touch with a company that specialises in this field. The service is available from our
                    company. The customer and the carrier negotiate terms for the shipment of the automobile. After the
                    contract is finalised, the company will have a carrier truck to get the automobile from the customer.
                    The carrier truck subsequently delivers the automobile to the customer's designated location.</p>
                <p class="fs-5 text-black px-md-5 px-2">With a trustworthy company like ours, receiving a price, signing a
                    contract, and scheduling pickup and delivery is quick, easy, and painless. We'll pair you with a
                    dedicated shipping agent who'll advocate for you and coordinate your shipment every step of the way.
                    Your shipping agent will be there for you from the start to finish of the shipment procedure. Our number
                    one priority is your automobile's secure, timely, and economical delivery.</p>
                <h3 class="px-md-5 px-2">Best way to pack fragile items</h3>
                <p class="fs-5 text-black px-md-5 px-2">Assembling the required materials is the first step in delicate
                    packaging items. Every fragile object requires a unique set of packaging supplies. You need to do more
                    than throw in a box of exquisite china and crystal glasses with your technological equipment. If you are
                    planning a relocation, we understand the stress this might cause. It may be exhausting and stressful to
                    pack and move your belongings and keep track of your schedule. The success of the relocation depends on
                    paying close attention to every last detail. When shipping fragile items like dishes and glasses with
                    fixed dimensions, use pre-divided boxes. Damage to fragile items is reduced as they are confined to
                    smaller spaces.</p>
                <p class="fs-5 text-black px-md-5 px-2">If the box and packing materials, such as Styrofoam sleeves for
                    electronics, are still available, you should plan to repack and transport the products using them.
                    Because of how well they fit the object in question, these materials provide the best possible level of
                    security.</p>
                <p class="fs-5 text-black px-md-5 px-2">If you take time packing, you won't have to worry about your
                    fragile, expensive belongings getting damaged in the shuffle. If you need guidance on how to pack your
                    fragile belongings, keep reading for suggestions from our experts.</p>
                <h3 class="px-md-5 px-2">Tips for packing plates in the best way</h3>
                <p class="fs-5 text-black px-md-5 px-2">When it comes time to move, the kitchen is one of the most difficult
                    rooms to pack up. Because of this, kitchens are more heavily utilised than guest rooms and, therefore,
                    should not house fragile items. And a lot of packing paper, of course. Exactly how should you approach
                    this rolling behemoth? I'll show you the best way to pack the bulkiest items in the room.</p>
                <p class="fs-5 text-black px-md-5 px-2">You must understand how to pack delicate tableware if you're
                    relocating to a new home and want to ensure it arrives undamaged. As a result, items, especially plates,
                    must be carefully packed when packing the kitchen. Read this easy-to-follow tutorial to learn how to
                    pack your plates and silverware to make it to your new home without a scratch.</p>
                <ul class="px-md-5 px-2">
                    <li class="list-unstyled d-flex align-items-start"><i class="fa fa-check me-2 pt-2 fw-normal"></i>
                        <p class="fs-5 text-black">Several robust, medium-sized boxes, either brand-new or ancient.</p>
                    </li>
                    <li class="list-unstyled d-flex align-items-start"><i class="fa fa-check me-2 pt-2 fw-normal"></i>
                        <p class="fs-5 text-black">For example, by using newspaper or packing paper (you must thoroughly
                            wash the dishes after unpacking to get rid of any ink that transferred to them if you use
                            newsprint or newspapers for packing)</p>
                    </li>
                    <li class="list-unstyled d-flex align-items-start"><i class="fa fa-check me-2 pt-2 fw-normal"></i>
                        <p class="fs-5 text-black">Labelling marker for use with packing tape</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
