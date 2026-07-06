<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Item;
use App\Models\GetQuotation;
use App\Models\PostCategory; 
use App\Models\ItemCalculate;
use Illuminate\Support\Str;
class GetQuoteController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $blog_category = PostCategory::all();
        return view('frontend.company_auth.get-quote', compact('categories','blog_category'));
    }
    public function create(Request $request)
    {
        // always wrap in trycatch
        try {
            \DB::beginTransaction();

            $get_quotation = GetQuotation::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'moving_from' => $request->moving_from,
                'moving_to' => $request->moving_to,
                'other_info' => $request->other_info,
                'total' => $request->total,
                'weight' => $request->weight,
            ]);

            $items = $request->cart;

            foreach ($items as $item => $value) {
                // do you stuff here
                ItemCalculate::create([
                    'get_quotation_id' => $get_quotation->id,
                    'item_id' => $item,
                    'quantity' => (int) $value['quantity'],
                    'cubic_feet' => (float) $value['cubic_feet'],
                    'result' => (float) $value['result'],
                ]);
            }
            \DB::commit();
        } catch (\Throwable $th) {
            \DB::rollback();
            throw $th;
        }
        return redirect()->route('company.getquote-thankyou');
    }
}
