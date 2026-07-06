<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Item;
use App\Models\GetQuotation;
use App\Models\ItemCalculate;
use Illuminate\Http\Request;
use DB;    

class GetQuoteController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }  

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('estimate.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any estimate !');
        }
        $get_quotation = GetQuotation::all();
        return view('backend.pages.get-quotes.index', compact('get_quotation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('estimate.create')) {
            abort(404, 'not found');
        }
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
        if (is_null($this->user) || !$this->user->can('estimate.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view estimate !');
        }
        $get_quotation = GetQuotation::get();
        $item_calculate = ItemCalculate::where('get_quotation_id', $id)->get();

        //     // $sub_category = SubCategory::where('category_id', $id)->get();
        //     // return $item_calculate;
        return view(
            'backend.pages.get-quotes.show',
            compact('get_quotation', 'item_calculate')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('estimate.edit')) {
            abort(404, 'not found');
        }
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
    	DB::table("get_quotations")->delete($id);
        Alert::success('Deleted', 'Successfully deleted.');
    	return back();
    }
}
