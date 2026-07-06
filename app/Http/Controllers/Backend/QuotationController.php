<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\GetQuote;
use DB;                                                             

class QuotationController extends Controller
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
        if (is_null($this->user) || !$this->user->can('quotation.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any quotation !');
        }
        $get_quote = GetQuote::all();
        return view('backend.pages.quotations.index', compact('get_quote'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('quotation.create')) {
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
        if (is_null($this->user) || !$this->user->can('quotation.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any quotation !');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if (is_null($this->user) || !$this->user->can('quotation.view')) {
        //     abort(404, 'not found');
        // }
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
        if (is_null($this->user) || !$this->user->can('quotation.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any quotation !');
        }
    	DB::table("get_quotes")->delete($id);
        Alert::success('Deleted', 'Successfully deleted.');
    	return back();
    }
    public function deleteAll(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('quotation.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to all delete any quotation !');
        }
        $ids = $request->ids;
        DB::table("get_quotes")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>" Deleted successfully."]);
    }
}
