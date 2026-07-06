@extends('layouts.app')

@section('title')
Popular Moving Routes from {{$cityPage->name}}, {{$cityPage->state->abv}}
@endsection
 
@section('meta_description')
Moving from {{$cityPage->name}}, {{$cityPage->state->name}}? Find local and long-distance routes, destinations, movers, and costs starting here!
@endsection
@section('meta_keywords')
{{$cityPage->name}}, {{$cityPage->state->abv}} Moving Routes
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
        ul > .routes_grid_item {
            width: 100%;
        }
    }

    @media screen and (max-width:576px) {
        li a {
            font-size: 16px;
        }
    }
</style>

<div class="container my-4" style="max-width:992px !important">
    <h1 class="mb-5 text_col">Popular Moving Routes from {{$cityPage->name}}, {{$cityPage->state->abv}}</h1>
    
    <div class="author-box mb-5">
        <div class="author-info">
            <img src="https://mymovingjourney.com/assets/img/author_img.png" alt="Author">
            <div>
                <span class="author-label">Author</span>
                <h6 class="author_name">
                    <a href="https://www.linkedin.com/in/honey-jay/" target="_blank">Honey Jay
                        <i class="fa-brands fa-linkedin" style="color: var(--bg);"></i>
                    </a>
                </h6>
            </div>
        </div>
        <div class="text-end">
            <span class="author-label">Updated:</span><br>
            <strong>{{date('M')}} {{date('Y')}}</strong>
        </div>
    </div>

    @if ($city_to_same_state_city_routes->isNotEmpty())
        <div class="popular_route_box mb-4"> 
            <h5>Moving within {{$cityPage->state->name}}</h5>
            <ul class="my-3 ps-0">
                @foreach ($city_to_same_state_city_routes as $route)
                    <li class="mb-2 routes_grid_item">
                        <a href="{{ route('route.city-to-city.show', [
                            'stateAbv' => strtolower($cityPage->state->abv),
                            'cityFromSlug' => $cityPage->slug,
                            'cityToSlug' => $route->cityTo->slug
                        ]) }}"> 
                            {{ $cityPage->name }} to {{ $route->cityTo->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($grouped_long_distance_routes->isNotEmpty())
        <div class="popular_route_box mb-5">
            <h5>Long Distance Move from {{$cityPage->state->name}}</h5>
            @foreach ($grouped_long_distance_routes as $routes)
                <ul class="my-3 ps-0">
                    @foreach ($routes as $route)
                        @if ($route instanceof \App\Models\CityToStateRoute)
                            <li class="no-bullet my-2">
                                <a href="{{ route('route.dynamic', [
                                    'fromStateAbv' => strtolower($cityPage->state->abv),
                                    'fromSlug' => $cityPage->slug,
                                    'toStateAbv' => strtolower($route->stateTo->abv),
                                    'toSlug' => $route->stateTo->slug,
                                ]) }}" class="fw-bold">
                                    {{ $cityPage->name }} to {{ $route->stateTo->name }}
                                </a>
                            </li>
                        @else
                            <li class="routes_grid_item mb-2">
                                <a href="{{ route('route.dynamic', [
                                    'fromStateAbv' => strtolower($cityPage->state->abv),
                                    'fromSlug' => $cityPage->slug,
                                    'toStateAbv' => strtolower($route->cityTo->state->abv),
                                    'toSlug' => $route->cityTo->slug,
                                ]) }}">
                                    {{ $cityPage->name }} to {{ $route->cityTo->name }}, {{ $route->cityTo->state->abv }}
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
            "name": "Popular Moving Routes from {{$cityPage->name}}, {{$cityPage->state->abv}}",
            "url": "{{url()->current()}}",
            "description": "Moving from {{$cityPage->name}}, {{$cityPage->state->name}}? Find local and long-distance routes, destinations, movers, and costs starting here!"
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
        }, {
        "@type": "ListItem",
        "position": 2,
        "name": "Moving Routes",
        "item": "{{url()->current()}}"
        }]
    }
</script>
 <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "url": "{{url()->current()}}",
  "name": "Popular Moving Routes from {{$cityPage->name}}, {{$cityPage->state->abv}}",
  "description": "Moving from {{$cityPage->name}}, {{$cityPage->state->name}}? Find local and long-distance routes, destinations, movers, and costs starting here!",
  
  "areaServed": {
    "@type": "City",
    "name": "{{$cityPage->name}}"
  },

  "provider": {
    "@type": "Organization",
    "name": "My Moving Journey  ",
    "url": "https://mymovingjourney.com/",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "{{$cityPage->name}}",
      "addressRegion": "{{$cityPage->state->abv}}",
      "addressCountry": "US"
    }
  }
}
</script>
@endsection