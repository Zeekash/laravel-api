<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CityCostOfLiving;
use App\Models\CityLifeStyle;
use App\Models\CityPage;
use App\Models\CityToCityMoveSizeCost;
use App\Models\CityToCityRoute;
use App\Models\CityToStateMoveSizeCost;
use App\Models\CityToStateRoute;
use App\Models\Company;
use App\Models\MovingRoute;
use App\Models\ResourceBottomMover;
use App\Models\State;
use App\Models\StateCostOfLiving;
use App\Models\StateCostPage;
use App\Models\StateLifeStyle;
use App\Models\StateProCon;
use App\Models\StateToCityMoveSizeCost;
use App\Models\StateToCityRoute;
use App\Models\StateToStateMoveSizeCost;
use App\Models\StateToStateRoute;
use Illuminate\Http\Request;
use App\Services\MovingMilesCostCalculator;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function routePage()
    {
        // States that have state-to-state routes
        $statesWithStateToState = State::whereHas('stateToStateRoutes')->pluck('id')->toArray();

        // States that have state-to-city routes
        $statesWithStateToCity = State::whereHas('stateToCityRoutes')->pluck('id')->toArray();

        // States with cities that have city-to-city OR city-to-state routes
        $statesWithCitiesHavingRoutes = CityPage::where(function ($q) {
            $q->whereHas('cityToCityRoutes')
                ->orWhereHas('cityToStateRoutes');
        })
            ->pluck('state_id')
            ->unique()
            ->toArray();

        // Merge all IDs into one unique list
        $allStateIds = array_unique(array_merge(
            $statesWithStateToState,
            $statesWithStateToCity,
            $statesWithCitiesHavingRoutes
        ));

        // Fetch only these states
        $states = State::whereIn('id', $allStateIds)
            ->orderBy('name', 'asc')
            ->get();

        return view('frontend.company_auth.route_pages.route_page', compact('states'));
    }

    public function MovingRouteShow(MovingRoute $movingRoute)
    {
        // $companies = Company::where('is_email_verified',1)->with(['users' => function($q){
        //     $q->where('user_email_verified',1);
        // }])->inRandomOrder()->paginate(10);

        return redirect()->route('route.page', [], 301);

        // return view('frontend.company_auth.route_pages.moving-route-show',compact('movingRoute','companies'));
    }

    public function stateRouteListPage(string $abv)
    {
        // Force lowercase abv
        if ($abv !== strtolower($abv)) {
            return redirect()->route('stateRouteList.page', [
                'abv' => strtolower($abv),
            ], 301);
        }

        $state = State::where('abv', strtoupper($abv))->firstOrFail();

        // Fetch routes
        $state_to_state_routes = StateToStateRoute::where('state_from_id', $state->id)->with('stateTo')->get();
        $state_to_city_routes = StateToCityRoute::where('state_from_id', $state->id)->with('cityTo.state')->get();

        // Get only cities that have routes
        $cities_with_routes = CityPage::where('state_id', $state->id)
            ->where(function ($query) {
                $query->whereHas('cityToCityRoutes')->orWhereHas('cityToStateRoutes');
            })->with('state')->orderBy('name')->get();

        if ($state_to_state_routes->isEmpty() && $state_to_city_routes->isEmpty() && $cities_with_routes->isEmpty()) {
            abort(404);
        }

        // GROUP STATE TO CITY ROUTES BY DESTINATION STATE
        $groupedByState = $state_to_city_routes->groupBy(function ($route) {
            return $route->cityTo->state->name;
        });

        // ADD STATE TO STATE ROUTES INTO SAME GROUP
        foreach ($state_to_state_routes as $route) {
            $destStateName = $route->stateTo->name;
            if (!isset($groupedByState[$destStateName])) {
                $groupedByState[$destStateName] = collect();
            }
            $groupedByState[$destStateName]->push($route);
        }

        // SORT ROUTES *WITHIN* EACH STATE GROUP
        $groupedByState = $groupedByState->map(function ($routes) {
            return $routes->sortBy(function ($route) {
                if ($route instanceof \App\Models\StateToStateRoute) {
                    return '0' . $route->stateTo->name;
                } else {
                    return '1' . $route->cityTo->name;
                }
            })->values();
        });

        // SORT ALL DESTINATION STATE GROUPS ALPHABETICALLY
        $groupedRoutes = $groupedByState->sortKeys();

        return view('frontend.company_auth.route_pages.stateRouteListPage', [
            'state' => $state,
            'groupedRoutes' => $groupedRoutes,
            'cities_with_routes' => $cities_with_routes,
        ]);
    }

    // City Route List Page
    public function cityRouteListPage(string $fromStateAbv, string $fromCitySlug)
    {
        $lowerStateAbv = strtolower($fromStateAbv);
        if ($fromStateAbv !== $lowerStateAbv) {
            return redirect()->route('cityRouteList.page', [
                'fromStateAbv' => $lowerStateAbv,
                'fromCitySlug' => $fromCitySlug,
            ], 301);
        }

        if (!$this->isCitySlug($fromCitySlug, $fromStateAbv)) {
            abort(404);
        }

        $cityPage = CityPage::where('slug', $fromCitySlug)->whereHas('state', fn($q) => $q->where('abv', strtoupper($fromStateAbv)))
            ->with('state')->firstOrFail();

        $city_to_city_routes = CityToCityRoute::where('city_from_id', $cityPage->id)->with('cityTo.state')->get();

        $city_to_state_routes = CityToStateRoute::where('city_from_id', $cityPage->id)->with('stateTo')->get();

        if ($city_to_city_routes->isEmpty() && $city_to_state_routes->isEmpty()) {
            abort(404);
        }

        // SAME-STATE CITY ROUTES
        $city_to_same_state_city_routes = $city_to_city_routes
            ->filter(fn($route) => $route->cityTo->state->id === $cityPage->state->id)
            ->sortBy(fn($route) => $route->cityTo->name)
            ->values();

        // DIFFERENT-STATE CITY ROUTES
        $city_to_diff_state_city_routes = $city_to_city_routes
            ->filter(fn($route) => $route->cityTo->state->id !== $cityPage->state->id);

        // GROUP BY DESTINATION STATE
        $grouped = $city_to_diff_state_city_routes->groupBy(function ($route) {
            return $route->cityTo->state->name;
        });

        // ADD CITY TO STATE ROUTES INTO THE SAME GROUPS
        foreach ($city_to_state_routes as $route) {
            $destState = $route->stateTo->name;

            if (!isset($grouped[$destState])) {
                $grouped[$destState] = collect();
            }

            $grouped[$destState]->push($route);
        }

        // SORT ROUTES WITHIN EACH GROUP
        $grouped = $grouped->map(function ($routes) {
            return $routes->sortBy(function ($route) {
                if ($route instanceof \App\Models\CityToStateRoute) {
                    return '0' . $route->stateTo->name;
                } else {
                    return '1' . $route->cityTo->name;
                }
            })->values();
        });

        // SORT GROUPS ALPHABETICALLY BY STATE NAME
        $grouped_long_distance_routes = $grouped->sortKeys();

        return view('frontend.company_auth.route_pages.cityRouteListPage', compact(
            'cityPage',
            'city_to_same_state_city_routes',
            'grouped_long_distance_routes'
        ));
    }

    public function stateToStateRoutePage(string $fromStateAbv, string $toStateAbv)
    {
        if ($fromStateAbv !== strtolower($fromStateAbv) || $toStateAbv !== strtolower($toStateAbv)) {
            return redirect()->route('route.state-to-state.show', [
                strtolower($fromStateAbv),
                strtolower($toStateAbv)
            ], 301);
        }

        // State to State
        $stateToStateRoute = StateToStateRoute::query()
            ->whereHas('stateFrom', fn($q) => $q->where('abv', strtoupper($fromStateAbv)))
            ->whereHas('stateTo', fn($q) => $q->where('abv', strtoupper($toStateAbv)))
            ->firstOrFail();

        $movers =  Company::query()
            ->where('state_id', $stateToStateRoute->stateFrom->id)
            ->whereHas('users', function ($q) {
                $q->where('user_email_verified', 1)
                    ->whereNotNull('overall_rating');
            })
            ->withCount([
                'users as reviews_count' => function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                },
            ])
            ->withAvg([
                'users as avg_rating' => function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                },
            ], 'overall_rating')
            ->having('reviews_count', '>', 80)
            ->having('avg_rating', '>=', 4)
            ->orderByDesc('avg_rating')
            ->orderByDesc('reviews_count')
            ->take(3)
            ->get();

        if ($movers->isEmpty()) {
            $movers = Company::query()
                ->where('state_id', $stateToStateRoute->stateFrom->id)
                ->whereHas('users', function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                })
                ->withCount([
                    'users as reviews_count' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ])
                ->withAvg([
                    'users as avg_rating' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ], 'overall_rating')
                ->orderByDesc('avg_rating')
                ->orderByDesc('reviews_count')
                ->take(10)
                ->get();
        }

        $local_movers = Company::query()
            ->where('state_id', $stateToStateRoute->stateFrom->id)
            ->whereHas('users', function ($q) {
                $q->where('user_email_verified', 1)
                    ->whereNotNull('overall_rating');
            })
            ->withCount([
                'users as reviews_count' => function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                },
            ])
            ->withAvg([
                'users as avg_rating' => function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                },
            ], 'overall_rating')
            ->having('reviews_count', '>', 80)
            ->having('avg_rating', '>=', 4)
            ->orderByDesc('avg_rating')
            ->orderByDesc('reviews_count')
            ->take(5)
            ->get();

        // Fallback: if no companies meet the 80+ review and 4+ rating criteria
        if ($local_movers->isEmpty()) {
            $local_movers = Company::query()
                ->where('state_id', $stateToStateRoute->stateFrom->id)
                ->whereHas('users', function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                })
                ->withCount([
                    'users as reviews_count' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ])
                ->withAvg([
                    'users as avg_rating' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ], 'overall_rating')
                ->orderByDesc('avg_rating')
                ->orderByDesc('reviews_count')
                ->take(5)
                ->get();
        }

        $local_resource_bottom_movers = ResourceBottomMover::where('resource_page_id', 2)
            ->orderBy('position', 'asc')
            ->take(4)
            ->get();

        $long_distance_movers = ResourceBottomMover::where('resource_page_id', 1)
            ->orderBy('position', 'asc')
            ->take(4)
            ->get();

        $container_movers = ResourceBottomMover::where('resource_page_id', 14)
            ->orderBy('position', 'asc')
            ->take(4)
            ->get();

        $truck_rental_movers = ResourceBottomMover::where('resource_page_id', 15)
            ->orderBy('position', 'asc')
            ->take(4)
            ->get();

        $state_cost_of_living = StateCostOfLiving::where('state_id', $stateToStateRoute->stateFrom->id)->first();
        $to_state_cost_of_living = StateCostOfLiving::where('state_id', $stateToStateRoute->stateTo->id)->first();
        $state_life_style = StateLifeStyle::where('state_id', $stateToStateRoute->stateFrom->id)->first();
        $to_state_life_style = StateLifeStyle::where('state_id', $stateToStateRoute->stateTo->id)->first();
        $state_pro_cons = StateProCon::orderBy('id', 'asc')->where('state_id', $stateToStateRoute->stateFrom->id)->get();
        $to_state_pro_cons = StateProCon::orderBy('id', 'asc')->where('state_id', $stateToStateRoute->stateTo->id)->get();

        $move_size_cost = StateToStateMoveSizeCost::where('state_to_state_route_id', $stateToStateRoute->id)->first();

        return view('frontend.company_auth.route_pages.StateToStateRoutePage', compact(
            'stateToStateRoute',
            'movers',
            'local_movers',
            'local_resource_bottom_movers',
            'long_distance_movers',
            'container_movers',
            'truck_rental_movers',
            'move_size_cost',
            'state_cost_of_living',
            'to_state_cost_of_living',
            'state_life_style',
            'to_state_life_style',
            'state_pro_cons',
            'to_state_pro_cons',
        ));
    }

    public function handleMovingRoute(string $fromStateAbv, string $toStateAbv, string $fromSlug, string $toSlug)
    {
        // Redirect to lowercase state abbreviations
        if ($fromStateAbv !== strtolower($fromStateAbv) || $toStateAbv !== strtolower($toStateAbv)) {
            return redirect()->route('route.dynamic', [
                'fromStateAbv' => strtolower($fromStateAbv),
                'toStateAbv' => strtolower($toStateAbv),
                'fromSlug' => $fromSlug,
                'toSlug' => $toSlug
            ], 301);
        }

        // City-to-City (Different State)
        if ($this->isCitySlug($fromSlug, $fromStateAbv) && $this->isCitySlug($toSlug, $toStateAbv)) {
            // $movingRoute = CityToCityDifferentStateRoute::query()
            $cityToCityRoute = CityToCityRoute::query()
                ->whereHas('cityFrom', fn($q) => $q->where('slug', $fromSlug)
                    ->whereHas('state', fn($q2) => $q2->where('abv', strtoupper($fromStateAbv))))
                ->whereHas('cityTo', fn($q) => $q->where('slug', $toSlug)
                    ->whereHas('state', fn($q2) => $q2->where('abv', strtoupper($toStateAbv))))
                ->first();


            $movers =  Company::query()
                ->where('state_id', $cityToCityRoute->cityFrom->state->id)
                ->whereHas('users', function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                })
                ->withCount([
                    'users as reviews_count' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ])
                ->withAvg([
                    'users as avg_rating' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ], 'overall_rating')
                ->having('reviews_count', '>', 80)
                ->having('avg_rating', '>=', 4)
                ->orderByDesc('avg_rating')
                ->orderByDesc('reviews_count')
                ->take(3)
                ->get();

            if ($movers->isEmpty()) {
                $movers = Company::query()
                    ->where('state_id', $cityToCityRoute->cityFrom->state->id)
                    ->whereHas('users', function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    })
                    ->withCount([
                        'users as reviews_count' => function ($q) {
                            $q->where('user_email_verified', 1)
                                ->whereNotNull('overall_rating');
                        },
                    ])
                    ->withAvg([
                        'users as avg_rating' => function ($q) {
                            $q->where('user_email_verified', 1)
                                ->whereNotNull('overall_rating');
                        },
                    ], 'overall_rating')
                    ->orderByDesc('avg_rating')
                    ->orderByDesc('reviews_count')
                    ->take(10)
                    ->get();
            }

            $local_movers = Company::query()
                ->where('state_id', $cityToCityRoute->cityFrom->state->id)
                ->whereHas('users', function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                })
                ->withCount([
                    'users as reviews_count' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ])
                ->withAvg([
                    'users as avg_rating' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ], 'overall_rating')
                ->having('reviews_count', '>', 80)
                ->having('avg_rating', '>=', 4)
                ->orderByDesc('avg_rating')
                ->orderByDesc('reviews_count')
                ->take(5)
                ->get();

            // Fallback: if no companies meet the 80+ review and 4+ rating criteria
            if ($local_movers->isEmpty()) {
                $local_movers = Company::query()
                    ->where('state_id', $cityToCityRoute->cityFrom->state->id)
                    ->whereHas('users', function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    })
                    ->withCount([
                        'users as reviews_count' => function ($q) {
                            $q->where('user_email_verified', 1)
                                ->whereNotNull('overall_rating');
                        },
                    ])
                    ->withAvg([
                        'users as avg_rating' => function ($q) {
                            $q->where('user_email_verified', 1)
                                ->whereNotNull('overall_rating');
                        },
                    ], 'overall_rating')
                    ->orderByDesc('avg_rating')
                    ->orderByDesc('reviews_count')
                    ->take(5)
                    ->get();
            }

            $local_resource_bottom_movers = ResourceBottomMover::where('resource_page_id', 2)
                ->orderBy('position', 'asc')
                ->take(4)
                ->get();

            $long_distance_movers = ResourceBottomMover::where('resource_page_id', 1)
                ->orderBy('position', 'asc')
                ->take(4)
                ->get();

            $container_movers = ResourceBottomMover::where('resource_page_id', 14)
                ->orderBy('position', 'asc')
                ->take(4)
                ->get();

            $truck_rental_movers = ResourceBottomMover::where('resource_page_id', 15)
                ->orderBy('position', 'asc')
                ->take(4)
                ->get();

            $city_cost_of_living = CityCostOfLiving::where('city_page_id', $cityToCityRoute->cityFrom->id)->first();
            $to_city_cost_of_living = CityCostOfLiving::where('city_page_id', $cityToCityRoute->cityTo->id)->first();
            $city_life_style = CityLifeStyle::where('city_page_id', $cityToCityRoute->cityFrom->id)->first();
            $to_city_life_style = CityLifeStyle::where('city_page_id', $cityToCityRoute->cityTo->id)->first();
            $move_size_cost = CityToCityMoveSizeCost::where('city_to_city_route_id', $cityToCityRoute->id)->first();


            $calculator = new MovingMilesCostCalculator();

            // Pass the database object instead of origin/destination strings
            $milesData = $calculator->calculateDistance($cityToCityRoute);

            $miles = $milesData['miles'];
            $duration = $calculator->calculateTravelTime($milesData['duration']);

            // The rest of your logic remains identical
            $calculatedCosts = $calculator->calculate((float) $miles);

            if ($cityToCityRoute) {
                if ($fromStateAbv !== $toStateAbv) {
                    return view('frontend.company_auth.route_pages.CityToCityDiffStateRoutePage', compact(
                        'cityToCityRoute',
                        'movers',
                        'local_movers',
                        'local_resource_bottom_movers',
                        'long_distance_movers',
                        'container_movers',
                        'truck_rental_movers',
                        'move_size_cost',
                        'city_cost_of_living',
                        'to_city_cost_of_living',
                        'city_life_style',
                        'to_city_life_style',
                        'calculatedCosts',
                        'duration'
                    ));
                } else {
                    return redirect()->route('route.city-to-city.show', [$fromStateAbv, $fromSlug, $toSlug], 301);
                }
            }
        }

        // City-to-State
        if ($this->isCitySlug($fromSlug, $fromStateAbv) && $this->isStateSlug($toSlug, $toStateAbv)) {
            $cityToStateRoute = CityToStateRoute::query()
                ->whereHas('cityFrom', fn($q) => $q->where('slug', $fromSlug)
                    ->whereHas('state', fn($q2) => $q2->where('abv', strtoupper($fromStateAbv))))
                ->whereHas('stateTo', fn($q) => $q->where('abv', strtoupper($toStateAbv))->where('slug', $toSlug))
                ->first();

            $movers =  Company::query()
                ->where('state_id', $cityToStateRoute->cityFrom->state->id)
                ->whereHas('users', function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                })
                ->withCount([
                    'users as reviews_count' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ])
                ->withAvg([
                    'users as avg_rating' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ], 'overall_rating')
                ->having('reviews_count', '>', 80)
                ->having('avg_rating', '>=', 4)
                ->orderByDesc('avg_rating')
                ->orderByDesc('reviews_count')
                ->take(3)
                ->get();

            if ($movers->isEmpty()) {
                $movers = Company::query()
                    ->where('state_id', $cityToStateRoute->cityFrom->state->id)
                    ->whereHas('users', function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    })
                    ->withCount([
                        'users as reviews_count' => function ($q) {
                            $q->where('user_email_verified', 1)
                                ->whereNotNull('overall_rating');
                        },
                    ])
                    ->withAvg([
                        'users as avg_rating' => function ($q) {
                            $q->where('user_email_verified', 1)
                                ->whereNotNull('overall_rating');
                        },
                    ], 'overall_rating')
                    ->orderByDesc('avg_rating')
                    ->orderByDesc('reviews_count')
                    ->take(10)
                    ->get();
            }

            $local_movers = Company::query()
                ->where('state_id', $cityToStateRoute->cityFrom->state->id)
                ->whereHas('users', function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                })
                ->withCount([
                    'users as reviews_count' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ])
                ->withAvg([
                    'users as avg_rating' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ], 'overall_rating')
                ->having('reviews_count', '>', 80)
                ->having('avg_rating', '>=', 4)
                ->orderByDesc('avg_rating')
                ->orderByDesc('reviews_count')
                ->take(5)
                ->get();

            // Fallback: if no companies meet the 80+ review and 4+ rating criteria
            if ($local_movers->isEmpty()) {
                $local_movers = Company::query()
                    ->where('state_id', $cityToStateRoute->cityFrom->state->id)
                    ->whereHas('users', function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    })
                    ->withCount([
                        'users as reviews_count' => function ($q) {
                            $q->where('user_email_verified', 1)
                                ->whereNotNull('overall_rating');
                        },
                    ])
                    ->withAvg([
                        'users as avg_rating' => function ($q) {
                            $q->where('user_email_verified', 1)
                                ->whereNotNull('overall_rating');
                        },
                    ], 'overall_rating')
                    ->orderByDesc('avg_rating')
                    ->orderByDesc('reviews_count')
                    ->take(5)
                    ->get();
            }

            $local_resource_bottom_movers = ResourceBottomMover::where('resource_page_id', 2)
                ->orderBy('position', 'asc')
                ->take(4)
                ->get();

            $long_distance_movers = ResourceBottomMover::where('resource_page_id', 1)
                ->orderBy('position', 'asc')
                ->take(4)
                ->get();

            $container_movers = ResourceBottomMover::where('resource_page_id', 14)
                ->orderBy('position', 'asc')
                ->take(4)
                ->get();

            $truck_rental_movers = ResourceBottomMover::where('resource_page_id', 15)
                ->orderBy('position', 'asc')
                ->take(4)
                ->get();

            $city_cost_of_living = CityCostOfLiving::where('city_page_id', $cityToStateRoute->cityFrom->id)->first();
            $to_state_cost_of_living = StateCostOfLiving::where('state_id', $cityToStateRoute->stateTo->id)->first();
            $city_life_style = CityLifeStyle::where('city_page_id', $cityToStateRoute->cityFrom->id)->first();
            $to_state_life_style = StateLifeStyle::where('state_id', $cityToStateRoute->stateTo->id)->first();
            $move_size_cost = CityToStateMoveSizeCost::where('city_to_state_route_id', $cityToStateRoute->id)->first();

            // Calculate costs and distance using service
            $calculator = new MovingMilesCostCalculator();

            // Pass the database object instead of origin/destination strings
            $milesData = $calculator->calculateDistance($cityToStateRoute);

            $miles = $milesData['miles'];
            $duration = $calculator->calculateTravelTime($milesData['duration']);

            // The rest of your logic remains identical
            $calculatedCosts = $calculator->calculate((float) $miles);

            if ($cityToStateRoute) {
                return view('frontend.company_auth.route_pages.CityToStateRoutePage', compact(
                    'cityToStateRoute',
                    'movers',
                    'local_movers',
                    'local_resource_bottom_movers',
                    'long_distance_movers',
                    'container_movers',
                    'truck_rental_movers',
                    'move_size_cost',
                    'city_cost_of_living',
                    'to_state_cost_of_living',
                    'city_life_style',
                    'to_state_life_style',
                    'calculatedCosts',
                    'duration'
                ));
            }
        }

        // State-to-City
        if ($this->isStateSlug($fromSlug, $fromStateAbv) && $this->isCitySlug($toSlug, $toStateAbv)) {
            $stateToCityRoute = StateToCityRoute::query()
                ->whereHas('stateFrom', fn($q) => $q->where('abv', strtoupper($fromStateAbv))->where('slug', $fromSlug))
                ->whereHas('cityTo', fn($q) => $q->where('slug', $toSlug)
                    ->whereHas('state', fn($q2) => $q2->where('abv', strtoupper($toStateAbv))))
                ->firstOrFail();

            $movers =  Company::query()
                ->where('state_id', $stateToCityRoute->stateFrom->id)
                ->whereHas('users', function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                })
                ->withCount([
                    'users as reviews_count' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ])
                ->withAvg([
                    'users as avg_rating' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ], 'overall_rating')
                ->having('reviews_count', '>', 80)
                ->having('avg_rating', '>=', 4)
                ->orderByDesc('avg_rating')
                ->orderByDesc('reviews_count')
                ->take(3)
                ->get();

            if ($movers->isEmpty()) {
                $movers = Company::query()
                    ->where('state_id', $stateToCityRoute->stateFrom->id)
                    ->whereHas('users', function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    })
                    ->withCount([
                        'users as reviews_count' => function ($q) {
                            $q->where('user_email_verified', 1)
                                ->whereNotNull('overall_rating');
                        },
                    ])
                    ->withAvg([
                        'users as avg_rating' => function ($q) {
                            $q->where('user_email_verified', 1)
                                ->whereNotNull('overall_rating');
                        },
                    ], 'overall_rating')
                    ->orderByDesc('avg_rating')
                    ->orderByDesc('reviews_count')
                    ->take(10)
                    ->get();
            }

            $local_movers = Company::query()
                ->where('state_id', $stateToCityRoute->stateFrom->id)
                ->whereHas('users', function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                })
                ->withCount([
                    'users as reviews_count' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ])
                ->withAvg([
                    'users as avg_rating' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ], 'overall_rating')
                ->having('reviews_count', '>', 80)
                ->having('avg_rating', '>=', 4)
                ->orderByDesc('avg_rating')
                ->orderByDesc('reviews_count')
                ->take(5)
                ->get();

            // Fallback: if no companies meet the 80+ review and 4+ rating criteria
            if ($local_movers->isEmpty()) {
                $local_movers = Company::query()
                    ->where('state_id', $stateToCityRoute->stateFrom->id)
                    ->whereHas('users', function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    })
                    ->withCount([
                        'users as reviews_count' => function ($q) {
                            $q->where('user_email_verified', 1)
                                ->whereNotNull('overall_rating');
                        },
                    ])
                    ->withAvg([
                        'users as avg_rating' => function ($q) {
                            $q->where('user_email_verified', 1)
                                ->whereNotNull('overall_rating');
                        },
                    ], 'overall_rating')
                    ->orderByDesc('avg_rating')
                    ->orderByDesc('reviews_count')
                    ->take(5)
                    ->get();
            }

            $local_resource_bottom_movers = ResourceBottomMover::where('resource_page_id', 2)
                ->orderBy('position', 'asc')
                ->take(4)
                ->get();

            $long_distance_movers = ResourceBottomMover::where('resource_page_id', 1)
                ->orderBy('position', 'asc')
                ->take(4)
                ->get();

            $container_movers = ResourceBottomMover::where('resource_page_id', 14)
                ->orderBy('position', 'asc')
                ->take(4)
                ->get();

            $truck_rental_movers = ResourceBottomMover::where('resource_page_id', 15)
                ->orderBy('position', 'asc')
                ->take(4)
                ->get();

            $state_cost_of_living = StateCostOfLiving::where('state_id', $stateToCityRoute->stateFrom->id)->first();
            $to_city_cost_of_living = CityCostOfLiving::where('city_page_id', $stateToCityRoute->cityTo->id)->first();
            $state_life_style = StateLifeStyle::where('state_id', $stateToCityRoute->stateFrom->id)->first();
            $to_city_life_style = CityLifeStyle::where('city_page_id', $stateToCityRoute->cityTo->id)->first();
            $move_size_cost = StateToCityMoveSizeCost::where('state_to_city_route_id', $stateToCityRoute->id)->first();

            // Calculate costs and distance using service
            $calculator = new MovingMilesCostCalculator();

            // Pass the database object instead of origin/destination strings
            $milesData = $calculator->calculateDistance($stateToCityRoute);

            $miles = $milesData['miles'];
            $duration = $calculator->calculateTravelTime($milesData['duration']);

            // The rest of your logic remains identical
            $calculatedCosts = $calculator->calculate((float) $miles);

            if ($stateToCityRoute) {
                return view('frontend.company_auth.route_pages.StateToCityRoutePage', compact(
                    'stateToCityRoute',
                    'movers',
                    'local_movers',
                    'local_resource_bottom_movers',
                    'long_distance_movers',
                    'container_movers',
                    'truck_rental_movers',
                    'move_size_cost',
                    'state_cost_of_living',
                    'to_city_cost_of_living',
                    'state_life_style',
                    'to_city_life_style',
                    'calculatedCosts',
                    'duration'
                ));
            }
        }

        abort(404);
    }

    // City-to-City (Same State)
    public function handleCityToCityRoute(string $stateAbv, string $cityFromSlug, string $cityToSlug)
    {
        if ($stateAbv !== strtolower($stateAbv)) {
            return redirect()->route('route.city-to-city.show', [
                strtolower($stateAbv),
                strtolower($cityFromSlug),
                strtolower($cityToSlug),
            ], 301);
        }

        if (!$this->isCitySlug($cityFromSlug, $stateAbv) || !$this->isCitySlug($cityToSlug, $stateAbv)) {
            abort(404);
        }

        $cityToCityRoute = CityToCityRoute::query()
            ->whereHas('cityFrom', fn($q) => $q->where('slug', $cityFromSlug)
                ->whereHas('state', fn($q2) => $q2->where('abv', strtoupper($stateAbv))))
            ->whereHas('cityTo', fn($q) => $q->where('slug', $cityToSlug)
                ->whereHas('state', fn($q2) => $q2->where('abv', strtoupper($stateAbv))))
            ->first();

        $movers =  Company::query()
            ->where('state_id', $cityToCityRoute->cityFrom->state->id)
            ->whereHas('users', function ($q) {
                $q->where('user_email_verified', 1)
                    ->whereNotNull('overall_rating');
            })
            ->withCount([
                'users as reviews_count' => function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                },
            ])
            ->withAvg([
                'users as avg_rating' => function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                },
            ], 'overall_rating')
            ->having('reviews_count', '>', 80)
            ->having('avg_rating', '>=', 4)
            ->orderByDesc('avg_rating')
            ->orderByDesc('reviews_count')
            ->take(3)
            ->get();

        if ($movers->isEmpty()) {
            $movers = Company::query()
                ->where('state_id', $cityToCityRoute->cityFrom->state->id)
                ->whereHas('users', function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                })
                ->withCount([
                    'users as reviews_count' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ])
                ->withAvg([
                    'users as avg_rating' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ], 'overall_rating')
                ->orderByDesc('avg_rating')
                ->orderByDesc('reviews_count')
                ->take(10)
                ->get();
        }

        $local_movers = Company::query()
            ->where('state_id', $cityToCityRoute->cityFrom->state->id)
            ->whereHas('users', function ($q) {
                $q->where('user_email_verified', 1)
                    ->whereNotNull('overall_rating');
            })
            ->withCount([
                'users as reviews_count' => function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                },
            ])
            ->withAvg([
                'users as avg_rating' => function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                },
            ], 'overall_rating')
            ->having('reviews_count', '>', 80)
            ->having('avg_rating', '>=', 4)
            ->orderByDesc('avg_rating')
            ->orderByDesc('reviews_count')
            ->take(5)
            ->get();

        // Fallback: if no companies meet the 80+ review and 4+ rating criteria
        if ($local_movers->isEmpty()) {
            $local_movers = Company::query()
                ->where('state_id', $cityToCityRoute->cityFrom->state->id)
                ->whereHas('users', function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                })
                ->withCount([
                    'users as reviews_count' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ])
                ->withAvg([
                    'users as avg_rating' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ], 'overall_rating')
                ->orderByDesc('avg_rating')
                ->orderByDesc('reviews_count')
                ->take(5)
                ->get();
        }

        $local_resource_bottom_movers = ResourceBottomMover::where('resource_page_id', 2)
            ->orderBy('position', 'asc')
            ->take(4)
            ->get();

        $long_distance_movers = ResourceBottomMover::where('resource_page_id', 1)
            ->orderBy('position', 'asc')
            ->take(4)
            ->get();

        $container_movers = ResourceBottomMover::where('resource_page_id', 14)
            ->orderBy('position', 'asc')
            ->take(4)
            ->get();

        $truck_rental_movers = ResourceBottomMover::where('resource_page_id', 15)
            ->orderBy('position', 'asc')
            ->take(4)
            ->get();

        $city_cost_of_living = CityCostOfLiving::where('city_page_id', $cityToCityRoute->cityFrom->id)->first();
        $to_city_cost_of_living = CityCostOfLiving::where('city_page_id', $cityToCityRoute->cityTo->id)->first();
        $city_life_style = CityLifeStyle::where('city_page_id', $cityToCityRoute->cityFrom->id)->first();
        $to_city_life_style = CityLifeStyle::where('city_page_id', $cityToCityRoute->cityTo->id)->first();
        $move_size_cost = CityToCityMoveSizeCost::where('city_to_city_route_id', $cityToCityRoute->id)->first();

        // Calculate costs and distance using service
        $calculator = new MovingMilesCostCalculator();

        // Pass the database object instead of origin/destination strings
        $milesData = $calculator->calculateDistance($cityToCityRoute);

        $miles = $milesData['miles'];
        $duration = $calculator->calculateTravelTime($milesData['duration']);

        // The rest of your logic remains identical
        $calculatedCosts = $calculator->calculate((float) $miles);

        if ($cityToCityRoute) {
            return view('frontend.company_auth.route_pages.CityToCityRoutePage', compact(
                'cityToCityRoute',
                'movers',
                'local_movers',
                'local_resource_bottom_movers',
                'long_distance_movers',
                'container_movers',
                'truck_rental_movers',
                'move_size_cost',
                'city_cost_of_living',
                'to_city_cost_of_living',
                'city_life_style',
                'to_city_life_style',
                'calculatedCosts',
                'duration',
            ));
        }

        abort(404);
    }

    private function isCitySlug(string $slug, string $stateAbv): bool
    {
        return CityPage::where('slug', $slug)
            ->whereHas('state', fn($q) => $q->where('abv', strtoupper($stateAbv)))
            ->exists();
    }

    private function isStateSlug(string $slug, string $stateAbv): bool
    {
        return State::where('slug', $slug)
            ->where('abv', strtoupper($stateAbv))
            ->exists();
    }
}
