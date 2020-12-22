<?php

namespace App\Http\Controllers;

use App\Models\SeatPosition;
use Illuminate\Http\Request;

class SeatPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(SeatPosition::all());
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
            'row' => 'required',
            'column' => 'required'
        ]);
        if ($validated) {
            $newSeatPosition = SeatPosition::create($request->all());
            return response()->json($newSeatPosition, 201);
        }
        return response()->json(['error' => "Seat position cannot be created!"], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeatPosition  $area
     * @return \Illuminate\Http\Response
     */
    public function show($seatPositionId)
    {
        if ($seatPositionId) {
        return response()->json(SeatPosition::find($seatPositionId), 200);
        }
        return response()->json(['error' => "Seat position not found!"], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeatPosition  $area
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
     * @param  \App\Models\SeatPosition  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$seatPositionId)
    {
        $existingSeatPosition = SeatPosition::findOrFail($seatPositionId);
        $validated = $request->validate([
            'row' => 'required',
            'column' => 'required',
        ]);
        if ($existingSeatPosition && $validated) {
            $existingSeatPosition->update($request->all());
            return response()->json($existingSeatPosition);
        }
        return response()->json(['error' => 'Seat position cannot be updated',404]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeatPosition  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($seatPositionId)
    {
        SeatPosition::destroy($seatPositionId);
    }
}
