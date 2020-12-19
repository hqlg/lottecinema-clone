<?php

namespace App\Http\Controllers;

use App\Models\TypeSeat;
use Illuminate\Http\Request;

class TypeSeatController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(TypeSeat::all());
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
            'pirce' => 'required',
            'name' => 'required|string'
        ]);
        if ($validated) {
            $newTypeSeat = TypeSeat::create($request->all());
            return response()->json($newTypeSeat, 201);
        }
        return response()->json(['error' => "Type seat cannot be created!"], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeSeat  $area
     * @return \Illuminate\Http\Response
     */
    public function show(TypeSeat $seatPositionId)
    {
        if ($seatPositionId) {
        return response()->json(TypeSeat::find($seatPositionId), 200);
        }
        return response()->json(['error' => "Type seat not found!"], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeSeat  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeSeat $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeSeat  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeSeat $seatPositionId)
    {
        $existingTypeSeat = TypeSeat::findOrFail($seatPositionId);
        $validated = $request->validate([
            'price' => 'required',
            'name' => 'required|string',
        ]);
        if ($existingTypeSeat && $validated) {
            $existingTypeSeat->update($request->all());
            return response()->json($existingTypeSeat);
        }
        return response()->json(['error' => 'Type seat cannot be updated',404]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeSeat  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeSeat $seatPositionId)
    {
        TypeSeat::destroy($seatPositionId);
    }
}
