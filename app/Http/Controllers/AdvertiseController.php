<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    
    public function advertiseFormPage()
    {
        return view('frontend.company_auth.advertiseFormPage');
    }
    public function advertisingPage()
    {
        return view('frontend.company_auth.advertisingPage');
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'company_name' => 'required',
            'message' => 'required',
        ]);
        
        $adv = new Advertisement();
        $adv->name = $request->name;
        $adv->email = $request->email;
        $adv->phone = $request->phone;
        $adv->company_name = $request->company_name;
        $adv->message = $request->message;
        $adv->save();
        return redirect()->back()->with('success','Advertising form has been submitted successfully!');
    }

    
}
