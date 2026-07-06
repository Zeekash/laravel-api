<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CostEstimator;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CostEstimatorController extends Controller
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
        abort_if(
            is_null($this->user) || !$this->user->can('cost-estimate.view'),
            403,
            'Sorry !! You are Unauthorized to view any estimate !'
        );

        $allFromStates = CostEstimator::select('ostate')
            ->whereNotNull('ostate')
            ->where('ostate', '!=', '')
            ->distinct()
            ->orderBy('ostate', 'asc')
            ->pluck('ostate')
            ->toArray();

        $allToStates = CostEstimator::select('dstate')
            ->whereNotNull('dstate')
            ->where('dstate', '!=', '')
            ->distinct()
            ->orderBy('dstate', 'asc')
            ->pluck('dstate')
            ->toArray();

        $now = Carbon::now();
        $totalLeads = CostEstimator::count();
        $leadsLast30 = CostEstimator::where('created_at', '>=', $now->copy()->subDays(30))->count();

        $routedLeads = CostEstimator::whereNotNull('min_price')
            ->whereNotNull('max_price')
            ->where(function ($q) {
                $q->whereNull('email')->orWhere('email', 'not like', '%fake%');
            })
            ->where(function ($q) {
                $q->whereNull('name')->orWhere('name', 'not like', '%suspicious%');
            })
            ->count();

        $spamLeads = CostEstimator::where(function ($q) {
            $q->where('email', 'like', '%fake%')
              ->orWhere('name', 'like', '%suspicious%');
        })->count();

        $unmatchedLeads = CostEstimator::where(function ($q) {
                $q->whereNull('min_price')->orWhereNull('max_price');
            })
            ->where(function ($q) {
                $q->whereNull('email')->orWhere('email', 'not like', '%fake%');
            })
            ->where(function ($q) {
                $q->whereNull('name')->orWhere('name', 'not like', '%suspicious%');
            })
            ->count();

        $query = CostEstimator::query();
        $this->applyFilters($query, $request);

        $cost_estimator = $query->orderBy('id', 'desc')->paginate(25)->appends($request->query());

        return view('backend.pages.cost-estimator.index', compact(
            'cost_estimator',
            'totalLeads',
            'leadsLast30',
            'routedLeads',
            'spamLeads',
            'unmatchedLeads',
            'allFromStates',
            'allToStates'
        ));
    }

    public function show(CostEstimator $cost_estimator)
    {
        abort_if(
            is_null($this->user) || !$this->user->can('cost-estimate.view'),
            403,
            'Sorry !! You are Unauthorized to view this estimate !'
        );

        $companies = $this->getCompaniesForDropdown();
        $assignedCompanies = collect();
        $assignedCompanyIds = [];

        if (Schema::hasTable('contact_movers')) {
            $assignedCompanies = DB::table('contact_movers')
                ->leftJoin('companies', 'companies.id', '=', 'contact_movers.company_id')
                ->where(function ($q) use ($cost_estimator) {
                    $q->where('contact_movers.email', $cost_estimator->email)
                      ->orWhere('contact_movers.phone_no', $cost_estimator->phone_no);
                })
                ->whereNotNull('contact_movers.company_id')
                ->select(
                    'contact_movers.*',
                    DB::raw($this->companyNameSqlExpression() . ' as assigned_company_name')
                )
                ->orderBy('contact_movers.id', 'desc')
                ->get();

            $assignedCompanyIds = $assignedCompanies->pluck('company_id')->filter()->unique()->values()->toArray();
        }

        return view('backend.pages.cost-estimator.show', compact(
            'cost_estimator',
            'companies',
            'assignedCompanies',
            'assignedCompanyIds'
        ));
    }

    public function assignToCompanies(Request $request, CostEstimator $cost_estimator)
    {
        abort_if(
            is_null($this->user) || !$this->user->can('cost-estimate.view'),
            403,
            'Sorry !! You are Unauthorized to assign this lead !'
        );

        $request->validate([
            'company_ids' => ['required', 'array', 'min:1'],
            'company_ids.*' => ['required', 'integer'],
            'route_note' => ['nullable', 'string', 'max:500'],
        ]);

        if (!Schema::hasTable('contact_movers')) {
            return redirect()->back()->with('error', 'contact_movers table was not found.');
        }

        $created = 0;
        $skipped = 0;

        foreach (array_unique($request->company_ids) as $companyId) {
            $alreadyExists = DB::table('contact_movers')
                ->where('company_id', $companyId)
                ->where(function ($q) use ($cost_estimator) {
                    $q->where('email', $cost_estimator->email)
                      ->orWhere('phone_no', $cost_estimator->phone_no);
                })
                ->exists();

            if ($alreadyExists) {
                $skipped++;
                continue;
            }

            $payload = $this->makeContactMoverPayload($cost_estimator, (int) $companyId, $request->route_note);

            DB::table('contact_movers')->insert($payload);
            $created++;
        }

        Alert::success('Lead Routed', $created . ' company lead(s) created. ' . $skipped . ' duplicate(s) skipped.');

        return redirect()->route('admin.cost-estimator.show', $cost_estimator->id);
    }

    public function markAsSpam(CostEstimator $cost_estimator)
    {
        abort_if(
            is_null($this->user) || !$this->user->can('cost-estimate.view'),
            403,
            'Sorry !! You are Unauthorized to update this lead !'
        );

        if (Schema::hasTable('contact_movers')) {
            $update = [];

            if (Schema::hasColumn('contact_movers', 'is_bad_lead')) {
                $update['is_bad_lead'] = 1;
            }

            if (Schema::hasColumn('contact_movers', 'label')) {
                $update['label'] = 'Spam';
            }

            if (Schema::hasColumn('contact_movers', 'updated_at')) {
                $update['updated_at'] = now();
            }

            if (!empty($update)) {
                DB::table('contact_movers')
                    ->where(function ($q) use ($cost_estimator) {
                        $q->where('email', $cost_estimator->email)
                          ->orWhere('phone_no', $cost_estimator->phone_no);
                    })
                    ->update($update);
            }
        }

        Alert::success('Updated', 'Lead has been marked as spam/bad lead.');

        return redirect()->back();
    }

    public function costEstimatorExcel(Request $request)
    {
        abort_if(
            is_null($this->user) || !$this->user->can('cost-estimate.view'),
            403,
            'Sorry !! You are Unauthorized to export estimates !'
        );

        $query = CostEstimator::query();
        $this->applyFilters($query, $request);

        $costestimate = $query->orderBy('id', 'desc')->get();
        $filename = 'leads_export_' . now()->format('Ymd_His') . '.xlsx';

        return Excel::download(new class($costestimate) implements FromCollection, WithHeadings {
            protected $costestimate;

            public function __construct($costestimate)
            {
                $this->costestimate = $costestimate;
            }

            public function collection()
            {
                return $this->costestimate->map(function ($item, $key) {
                    return [
                        $key + 1,
                        'L-' . (10000 + $item->id),
                        optional($item->created_at)->format('Y-m-d H:i:s'),
                        $item->name,
                        $item->email,
                        $item->phone_no ?? '',
                        ($item->ocity ?? $item->zip_from) . ($item->ostate ? ', ' . $item->ostate : ''),
                        ($item->dcity ?? $item->zip_to) . ($item->dstate ? ', ' . $item->dstate : ''),
                        $item->move_size ?? '',
                        $item->date ?? '',
                        $item->distance ?? '',
                        $item->min_price ?? '',
                        $item->max_price ?? '',
                        $item->user_ip ?? '',
                    ];
                });
            }

            public function headings(): array
            {
                return [
                    'Sr No',
                    'Lead Reference ID',
                    'Created At',
                    'Customer Name',
                    'Email Address',
                    'Phone Number',
                    'Origin Location',
                    'Destination Location',
                    'Home Inventory Size',
                    'Move Date',
                    'Distance Mileage',
                    'Minimum Estimated Cost',
                    'Maximum Estimated Cost',
                    'User IP Address',
                ];
            }
        }, $filename);
    }

    public function destroy(CostEstimator $cost_estimator)
    {
        if (is_null($this->user) || !$this->user->can('cost-estimate.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any cost estimate !');
        }

        $cost_estimator->delete();
        Alert::success('Deleted', 'Successfully deleted.');

        return redirect()->route('admin.cost-estimator.index');
    }

    public function bulkDestroy(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('cost-estimate.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete cost estimator !');
        }

        $ids = $request->input('ids', []);

        if (!is_array($ids) || count($ids) === 0) {
            return redirect()->back()->with('error', 'No records selected for mass deletion.');
        }

        CostEstimator::whereIn('id', $ids)->delete();

        Alert::success('Deleted', 'Selected records deleted successfully.');
        return redirect()->back();
    }

    private function applyFilters($query, Request $request): void
    {
        if ($request->filled('search')) {
            $search = trim($request->query('search'));

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('phone_no', 'like', '%' . $search . '%')
                  ->orWhere('zip_from', 'like', '%' . $search . '%')
                  ->orWhere('zip_to', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('status')) {
            $status = $request->query('status');

            if ($status === 'Routed') {
                $query->whereNotNull('min_price')
                    ->whereNotNull('max_price')
                    ->where(function ($q) {
                        $q->whereNull('email')->orWhere('email', 'not like', '%fake%');
                    })
                    ->where(function ($q) {
                        $q->whereNull('name')->orWhere('name', 'not like', '%suspicious%');
                    });
            }

            if ($status === 'Spam') {
                $query->where(function ($q) {
                    $q->where('email', 'like', '%fake%')
                      ->orWhere('name', 'like', '%suspicious%');
                });
            }

            if ($status === 'Unmatched') {
                $query->where(function ($q) {
                        $q->whereNull('min_price')->orWhereNull('max_price');
                    })
                    ->where(function ($q) {
                        $q->whereNull('email')->orWhere('email', 'not like', '%fake%');
                    })
                    ->where(function ($q) {
                        $q->whereNull('name')->orWhere('name', 'not like', '%suspicious%');
                    });
            }
        }

        if ($request->filled('from_state')) {
            $query->where('ostate', $request->query('from_state'));
        }

        if ($request->filled('to_state')) {
            $query->where('dstate', $request->query('to_state'));
        }

        if ($request->filled('timeframe')) {
            $timeframe = $request->query('timeframe');

            if ($timeframe === 'today') {
                $query->whereDate('created_at', Carbon::today());
            }

            if ($timeframe === 'yesterday') {
                $query->whereDate('created_at', Carbon::yesterday());
            }

            if ($timeframe === 'this_month') {
                $query->whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', Carbon::now()->month);
            }
        }
    }

    private function getCompaniesForDropdown()
    {
        if (!Schema::hasTable('companies')) {
            return collect();
        }

        $nameColumn = $this->firstExistingColumn('companies', [
            'company_name',
            'name',
            'business_name',
            'title'
        ]);

        if (!$nameColumn) {
            return collect();
        }

        $query = DB::table('companies')->select('id', DB::raw($nameColumn . ' as display_name'));

        foreach (['is_active', 'status'] as $column) {
            if (Schema::hasColumn('companies', $column)) {
                if ($column === 'is_active') {
                    $query->where($column, 1);
                }
            }
        }

        return $query->orderBy($nameColumn, 'asc')->get();
    }

    private function makeContactMoverPayload(CostEstimator $lead, int $companyId, ?string $routeNote = null): array
    {
        $message = trim((string) ($lead->message ?? ''));

        if ($routeNote) {
            $message = trim($message . "\n\nAdmin route note: " . $routeNote);
        }

        $payload = [
            'company_id' => $companyId,
            'name' => $lead->name,
            'email' => $lead->email,
            'phone_no' => $lead->phone_no,
            'zip_from' => $lead->zip_from,
            'zip_to' => $lead->zip_to,
            'move_size' => $lead->move_size,
            'date' => $lead->date,
            'message' => $message ?: null,
            'client_ip' => $lead->user_ip ?? $lead->client_ip ?? null,
            'referrer' => $lead->referrer ?? null,
            'status' => 0,
            'is_sent' => 1,
            'ozip' => $lead->zip_from,
            'dzip' => $lead->zip_to,
            'ocity' => $lead->ocity ?? null,
            'dcity' => $lead->dcity ?? null,
            'ostate' => $lead->ostate ?? null,
            'dstate' => $lead->dstate ?? null,
            'source' => 'Admin Manual Routing',
            'label' => 'Manual Lead',
            'is_bad_lead' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        return $this->onlyExistingColumns('contact_movers', $payload);
    }

    private function onlyExistingColumns(string $table, array $payload): array
    {
        return collect($payload)
            ->filter(function ($value, $column) use ($table) {
                return Schema::hasColumn($table, $column);
            })
            ->toArray();
    }

    private function firstExistingColumn(string $table, array $columns): ?string
    {
        foreach ($columns as $column) {
            if (Schema::hasColumn($table, $column)) {
                return $column;
            }
        }

        return null;
    }

    private function companyNameSqlExpression(): string
    {
        if (!Schema::hasTable('companies')) {
            return "'Company #'";
        }

        $nameColumn = $this->firstExistingColumn('companies', [
            'company_name',
            'name',
            'business_name',
            'title'
        ]);

        return $nameColumn ? 'companies.' . $nameColumn : "CONCAT('Company #', contact_movers.company_id)";
    }
}
