<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CinemaRequest;
use App\Models\Area;
use App\Models\Cinema;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AdminCinemaController extends Controller
{
    private $LIST_CINEMA = "admin/pages/Cinema/ListPage";
    private $CREATE_CINEMA = "admin/pages/Cinema/CreatePage";
    private $EDIT_CINEMA = "admin/pages/Cinema/EditPage";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Cinemas";
        $cinemas = Cinema::all();
        return inertia($this->LIST_CINEMA, compact('title', 'cinemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create cinema";
        $areas = Area::all();
        return Inertia::render($this->CREATE_CINEMA, compact('title', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CinemaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CinemaRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            Cinema::create($attributes);
            return redirect()->route('cinemas.index');
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
        $cinema = Cinema::findOrFail($id);
        $area = $cinema->area;
        $areas = Area::getAllExceptById($area->id);
        $title = "Update cinema";
        if ($cinema) {
            return Inertia::render($this->EDIT_CINEMA, compact('title', 'cinema', 'area', 'areas'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CinemaRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CinemaRequest $request, $id)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $cinema = Cinema::findOrFail($id);
            $attributes = getRequestAddedSlug($validatedRequest);
            $cinema->update($attributes);
            return redirect()->route('cinemas.index')->with('successMessage', 'Cinema was successfully updated!');
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
        $existingCinema = Cinema::findOrFail($id);
        if ($existingCinema) {
            Cinema::destroy($id);
            return Redirect::route('cinemas.index');
        }
        $error = "Cinema not found!";
        $cinemas = Cinema::all();
        return Inertia::render($this->LIST_CINEMA, compact('error', 'cinemas'));
    }
}
