@extends('layouts.app')

@section('title')
Popular Moving Routes from {{ $state->name }}
@endsection

@section('meta_keywords')
{{ $state->name }} Moving Routes 
@endsection
@section('meta_description')
Moving from {{$state->name}}? Choose your destination and find movers, costs and more!
@endsection

@section('head')
@endsection

@section('content')

<style>
    main.pb-0 {
        margin-top: 145px;
    }
 
    .author-box {
        background: #EBFAFF;
        border-radius: 10px;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        color: #1a1a1a;
        flex-wrap: wrap;
    }

    .author-info img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .author-label {
        font-size: 14px;
        color: #1a1a1a;
        font-weight: 600;
    }

    .author-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .author_name a {
        text-decoration: none;
        font-size: 17px;
        color: var(--bg);
    }

    .popular_route_box {
        background: #fff;
        border-radius: 20px !important;
        padding: 16px 8px 16px 24px;
        border: 1px solid #00000033;
    }

    .popular_city_grid {
        list-style: none;
        padding-left: 0;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px 15px;
    }

    li a {
        color: var(--bg);
        font-size: 17px;
        font-weight: 600;
        margin-right: 5px;
    }

    ul > .routes_grid_item {
        list-style-type: disc;
        display: inline-block;
        width: calc(33%);
        vertical-align: top;
    }

    ul > .routes_grid_item a {
        font-weight: normal;
    }

    ul > .routes_grid_item::before {
        content: "●";
        margin-right: 5px;
        color: var(--bg);
    }

    .no-bullet {
        list-style-type: none !important;
    }

    @media screen and (max-width:992px) {
        ul > .routes_grid_item {
            width: 49%;
        }
    }

    @media screen and (max-width:768px) {
        .popular_city_grid {
            grid-template-columns: repeat(2, 1fr);
        }
        ul > .routes_grid_item {
            width: 100%;
        }
    }

    @media screen and (max-width:576px) {
        .popular_city_grid {
            grid-template-columns: repeat(1, 1fr);
        }
        li a {
            font-size: 16px;
        }
    }

</style>
<div class="container my-4" style="max-width:992px !important">
    <h1 class="mb-5 text_col">Popular Moving Routes from {{$state->name}}</h1>
    <div class="author-box mb-5">
        <div class="author-info">
            <img src="https://mymovingjourney.com/assets/img/author_img.png" alt="Author">
            <div>
                <span class="author-label">Author</span>
                <h6 class="author_name"><a href="https://www.linkedin.com/in/honey-jay/" target="_blank">Honey Jay <i
                            class="fa-brands fa-linkedin" style="color: var(--bg);"></i></a></h6>
            </div>
        </div>
        <div class="text-end">
            <span class="author-label">Updated:</span><br>
            <strong>{{date('M')}} {{date('Y')}}</strong>
        </div>
    </div>

    {{-- <div class="popular_route_box my-5">
        <h2>Popular Alabama Cities</h2>
        <div class="popular_route_links mt-3">

            <a href="" class="columns__third">Birmingham</a>

            <a href="" class="columns__third">Huntsville</a>

            <a href="" class="columns__third">Mobile</a>

            <a href="" class="columns__third">Montgomery</a>

        </div>
    </div> --}}

    @if($cities_with_routes->isNotEmpty())
        <div class="popular_route_box mb-4">
            <h5>Popular Cities in {{ $state->name }}</h5>

            <ul class="popular_city_grid my-3">
                @foreach ($cities_with_routes as $city)
                    <li>
                        <a href="{{ route('cityRouteList.page', [
                            'fromStateAbv' => strtolower($city->state->abv),
                            'fromCitySlug' => $city->slug,
                        ]) }}">
                            {{ $city->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif


    @if ($groupedRoutes->isNotEmpty())
        <div class="popular_route_box mb-5">
            <h5>Long Distance Move from {{ $state->name }}</h5>
            @foreach ($groupedRoutes as $destinationState => $routes)
                <ul class="my-3 ps-0">
                    @foreach ($routes as $route)
                        @if ($route instanceof \App\Models\StateToStateRoute)
                            <li class="no-bullet my-2">
                                <a href="{{ route('route.state-to-state.show', [
                                        'fromStateAbv' => strtolower($state->abv),
                                        'toStateAbv' => strtolower($route->stateTo->abv),
                                ]) }}">
                                    {{ $state->name }} to {{ $route->stateTo->name }}
                                </a>
                            </li>
                        @else
                            <li class="routes_grid_item mb-2">
                                <a href="{{ route('route.dynamic', [
                                    'fromStateAbv' => strtolower($state->abv),
                                    'fromSlug' => $state->slug,
                                    'toStateAbv' => strtolower($route->cityTo->state->abv),
                                    'toSlug' => $route->cityTo->slug,
                                ]) }}">
                                    {{ $state->name }} to {{ $route->cityTo->name }}, {{ $route->cityTo->state->abv }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endforeach
        </div>
    @endif
</div>
   <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "name": "Popular Moving Routes from {{ $state->name }}",
            "url": "{{url()->current()}}",
            "description": "Moving from {{$state->name}}? Choose your destination and find movers, costs and more!"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "name": "My Moving Journey",
            "url": "https://mymovingjourney.com/"
        }
    </script>
       <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "My Moving Journey",
        "item": "https://mymovingjourney.com/"
        }, 
        {
        "@type": "ListItem",
        "position": 2,
        "name": "Moving Routes",
        "item": "https://mymovingjourney.com/moving-routes"
        }, {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $state->name }}",
        "item": "{{url()->current()}}"
        }]
    }
</script>
 <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "url": "{{url()->current()}}",
  "name": "Popular Moving Routes from {{ $state->name }}",
  "description": "Moving from {{$state->name}}? Choose your destination and find movers, costs and more!",
  
  "areaServed": {
    "@type": "City",
    "name": "{{$state->name}}"
  },

  "provider": {
    "@type": "Organization",
    "name": "My Moving Journey  ",
    "url": "https://mymovingjourney.com/",
    "address": {
      "@type": "PostalAddress",
      "addressRegion": "{{$state->name}}",
      "addressCountry": "US"
    }
  }
}
</script>
@endsection
