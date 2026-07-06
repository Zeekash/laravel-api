<?php

namespace App\Http\Controllers\Backend;

use App\Models\State;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BestStatePage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BestStatePageController extends Controller
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
        if (is_null($this->user) || !$this->user->can('best-state-page.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any best state page!');
        }
        $best_state_pages = BestStatePage::all();
        return view('backend.pages.best-state-pages.index', compact('best_state_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('best-state-page.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any best state page!');
        }
        $states = State::get(['id', 'name']);
        return view('backend.pages.best-state-pages.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('best-state-page.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any best state page!');
        }
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:best_state_pages,slug',
            'state_id' => 'required|exists:states,id',
        ]);

        $bestStatePage = new BestStatePage();

        $bestStatePage->title = $request->title;
        $bestStatePage->description = $request->description;
        $bestStatePage->slug = Str::slug($request->slug);
        $bestStatePage->meta_title = $request->meta_title;
        $bestStatePage->meta_description = $request->meta_description;
        $bestStatePage->local_mover_content = $request->local_mover_content;
        $bestStatePage->compare_mover_content = $request->compare_mover_content;
        $bestStatePage->long_distance_mover_content = $request->long_distance_mover_content;
        $bestStatePage->container_mover_content = $request->container_mover_content;
        $bestStatePage->truck_rental_mover_content = $request->truck_rental_mover_content;
        $bestStatePage->bottom_content = $request->bottom_content;
        $bestStatePage->state_id = $request->state_id;

        $bestStatePage->save();

        return redirect()->route('admin.best-state-pages.index')
            ->with('success', 'Best state page created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BestStatePage $bestStatePage)
    {
        if (is_null($this->user) || !$this->user->can('best-state-page.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any best state page!');
        }
        $states = State::get(['id', 'name']);
        return view('backend.pages.best-state-pages.edit', compact('bestStatePage', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BestStatePage $bestStatePage)
    {
        if (is_null($this->user) || !$this->user->can('best-state-page.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update any best state page!');
        }
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'state_id' => 'required|exists:states,id',
        ]);

        $bestStatePage->title = $request->title;
        $bestStatePage->description = $request->description;
        $bestStatePage->slug = Str::slug($request->slug);
        $bestStatePage->meta_title = $request->meta_title;
        $bestStatePage->meta_description = $request->meta_description;
        $bestStatePage->local_mover_content = $request->local_mover_content;
        $bestStatePage->compare_mover_content = $request->compare_mover_content;
        $bestStatePage->long_distance_mover_content = $request->long_distance_mover_content;
        $bestStatePage->container_mover_content = $request->container_mover_content;
        $bestStatePage->truck_rental_mover_content = $request->truck_rental_mover_content;
        $bestStatePage->bottom_content = $request->bottom_content;
        $bestStatePage->state_id = $request->state_id;

        $bestStatePage->save();

        return redirect()->route('admin.best-state-pages.index')
            ->with('success', 'Best state page created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('best-state-page.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any best state page!');
        }
        $bestStatePage = BestStatePage::find($id);
        $bestStatePage->delete();

        return redirect()->back()
            ->with('success', 'Best state page deleted successfully.');
    }
}
