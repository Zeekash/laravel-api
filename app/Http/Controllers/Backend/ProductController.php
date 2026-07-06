<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
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
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('product.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any product !');
        }
        $products = Product::all();
        return view('backend.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('product.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any product !');
        }
        return view('backend.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product Created Successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (is_null($this->user) || !$this->user->can('product.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any product !');
        }
        return view('backend.pages.products.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);


        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('product.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any product !');
        }
        $product = Product::find($id);
        $product->delete();
        Alert::success('Deleted', 'Product deleted successfully .');

        return redirect()->back()->with('success', 'Product Deleted Successfully!');
    }

    public function deleteSelected(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('product.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete product !');
        }
        $ids = $request->input('ids');

        if (!$ids || !is_array($ids)) {
            return redirect()->back()->with('error', 'No product selected for deletion.');
        }

        Product::whereIn('id', $ids)->delete();
        Alert::success('Deleted', 'Product deleted successfully.');
        return redirect()->back()->with('success', 'Selected Product have been deleted!');
    }
}
