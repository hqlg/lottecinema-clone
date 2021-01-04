<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CinemaRequest;
use App\Http\Resources\CinemaCollection;
use App\Http\Resources\CinemaResource;
use App\Models\Cinema;

class ApiCinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cinemas = Cinema::all();
        return new CinemaCollection($cinemas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CinemaRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $newCinema = Cinema::create($attributes);
            return (new CinemaResource($newCinema))
                ->response()
                ->setStatusCode(201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function show(Cinema $cinema)
    {
        return new CinemaResource($cinema);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function update(CinemaRequest $request, Cinema $cinema)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $cinema->update($attributes);
            return new CinemaResource($cinema);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cinema $cinema)
    {
        $cinema->delete();
        return new CinemaResource($cinema);
    }
}
