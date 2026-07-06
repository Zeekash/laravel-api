<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth; 
use App\Models\UserContactUs;
use Illuminate\Http\Request;
use DB;

class UserContactUsController extends Controller
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
        if (is_null($this->user) || !$this->user->can('user-contact-us.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any user contact us !');
        }
        $user_contact_us = UserContactUs::all();
        return view('backend.pages.user-contact-us.index', compact('user_contact_us'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('contact-us.create')) {
            abort(404, 'Page not found');
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
        if (is_null($this->user) || !$this->user->can('contact-us.store')) {
            abort(404, 'Page not found');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->can('user-contact-us.show')) {
            abort(403, 'Sorry !! You are Unauthorized to show any user contact us !');
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
        if (is_null($this->user) || !$this->user->can('contact-us.edit')) {
            abort(404, 'Pgae not found');
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
        if (is_null($this->user) || !$this->user->can('user-contact-us.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any user contact us !');
        }
       $user_contact_us = UserContactUs::find($id);
        if (!is_null($user_contact_us)) {
            $user_contact_us->delete();
        }
        Alert::success('Deleted', 'Successfully deleted.');
        return back();
    }
    public function deleteAll(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('user-contact-us.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to all delete any user contact us !');
        }
        $ids = $request->ids;
        DB::table("user_contact_us")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Contact Us Deleted successfully."]);
    }
}
