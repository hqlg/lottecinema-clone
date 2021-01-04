<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;
use App\Models\Area;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AdminAreaController extends Controller
{
    private $MODEL_NAME = 'Area';
    private $LIST_AREA = "admin/pages/Area/ListPage";
    private $CREATE_AREA = "admin/pages/Area/CreatePage";
    private $EDIT_AREA = "admin/pages/Area/EditPage";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Areas";
        $areas = Area::all();
        return Inertia::render($this->LIST_AREA, compact('title', 'areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Area";
        return Inertia::render($this->CREATE_AREA, compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $newArea = Area::create($attributes);
            if ($newArea) {
                return redirect()->route("areas.index")->with('successMessage', "Area was successfully added!");
            }
            $error = __('message.added_fail', ['name' => $this->MODEL_NAME]);
            return Inertia::render($this->CREATE_AREA, compact('error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::findOrFail($id);
        $title = "Update Area";
        if ($area) {
            return Inertia::render($this->EDIT_AREA, compact('title', 'area'));
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, $id)
    {
        $validated = $request->validated();
        if ($validated) {
            $area = Area::findOrFail($id);
            $area->update($validated);
            return redirect()->route('areas.index')->with('successMessage', 'Area was successfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingArea = Area::findOrFail($id);
        if ($existingArea) {
            Area::destroy($id);
            return Redirect::route('areas.index');
        }
        $error = __('message.not_found');
        $areas = Area::all();
        return Inertia::render($this->LIST_AREA, compact('error', 'areas'));
    }
}
