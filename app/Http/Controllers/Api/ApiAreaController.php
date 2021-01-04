<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;
use App\Http\Resources\AreaCollection;
use App\Http\Resources\AreaResource;
use App\Models\Area;

class ApiAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return new AreaCollection($areas);
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
            return (new AreaResource($newArea))
                ->response()
                ->setStatusCode(201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        return new AreaResource($area);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, Area $area)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $area->update($attributes);
            return new AreaResource($area);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return new AreaResource($area);
    }
}
