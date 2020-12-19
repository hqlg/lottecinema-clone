<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CenimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Cinema::all());
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
        $validated = $request->validate([
           'area_id' => 'required',
           'name' => 'required|string'
        ]);
        if ($validated) {
            $newCenima = Cinema::create($request->all());
            return response()->json($newCenima);
        }
        return response()->json(['error' => 'Cinema cannot be created'],404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cinema  $cenima
     * @return \Illuminate\Http\Response
     */
    public function show(Cinema $cenimaId)
    {
        if ($cenimaId) {
            $existingCenima = Cinema::find($cenimaId);
            return response()->json($existingCenima);
        }
        return response()->json(['error' => 'Cinema not found!',404]);
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cinema  $cenima
     * @return \Illuminate\Http\Response
     */
    public function edit(Cinema $cenimaId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cinema  $cenimaId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cinema $cenimaId)
    {
        //
        $existingCenima = Cinema::find($cenimaId) ;
        $validated = $request->validate([
            'area_id' => 'required',
            'name' => 'required|string'
        ]);
        if ($existingCenima && $validated) {
            $existingCenima->update($request->all());
            return response()->json($existingCenima);
        }
        return response()->json(['error' => "Cinema cannot be updated",404]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cinema  $cenimaId
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cinema $cenimaId)
    {
        Cinema::destroy($cenimaId);
    }
}
