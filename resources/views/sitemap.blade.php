@extends('layouts.app')
@section('title')
    Sitemap - Navigate My Moving Journey with Ease
@endsection
@section('meta_description')
    Explore the full sitemap of My Moving Journey to easily navigate our helpful resources, guides, and tips for a smooth
    moving experience.
@endsection
@section('meta_keywords', 'Sitemap')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/sitemap_page.css') }}">


    <section class="site_map py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto col-12 text-center mb-3">
                    <h1>My Moving Journey Sitemap</h1>
                </div>
                <div class="col-lg-8 mx-auto col-12">
                    <h2>Main Website Pages </h2>
                    <ul>
                        <li><a href="https://mymovingjourney.com/">Home</a></li>
                        <li><a href="https://mymovingjourney.com/movers">Movers in USA</a></li>
                        <li><a href="https://mymovingjourney.com/move-cost">Move Cost</a></li>
                        <li><a href="https://mymovingjourney.com/blogs">Blogs</a></li>
                        <li><a href="https://mymovingjourney.com/moving-cost-calculator">Cost Estimator</a></li>
                        <li><a href="https://mymovingjourney.com/movers-list">Movers List</a></li>
                        <li><a href="https://mymovingjourney.com/moving-routes">Moving Routes</a></li>
                        <li><a href="https://mymovingjourney.com/packing-calculator">Packing Calculator</a></li>
                        <li><a href="https://mymovingjourney.com/compare-movers">Compare Movers</a></li>
                        <li><a href="https://mymovingjourney.com/contact-us">Contact</a></li>
                        <li><a href="https://mymovingjourney.com/about">About</a></li>
                    </ul>
                </div>

                {{-- <div class="col-lg-8 mx-auto col-12">
                    {!! file_get_contents(public_path('resources.sitemap.html')) !!}
                </div> --}}
                <div class="col-lg-8 mx-auto col-12">
                    @php
                        function includeWithoutTitle($relativePath)
                        {
                            $html = file_get_contents(public_path($relativePath));
                            // Remove any <title> ... </title> (case-insensitive, across lines)
                            return preg_replace('/<title\b[^>]*>.*?<\/title>/is', '', $html);
                        }
                    @endphp
                    {!! includeWithoutTitle('resources.sitemap.html') !!}
                    {!! includeWithoutTitle('company.sitemap.html') !!}
                    {!! includeWithoutTitle('blog.sitemap.html') !!}
                    {!! includeWithoutTitle('state.sitemap.html') !!}
                    {{-- {!! file_get_contents(public_path('cities.sitemap.html')) !!} --}}
                    {{-- {!! file_get_contents(public_path('routes.sitemap.html')) !!} --}}
                </div>
            </div>
        </div>


    </section>
@endsection
