<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Area::all());
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
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:areas|string'
        ]);
        if ($validate) {
            $newArea = Area::create($request->all());
            return response()->json($newArea, 201);
        }
        return response()->json(['error' => "Area cannot be created!"], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show($areaId)
    {
        if ($areaId) {
        return response()->json(Area::find($areaId), 200);
        }
        return response()->json(['error' => "Area not found!"], 404);
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
    public function update(Request $request,$areaId)
    {
        $existingArea = Area::findOrFail($areaId);
        $validate = $request->validate([
            'name' => 'required|string|unique:areas'
        ]);
        if ($existingArea && $validate) {
            $existingArea->update($request->all());
            return response()->json($existingArea);
        }
        return response()->json(['error' => 'Area cannot be updated',404]);
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
