<?php

namespace App\Http\Controllers\Backend;

use App\Models\ContactMover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class ContactMoverController extends Controller
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
    public function index(Request $request)
    {
        abort_if(is_null($this->user) || !$this->user->can('quotation.view'), 403, 'Unauthorized');

        $year = (int) $request->query('year', now()->year);

        $allMovers = ContactMover::orderBy('status')->get();

        $resolveDate = fn($item) => optional($item->created_at)->copy();

        $availableYears = $allMovers
            ->map(fn($item) => optional($resolveDate($item))->year)
            ->filter()
            ->values()
            ->toBase()
            ->unique()
            ->sortDesc()
            ->values();

        if ($availableYears->isEmpty() || !$availableYears->contains($year)) {
            $availableYears = $availableYears->prepend($year)->unique()->sortDesc()->values();
        }

        $contact_mover = $allMovers->filter(fn($item) => ($d = $resolveDate($item)) && $d->year === $year)->values();

        $chartData = array_fill(1, 12, 0);
        foreach ($contact_mover as $m) {
            if ($d = $resolveDate($m)) {
                $chartData[$d->month]++;
            }
        }

        $now = Carbon::now();
        $prevMonth = $now->copy()->subMonth();
        $last30Date = $now->copy()->subDays(30);

        $currentMonthCount = $allMovers->filter(fn($m) => $m->created_at?->isSameMonth($now))->count();
        $prevMonthCount = $allMovers->filter(fn($m) => $m->created_at?->isSameMonth($prevMonth))->count();
        $leadsLast30 = $allMovers->filter(fn($m) => $m->created_at && $m->created_at >= $last30Date)->count();
        $totalLeads = max($allMovers->count(), 1);

        $last30Pct = round(($leadsLast30 / $totalLeads) * 100, 1);
        $momPct = $prevMonthCount ? round((($currentMonthCount - $prevMonthCount) / $prevMonthCount) * 100, 1) : ($currentMonthCount ? 100 : 0);
        $momClass = $momPct >= 0 ? 'text-success' : 'text-danger';
         $momPrefix = $momPct >= 0 ? '↑' : '↓';

        return view('backend.pages.contact-movers.index', compact(
            'contact_mover',
            'year',
            'chartData',
            'availableYears',
            'currentMonthCount',
            'prevMonthCount',
            'leadsLast30',
            'last30Pct',
            'momPct',
            'momClass',
            'momPrefix',
            'totalLeads'
        ));
    }


    public function markAsRead($id)
    {
        if (is_null($this->user) || !$this->user->can('quotation.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit !');
        }
        DB::table("contact_movers")
            ->where('id', $id)
            ->update(['status' => 1]);
        Alert::success('Marked As Read', 'Successfully marked as read.');
        return back();
    }

    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('quotation.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete !');
        }
        DB::table("contact_movers")->delete($id);
        Alert::success('Deleted', 'Successfully deleted.');
        return back();
    }

    public function deleteAll(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('quotation.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to all delete !');
        }
        $ids = $request->ids;
        DB::table("contact_movers")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => " Deleted successfully."]);
    }
}
