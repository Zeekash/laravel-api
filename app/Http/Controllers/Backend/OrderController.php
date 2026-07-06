<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class OrderController extends Controller
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
        if (is_null($this->user) || !$this->user->can('order.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any order !');
        }
        $orders = Order::all();
        return view('backend.pages.orders.index', compact('orders'));
    }

    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('order.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any order !');
        }
        $order = Order::find($id);
        $order->delete();
        Alert::success('Deleted', 'Order deleted successfully.');

        return redirect()->back()->with('success', 'Order Deleted Successfully!');
    }
    public function deleteSelected(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('order.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete order !');
        }
        $ids = $request->input('ids');

        if (!$ids || !is_array($ids)) {
            return redirect()->back()->with('error', 'No order selected for deletion.');
        }

        Order::whereIn('id', $ids)->delete();
        Alert::success('Deleted', 'Order deleted successfully.');
        return redirect()->back()->with('success', 'Selected Order have been deleted!');
    }
}
