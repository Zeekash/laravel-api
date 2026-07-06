<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\StateCostPage;
use App\Models\StateCostPageFaq;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StateCostPageFaqController extends Controller
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
        if (is_null($this->user) || !$this->user->can('state-cost-faq.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any state cost faq !');
        }
        $faqs = StateCostPageFaq::all();

        return view('backend.pages.state-cost-pages.faqs.index', compact('faqs'));
    }


    public function create()
    {
        if (is_null($this->user) || !$this->user->can('state-cost-faq.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any state cost faq !');
        }
        $state_cost_pages = StateCostPage::get(['id', 'title']);
        return view('backend.pages.state-cost-pages.faqs.create', compact('state_cost_pages'));
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'inputs.*.question' => 'required',
                'inputs.*.answer' => 'required',
                'inputs.*.state_cost_page_id' => 'required'
            ],
            [
                'inputs.*.question' => 'The question field is required!',
                'inputs.*.answer' => 'The answer field is required!',
                'inputs.*.state_cost_page_id' => 'The state cost page field is required!',
            ]
        );
        foreach ($request->inputs as $key => $value) {
            StateCostPageFaq::create($value);
        }
        return redirect()->route('admin.state-cost-page-faqs.index')->with('success', 'Added Successfully');
    }


    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('state-cost-faq.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any state cost faq !');
        }
        $faq = StateCostPageFaq::find($id);
        $state_cost_pages = StateCostPage::get(['id', 'title']);
        return view('backend.pages.state-cost-pages.faqs.edit', compact('faq', 'state_cost_pages'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'state_cost_page_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = StateCostPageFaq::find($id);

        $faq->state_cost_page_id = $request->state_cost_page_id;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        Alert::success('Update', 'State Cost Page Faq Update Successfully');
        return redirect()->route('admin.state-cost-page-faqs.index')->with('success', 'State Cost Page Update Successfully');
    }

    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('state-cost-faq.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any state cost faq !');
        }
        $faq = StateCostPageFaq::find($id);
        $faq->delete();
        Alert::success('Deleted', 'State Cost Page deleted successfully');
        return redirect()->route('admin.state-cost-page-faqs.index')->with('success', 'State Cost Page deleted successfully');
    }
}
