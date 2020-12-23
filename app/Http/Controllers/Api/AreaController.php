<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;
use App\Models\Area;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return successfulResData(Area::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {
            $newArea = Area::create($request->all());
            successfulRes($newArea, "Area was created successfully!");
        }
        failedResMsg("Area could not be created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show($areaId)
    {
        $existingArea = Area::find($areaId);
        if ($existingArea) {
            successfulResData($existingArea);
        }
        failedResMsg("Area not found!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit($area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, $areaId)
    {
        $existingArea = Area::findOrFail($areaId);
        $validated = $request->validated();
        if ($existingArea && $validated) {
            $existingArea->update($request->all());
            successfulRes($existingArea, "Area was updated successfully!");
        }
        failedResMsg("Area could not be updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($areaId)
    {
        Area::destroy($areaId);
    }
}
