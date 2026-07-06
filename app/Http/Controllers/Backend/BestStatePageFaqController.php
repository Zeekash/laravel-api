<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BestStatePage;
use App\Models\BestStatePageFaq;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BestStatePageFaqController extends Controller
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
        if (is_null($this->user) || !$this->user->can('best-state-faq.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any best state page faq!');
        }
        $faqs = BestStatePageFaq::all();

        return view('backend.pages.best-state-pages.faqs.index', compact('faqs'));
    }


    public function create()
    {
        if (is_null($this->user) || !$this->user->can('best-state-faq.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any best state page faq!');
        }
        $best_state_pages = BestStatePage::get(['id', 'title']);
        return view('backend.pages.best-state-pages.faqs.create', compact('best_state_pages'));
    }


    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('best-state-faq.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any best state page faq!');
        }
        $request->validate([
            'inputs.*.question' => 'required',
            'inputs.*.answer' => 'required',
            'inputs.*.best_state_page_id' => 'required'
        ], [
            'inputs.*.question' => 'The question field is required!',
            'inputs.*.answer' => 'The answer field is required!',
            'inputs.*.best_state_page_id' => 'The best state page field is required!',
        ]);

        foreach ($request->inputs as $key => $value) {
            BestStatePageFaq::create($value);
        }
        Alert::success('Added', 'Best state Page Faq Added Successfully');
        return redirect()->route('admin.best-state-page-faqs.index')->with('success', 'Best state Page Faqs Added Successfully');
    }


    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('best-state-faq.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any best state page faq!');
        }
        $faq = BestStatePageFaq::find($id);
        $best_state_pages = BestStatePage::get(['id', 'title']);
        return view('backend.pages.best-state-pages.faqs.edit', compact('faq', 'best_state_pages'));
    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('best-state-faq.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update any best state page faq!');
        }
        $request->validate([
            'best_state_page_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = BestStatePageFaq::find($id);

        $faq->best_state_page_id = $request->best_state_page_id;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        Alert::success('Updated', 'Best state Page Faq Updated Successfully');
        return redirect()->route('admin.best-state-page-faqs.index')->with('success', 'Best state Page Faq Updated Successfully');
    }

    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('best-state-faq.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any best state page faq!');
        }
        $faq = BestStatePageFaq::find($id);
        $faq->delete();
        Alert::success('Deleted', 'Best state Page Faq deleted successfully');
        return redirect()->route('admin.best-state-page-faqs.index')->with('success', 'Best state Page Faq deleted successfully');
    }
}
