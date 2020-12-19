<?php

namespace App\Http\Controllers;

use App\Models\Cenima;
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
        return response()->json(Cenima::all());
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
            $newCenima = Cenima::create($request->all());
            return response()->json($newCenima);
        }
        return response()->json(['error' => 'Cenima cannot be created'],404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cenima  $cenima
     * @return \Illuminate\Http\Response
     */
    public function show(Cenima $cenimaId)
    {
        if ($cenimaId) {
            $existingCenima = Cenima::find($cenimaId);
            return response()->json($existingCenima);
        }
        return response()->json(['error' => 'Cenima not found!',404]);
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cenima  $cenima
     * @return \Illuminate\Http\Response
     */
    public function edit(Cenima $cenimaId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cenima  $cenimaId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cenima $cenimaId)
    {
        //
        $existingCenima = Cenima::find($cenimaId) ;
        $validated = $request->validate([
            'area_id' => 'required',
            'name' => 'required|string'
        ]);
        if ($existingCenima && $validated) {
            $existingCenima->update($request->all());
            return response()->json($existingCenima);
        }
        return response()->json(['error' => "Cenima cannot be updated",404]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cenima  $cenimaId
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cenima $cenimaId)
    {
        Cenima::destroy($cenimaId);
    }
}
