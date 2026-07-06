<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth; 
use App\Models\ContactUs;
use App\Models\Company;
use Illuminate\Http\Request;
use DB;

class ContactUsController extends Controller
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
        if (is_null($this->user) || !$this->user->can('contact-us.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any contact us !');
        }
        $contact_us = ContactUs::all();
        return view('backend.pages.contact-us.index', compact('contact_us'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (is_null($this->user) || !$this->user->can('contact-us.create')) {
        //     abort(404, 'Page not found');
        // }
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
        if (is_null($this->user) || !$this->user->can('contact-us.show')) {
            abort(404, 'Sorry !! You are Unauthorized to view any contact us !');
        }
        $contact_us = ContactUs::find($id);
        return view('backend.pages.contact-us.show', compact('contact_us'));
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
        if (is_null($this->user) || !$this->user->can('contact-us.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any contact us !');
        }
       $contact_us = ContactUs::find($id);
        if (!is_null($contact_us)) {
            $contact_us->delete();
        }
        Alert::success('Deleted', 'Successfully deleted.');
        return back();
    }
    public function deleteAll(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('contact-us.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete all contact us !');
        }
        $ids = $request->ids;
        DB::table("contact_us")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Contact Us Deleted successfully."]);
    }
}
