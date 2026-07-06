<?php

namespace App\Http\Controllers\Backend;

use App\Models\Company;
use Illuminate\Support\Str;
use App\Models\ResourcePage;
use Illuminate\Http\Request;
use App\Models\ResourcePageFaq;
use App\Models\ResourceTopMover;
use App\Models\ResourceOtherMover;
use App\Models\ResourceBottomMover;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ResourceController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function resource_index()
    {
        if (is_null($this->user) || !$this->user->can('resource-page.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any resource page !');
        }
        $resource_pages = ResourcePage::all();
        return view('backend.pages.resource.resourceIndexPage', compact('resource_pages'));
    }


    public function resource_create()
    {
        if (is_null($this->user) || !$this->user->can('resource-page.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any resource page !');
        }
        return view('backend.pages.resource.resourceCreatePage');
    }


    public function resource_store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'upper_content' => 'required',
            'bottom_content' => 'required',
        ]);

        $resourcePage = new ResourcePage();
        $resourcePage->publish_by = Auth::guard('admin')->user()->id;
        $resourcePage->title = $request->title;
        $resourcePage->slug = Str::slug($request->slug);
        $resourcePage->meta_title = $request->meta_title;
        $resourcePage->meta_description = $request->meta_description;
        $resourcePage->full_service_content = $request->full_service_content;
        $resourcePage->other_service_content = $request->other_service_content;
        $resourcePage->upper_content = $request->upper_content;
        $resourcePage->middle_content = $request->middle_content;
        $resourcePage->bottom_content = $request->bottom_content;
        $resourcePage->save();
        Alert::success('Created', 'Resource Page Created Successfully');
        return redirect()->route('admin.resource.index')->with('success', 'Resource Page Created Successfully');
    }


    public function resource_edit($id)
    {
        if (is_null($this->user) || !$this->user->can('resource-page.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any resource page !');
        }
        $resourcePage = ResourcePage::find($id);
        return view('backend.pages.resource.resourceEditPage', compact('resourcePage'));
    }

    public function resource_update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'upper_content' => 'required',
            'bottom_content' => 'required',
        ]);

        $resourcePage = ResourcePage::find($id);
        $resourcePage->publish_by = Auth::guard('admin')->user()->id;
        $resourcePage->title = $request->title;
        $resourcePage->slug = Str::slug($request->slug);
        $resourcePage->meta_title = $request->meta_title;
        $resourcePage->meta_description = $request->meta_description;
        $resourcePage->full_service_content = $request->full_service_content;
        $resourcePage->other_service_content = $request->other_service_content;
        $resourcePage->upper_content = $request->upper_content;
        $resourcePage->middle_content = $request->middle_content;
        $resourcePage->bottom_content = $request->bottom_content;
        $resourcePage->save();
        Alert::success('Updated', 'Resource Page Updated Successfully');
        return redirect()->route('admin.resource.index')->with('success', 'Resource Page Updated Successfully');
    }

    public function resource_destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('resource-page.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any resource page !');
        }
        $resourcePage = ResourcePage::find($id);
        $resourcePage->delete();
        Alert::success('Deleted', 'Resource Page deleted successfully');
        return redirect()->route('admin.resource.index')->with('success', 'Resource Page deleted successfully');
    }



    public function resource_top_mover_index()
    {
        if (is_null($this->user) || !$this->user->can('resource-top-mover.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any resource top mover !');
        }
        $top_movers = ResourceTopMover::all();

        return view('backend.pages.resource.top-movers.resourceTopMoverIndex', compact('top_movers'));
    }


    public function resource_top_mover_create()
    {
        if (is_null($this->user) || !$this->user->can('resource-top-mover.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any resource top mover !');
        }
        $resource_pages = ResourcePage::get(['id', 'title']);
        $companies = Company::get(['id', 'company_name']);

        return view('backend.pages.resource.top-movers.resourceTopMoverCreate', compact('companies', 'resource_pages'));
    }


    public function resource_top_mover_store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'resource_page_id' => 'required',
            'heading' => 'required',
            'position' => 'required',
        ]);

        $topMover = new ResourceTopMover();
        $topMover->company_id = $request->company_id;
        $topMover->resource_page_id = $request->resource_page_id;
        $topMover->heading = $request->heading;
        $topMover->point_one = $request->point_one;
        $topMover->point_two = $request->point_two;
        $topMover->point_three = $request->point_three;
        $topMover->position = $request->position;
        $topMover->save();
        Alert::success('Created', 'Resource Top Mover Created Successfully');
        return redirect()->route('admin.resource.top.mover.index')->with('success', 'Resource Top Mover Created Successfully');
    }


    public function resource_top_mover_edit($id)
    {
        if (is_null($this->user) || !$this->user->can('resource-top-mover.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any resource top mover !');
        }
        $topMover = ResourceTopMover::find($id);
        $resource_pages = ResourcePage::get(['id', 'title']);
        $companies = Company::get(['id', 'company_name']);
        return view('backend.pages.resource.top-movers.resourceTopMoverEdit', compact('topMover', 'resource_pages', 'companies'));
    }

    public function resource_top_mover_update(Request $request, $id)
    {
        $request->validate([
            'company_id' => 'required',
            'resource_page_id' => 'required',
            'heading' => 'required',
            'position' => 'required',
        ]);
        $topMover = ResourceTopMover::find($id);

        $topMover->company_id = $request->company_id;
        $topMover->resource_page_id = $request->resource_page_id;
        $topMover->heading = $request->heading;
        $topMover->point_one = $request->point_one;
        $topMover->point_two = $request->point_two;
        $topMover->point_three = $request->point_three;
        $topMover->position = $request->position;
        $topMover->save();

        Alert::success('Updated', 'Resource Top Mover Updated Successfully');
        return redirect()->route('admin.resource.top.mover.index')->with('success', 'Resource Top Mover Updated Successfully');
    }

    public function resource_top_mover_destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('resource-top-mover.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any resource top mover !');
        }
        $topMover = ResourceTopMover::find($id);
        $topMover->delete();
        Alert::success('Deleted', 'Resource Top Mover deleted successfully');
        return redirect()->route('admin.resource.top.mover.index')->with('success', 'Resource Top Mover deleted successfully');
    }


    public function resource_bottom_mover_index()
    {
        if (is_null($this->user) || !$this->user->can('resource-bottom-mover.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any resource bottom mover !');
        }
        $bottom_movers = ResourceBottomMover::all();

        return view('backend.pages.resource.bottom-movers.resourceBottomMoverIndex', compact('bottom_movers'));
    }


    public function resource_bottom_mover_create()
    {
        if (is_null($this->user) || !$this->user->can('resource-bottom-mover.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any resource bottom mover !');
        }
        $resource_pages = ResourcePage::get(['id', 'title']);
        $companies = Company::get(['id', 'company_name']);

        return view('backend.pages.resource.bottom-movers.resourceBottomMoverCreate', compact('companies', 'resource_pages'));
    }


    public function resource_bottom_mover_store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'resource_page_id' => 'required',
            'heading' => 'required',
            'position' => 'required',
            'content' => 'required',
        ]);

        $bottomMover = new ResourceBottomMover();
        $bottomMover->company_id = $request->company_id;
        $bottomMover->resource_page_id = $request->resource_page_id;
        $bottomMover->heading = $request->heading;
        $bottomMover->point_one = $request->point_one;
        $bottomMover->point_two = $request->point_two;
        $bottomMover->point_three = $request->point_three;
        $bottomMover->position = $request->position;
        $bottomMover->content = $request->content;
        $bottomMover->save();
        Alert::success('Created', 'Resource Bottom Mover Created Successfully');
        return redirect()->route('admin.resource.bottom.mover.index')->with('success', 'Resource Bottom Mover Created Successfully');
    }


    public function resource_bottom_mover_edit($id)
    {
        if (is_null($this->user) || !$this->user->can('resource-bottom-mover.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any resource bottom mover !');
        }
        $bottomMover = ResourceBottomMover::find($id);
        $resource_pages = ResourcePage::get(['id', 'title']);
        $companies = Company::get(['id', 'company_name']);
        return view('backend.pages.resource.bottom-movers.resourceBottomMoverEdit', compact('bottomMover', 'resource_pages', 'companies'));
    }

    public function resource_bottom_mover_update(Request $request, $id)
    {
        $request->validate([
            'company_id' => 'required',
            'resource_page_id' => 'required',
            'heading' => 'required',
            'position' => 'required',
            'content' => 'required',
        ]);

        $bottomMover = ResourceBottomMover::find($id);

        $bottomMover->company_id = $request->company_id;
        $bottomMover->resource_page_id = $request->resource_page_id;
        $bottomMover->heading = $request->heading;
        $bottomMover->point_one = $request->point_one;
        $bottomMover->point_two = $request->point_two;
        $bottomMover->point_three = $request->point_three;
        $bottomMover->position = $request->position;
        $bottomMover->content = $request->content;
        $bottomMover->save();
        Alert::success('Update', 'Resource Bottom Mover Update Successfully');
        return redirect()->route('admin.resource.bottom.mover.index')->with('success', 'Resource Bottom Mover Update Successfully');
    }

    public function resource_bottom_mover_destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('resource-bottom-mover.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any resource bottom mover !');
        }
        $bottomMover = ResourceBottomMover::find($id);
        $bottomMover->delete();
        Alert::success('Deleted', 'Resource Bottom Mover deleted successfully');
        return redirect()->route('admin.resource.bottom.mover.index')->with('success', 'Resource Bottom Mover deleted successfully');
    }

    public function resource_other_mover_index()
    {
        if (is_null($this->user) || !$this->user->can('resource-other-mover.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any resource other mover !');
        }
        $other_movers = ResourceOtherMover::all();

        return view('backend.pages.resource.other-movers.resourceOtherMoverIndex', compact('other_movers'));
    }


    public function resource_other_mover_create()
    {
        if (is_null($this->user) || !$this->user->can('resource-other-mover.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any resource other mover !');
        }
        $resource_pages = ResourcePage::get(['id', 'title']);
        $companies = Company::get(['id', 'company_name']);

        return view('backend.pages.resource.other-movers.resourceOtherMoverCreate', compact('companies', 'resource_pages'));
    }


    public function resource_other_mover_store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'resource_page_id' => 'required',
            'heading' => 'required',
            'position' => 'required',
            'content' => 'required',
        ]);

        $otherMover = new ResourceOtherMover();
        $otherMover->company_id = $request->company_id;
        $otherMover->resource_page_id = $request->resource_page_id;
        $otherMover->heading = $request->heading;
        $otherMover->point_one = $request->point_one;
        $otherMover->point_two = $request->point_two;
        $otherMover->point_three = $request->point_three;
        $otherMover->position = $request->position;
        $otherMover->content = $request->content;
        $otherMover->save();
        Alert::success('Created', 'Resource Other Mover Created Successfully');
        return redirect()->route('admin.resource.other.mover.index')->with('success', 'Resource Other Mover Created Successfully');
    }


    public function resource_other_mover_edit($id)
    {
        if (is_null($this->user) || !$this->user->can('resource-other-mover.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any resource other mover !');
        }
        $otherMover = ResourceOtherMover::find($id);
        $resource_pages = ResourcePage::get(['id', 'title']);
        $companies = Company::get(['id', 'company_name']);
        return view('backend.pages.resource.other-movers.resourceOtherMoverEdit', compact('otherMover', 'resource_pages', 'companies'));
    }

    public function resource_other_mover_update(Request $request, $id)
    {
        $request->validate([
            'company_id' => 'required',
            'resource_page_id' => 'required',
            'heading' => 'required',
            'position' => 'required',
            'content' => 'required',
        ]);

        $otherMover = ResourceOtherMover::find($id);

        $otherMover->company_id = $request->company_id;
        $otherMover->resource_page_id = $request->resource_page_id;
        $otherMover->heading = $request->heading;
        $otherMover->point_one = $request->point_one;
        $otherMover->point_two = $request->point_two;
        $otherMover->point_three = $request->point_three;
        $otherMover->position = $request->position;
        $otherMover->content = $request->content;
        $otherMover->save();
        Alert::success('Update', 'Resource other Mover Update Successfully');
        return redirect()->route('admin.resource.other.mover.index')->with('success', 'Resource other Mover Update Successfully');
    }

    public function resource_other_mover_destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('resource-other-mover.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any resource other mover !');
        }
        $otherMover = ResourceOtherMover::find($id);
        $otherMover->delete();
        Alert::success('Deleted', 'Resource Other Mover deleted successfully');
        return redirect()->route('admin.resource.other.mover.index')->with('success', 'Resource Other Mover deleted successfully');
    }




    public function resource_faq_index()
    {
        if (is_null($this->user) || !$this->user->can('resource-faq.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any resource faq !');
        }
        $resource_faqs = ResourcePageFaq::all();

        return view('backend.pages.resource.faqs.index', compact('resource_faqs'));
    }


    public function resource_faq_create()
    {
        if (is_null($this->user) || !$this->user->can('resource-faq.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any resource faq !');
        }
        $resource_pages = ResourcePage::get(['id', 'title']);
        return view('backend.pages.resource.faqs.create', compact('resource_pages'));
    }


    public function resource_faq_store(Request $request)
    {
        $request->validate(
            [
                'inputs.*.question' => 'required',
                'inputs.*.answer' => 'required',
                'inputs.*.resource_page_id' => 'required'
            ],
            [
                'inputs.*.question' => 'The question field is required!',
                'inputs.*.answer' => 'The answer field is required!',
                'inputs.*.resource_page_id' => 'The resource page field is required!',
            ]
        );
        foreach ($request->inputs as $key => $value) {
            ResourcePageFaq::create($value);
        }
        return redirect()->route('admin.resource-faq.index')->with('success', 'Added Successfully');
    }


    public function resource_faq_edit($id)
    {
        if (is_null($this->user) || !$this->user->can('resource-faq.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any resource faq !');
        }
        $resourceFaq = ResourcePageFaq::find($id);
        $resource_pages = ResourcePage::get(['id', 'title']);
        return view('backend.pages.resource.faqs.edit', compact('resourceFaq', 'resource_pages'));
    }

    public function resource_faq_update(Request $request, $id)
    {
        $request->validate([
            'resource_page_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);

        $bottomMover = ResourcePageFaq::find($id);

        $bottomMover->resource_page_id = $request->resource_page_id;
        $bottomMover->question = $request->question;
        $bottomMover->answer = $request->answer;
        $bottomMover->save();
        Alert::success('Update', 'Resource Faq Update Successfully');
        return redirect()->route('admin.resource-faq.index')->with('success', 'Resource Faq Update Successfully');
    }

    public function resource_faq_destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('resource-faq.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any resource faq !');
        }
        $bottomMover = ResourcePageFaq::find($id);
        $bottomMover->delete();
        Alert::success('Deleted', 'Resource Faq deleted successfully');
        return redirect()->route('admin.resource-faq.index')->with('success', 'Resource Faq deleted successfully');
    }
}
