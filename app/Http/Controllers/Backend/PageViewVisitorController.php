<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageViewVisitorController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function PageView()
    {
        if (is_null($this->user) || !$this->user->can('page-view-visitor.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any view page  !');
        }
        $page_views = Event::selectRaw("COUNT(*) views, attribute page, DATE(created_at) date")
            ->groupBy(['date', 'attribute'])
            ->orderBy('date')
            ->get();

        return view('backend.pages.page-view-visitor.pageview', compact('page_views'));
    }

    public function PageVisitor()
    {
        if (is_null($this->user) || !$this->user->can('page-view-visitor.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any visitor page  !');
        }
        $unique_visitors = Event::selectRaw("COUNT(DISTINCT visitor_ip) unique_visitors, DATE(created_at) date")
            ->groupBy(['date'])
            ->get();
        return view('backend.pages.page-view-visitor.pagevisitor', compact('unique_visitors'));

    }

    public function VisitorDetail()
    {
        if (is_null($this->user) || !$this->user->can('page-view-visitor.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any visitor detail !');
        }
        $visitor_details = Event::selectRaw(" visitor_ip visitors , attribute page , useragent agent ,created_at date")
            ->groupBy(['date'])
            ->orderBy('date')
            ->get();
        return view('backend.pages.page-view-visitor.visitordetail', compact('visitor_details'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
