<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Models\Dispute;
use App\Models\City;
use App\Models\State;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('user-review.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any users review !');
        }

        if ($request->ajax()) {
            $users = User::with('company')->select('users.*');

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($user) {
                    if ($this->user->can('user-review.delete')) {
                        return '<input type="checkbox" name="ids[]" value="' . $user->id . '">';
                    }
                    return '';
                })
                ->addColumn('company_name', function ($user) {
                    return $user->company ? $user->company->company_name : 'N/A';
                })
                ->addColumn('move_type', function ($user) {
                    return $user->move_type ?? 'Not Available';
                })
                ->addColumn('email_verification', function ($user) {
                    if ($user->user_email_verified === 1) {
                        return '<div class="py-2 mx-3" style="color:white;background-color:#11b311;border-radius:12px;">Verified</div>';
                    } else {
                        return '<div class="py-2 mx-3" style="color:white;background-color:#ff1515;border-radius:12px;">Not Verified</div>';
                    }
                })
                ->addColumn('action', function ($user) {
                    $action = '<a class="btn btn-primary text-white" href="' . route('admin.users.show', $user->id) . '"><i class="fa fa-eye"></i></a>';

                    if ($this->user->can('user-review.edit')) {
                        $action .= ' <a class="btn btn-success text-white" href="' . route('admin.users.edit', $user->id) . '"><i class="fa fa-edit"></i></a>';
                    }

                    if ($this->user->can('user-review.delete')) {
                        $action .= ' <a href="' . route('admin.users.destroy', $user->id) . '" class="btn btn-danger text-white delete_confirm"><i class="fa fa-trash"></i></a>';
                    }

                    return '<div  style="display:flex; justify-content: center">' . $action . '</div>';
                })
                ->filterColumn('company_name', function ($query, $keyword) {
                    $query->whereHas('company', fn($q) => $q->where('company_name', 'like', "%{$keyword}%"));
                })
                ->orderColumn('company_name', function ($query, $order) {
                    $query->join('companies as company', 'users.company_id', '=', 'company.id')
                        ->orderBy('company.company_name', $order)
                        ->select('users.*');
                })
                ->rawColumns(['checkbox', 'email_verification', 'action'])
                ->make(true);
        }

        $softDeleteUserCount = User::onlyTrashed()->count();
        $verified_reviews = User::where('user_email_verified', 1)->count();
        $unverified_reviews = User::where('user_email_verified', 0)->count();
        return view('backend.pages.users.index', compact(
            'softDeleteUserCount',
            'verified_reviews',
            'unverified_reviews',
        ));
    }

    public function reviewSoftDeletePage()
    {
        if (is_null($this->user) || !$this->user->can('user-review.view-trash')) {
            abort(403, 'Sorry !! You are Unauthorized to view any users review !');
        }
        $users = User::onlyTrashed()->get();
        return view('backend.pages.users.softDelPage', compact('users'));
    }

    public function reviewRestoreSoftDeleted($id)
    {
        if (is_null($this->user) || !$this->user->can('user-review.restore')) {
            abort(403, 'Sorry !! You are Unauthorized to restore users review !');
        }
        $user = user::onlyTrashed()->where('id', $id)->first();
        $user->restore();
        return redirect()->back()->with('success', 'Review Recovered Successfully');
    }

    public function reviewSoftDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('user-review.force-delete')) {
            abort(403, 'Sorry !! You are Unauthorized to force delete users review !');
        }
        $user = User::onlyTrashed()->where('id', $id)->first();
        $user->forceDelete();
        return redirect()->back()->with('success', 'Review Deleted Successfully');
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('user-review.create')) {
            abort(404, 'Sorry !! You are Unauthorized to create users review !');
        }
        $companies = Company::get(['id','company_name']);
        $pick_state = State::get(['id', 'name']);
        $pick_city = city::get(['id', 'name', 'zip_code']);

        $delivery_state = State::get(['id', 'name']);
        $delivery_city = city::get(['id', 'name', 'zip_code']);

        return view('backend.pages.users.create', compact(
            'companies',
            'pick_state',
            'pick_city',
            'delivery_state',
            'delivery_city'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('user-review.create')) {
            abort(404, 'Sorry !! You are Unauthorized to create users review !');
        }
        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'overall_rating' => 'required',
            'review_subject' => 'required',
            'your_review' => 'required',
            'service_cost' => 'required',
            'currency' => 'required',
            'move_size' => 'required',
            'company_id' => 'required',
            'pick_up_state_id' => 'required',
            'pick_up_city_id' => 'required',
            'delivery_state_id' => 'required',
            'delivery_city_id' => 'required',

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->overall_rating = $request->overall_rating;
        $user->review_subject = $request->review_subject;
        $user->your_review = $request->your_review;
        $user->service_cost = $request->service_cost;
        $user->currency = $request->currency;
        $user->move_size = $request->move_size;
        $user->pick_up_country_id  = 1;
        $user->pick_up_state_id = $request->pick_up_state_id;
        $user->pick_up_city_id = $request->pick_up_city_id;
        $user->delivery_country_id  = 1;
        $user->delivery_state_id = $request->delivery_state_id;
        $user->delivery_city_id = $request->delivery_city_id;
        $user->quote = $request->quote;
        $user->user_email_verified = $request->user_email_verified;
        $user->created_at = $request->created_at;
        $user->company_id = $request->company_id;
        $user->save();

        Alert::success('Created', 'User review successfully created.');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (is_null($this->user) || !$this->user->can('user-review.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view user review !');
        }
        return view('backend.pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('user-review.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit users review !');
        }
        $user = User::find($id);
        $pick_state = State::get(['id', 'name']);
        $pick_city = City::where('state_id', $user?->pick_up_state_id)->get(['id', 'name', 'zip_code']);

        $delivery_state = State::get(['id', 'name']);
        $delivery_city = City::where('state_id', $user?->delivery_state_id)->get(['id', 'name', 'zip_code']);
        return view('backend.pages.users.edit', compact(
            'user',
            'pick_state',
            'pick_city',
            'delivery_state',
            'delivery_city',

        ));
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
        if (is_null($this->user) || !$this->user->can('user-review.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update users review !');
        }
        // Create New User
        $user = User::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'overall_rating' => 'required',
            'review_subject' => 'required',
            'your_review' => 'required',
            'service_cost' => 'required',
            'currency' => 'required',
            'move_size' => 'required',

        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->overall_rating = $request->overall_rating;
        $user->review_subject = $request->review_subject;
        $user->your_review = $request->your_review;
        $user->service_cost = $request->service_cost;
        $user->currency = $request->currency;
        $user->move_size = $request->move_size;
        $user->pick_up_state_id = $request->pick_up_state_id;
        $user->pick_up_city_id = $request->pick_up_city_id;
        $user->delivery_state_id = $request->delivery_state_id;
        $user->delivery_city_id = $request->delivery_city_id;
        $user->quote = $request->quote;
        $user->user_email_verified = $request->user_email_verified;
        $user->created_at = $request->created_at;
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        Alert::success('Updated', 'User review successfully updated.');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('user-review.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete users review !');
        }
        $user = User::find($id);
        $user->delete();
        Alert::success('Deleted', 'Successfully deleted.');
        return back();
    }
    public function deleteAll(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('user-review.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete users reviews !');
        }
        $ids = $request->ids;
        DB::table("users")->whereIn('id', explode(",", $ids))->delete();
        Alert::success('Deleted', 'User deleted successfully.');
        return response()->json(['success' => " Deleted successfully."]);
    }
    public function bulkDestroy(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('user-review.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete users reviews !');
        }
        $ids = $request->input('ids');

        if (!$ids || !is_array($ids)) {
            return redirect()->back()->with('error', 'No reviews selected for deletion.');
        }

        User::whereIn('id', $ids)->delete();
        Alert::success('Deleted', 'User deleted successfully.');
        return redirect()->back()->with('success', 'Selected reviews have been deleted!');
    }

    public function allDisputes() {
        if (is_null($this->user) || !$this->user->can('review-dispute.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any review disputes !');
        }
        $disputes = Dispute::all();
        $resolved_disputes = Dispute::where('is_resolved', 1)->count();
        $unresolved_disputes = Dispute::where('is_resolved', 0)->count();
        return view('backend.pages.disputes.index', compact(
            'disputes',
            'resolved_disputes',
            'unresolved_disputes',
        ));
    }
    public function destroyDispute($id)
    {
        if (is_null($this->user) || !$this->user->can('review-dispute.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete review disputes !');
        }
        $dispute = Dispute::find($id);
        if($dispute->forceDelete()) {
            Mail::send('emails.disputeDeletedMail', ['dispute' => $dispute], function ($message) use ($dispute) {
                $message->to($dispute->company->company_email)
                    ->subject('Dispute Deleted - Mail from MyMovingJourney');
            });
            Alert::success('Deleted', 'Successfully deleted.');
            return back();
        }

    }
    public function bulkDestroyDisputes(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('review-dispute.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete review disputes !');
        }
        $ids = $request->input('disputeids');
        if (!$ids  || !is_array($ids)) {
            return redirect()->back()->with('error', 'No dispute selected for deletion.');
        }
        Dispute::whereIn('id', $ids)->forceDelete();
        return redirect()->back()->with('success', 'Selected disputes have been deleted!');
    }


    public function editDispute($id)
    {
        if (is_null($this->user) || !$this->user->can('review-dispute.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit review dispute !');
        }
        $dispute = Dispute::find($id);
        $user = $dispute->user;
        $pick_state = State::get(['id', 'name']);
        $pick_city = city::get(['id', 'name', 'zip_code']);
        $delivery_state = State::get(['id', 'name']);
        $delivery_city = city::get(['id', 'name', 'zip_code']);
        return view('backend.pages.disputes.edit', compact(
            'dispute',
            'user',
            'pick_state',
            'pick_city',
            'delivery_state',
            'delivery_city',
        ));
    }

    public function updateDispute(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('review-dispute.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update review dispute !');
        }
        // Create New User
        $dispute = Dispute::find($id);
        $user = $dispute->user;
        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'overall_rating' => 'required',
            'review_subject' => 'required',
            'your_review' => 'required',
            'service_cost' => 'required',
            'currency' => 'required',
            'move_size' => 'required',

        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->overall_rating = $request->overall_rating;
        $user->review_subject = $request->review_subject;
        $user->your_review = $request->your_review;
        $user->service_cost = $request->service_cost;
        $user->currency = $request->currency;
        $user->move_size = $request->move_size;
        $user->pick_up_state_id = $request->pick_up_state_id;
        $user->pick_up_city_id = $request->pick_up_city_id;
        $user->delivery_state_id = $request->delivery_state_id;
        $user->delivery_city_id = $request->delivery_city_id;
        $user->save();
        $dispute->is_resolved = $request->dispute_status;
        
        // $dispute->save();
        if ($dispute->save()) {
            if($dispute->is_resolved === '1') {
                Mail::send('emails.disputeResolvedMail', ['dispute' => $dispute], function ($message) use ($dispute) {
                    $message->to($dispute->company->company_email)
                        ->subject('Dispute Resolved - Mail from MyMovingJourney');
                });
            }
            Alert::success('Updated', 'Disputed review successfully updated.');
            return redirect()->route('admin.alldisputes');
        }
    }
}
