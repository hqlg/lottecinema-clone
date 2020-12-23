<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Seat::all());
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
            'seat_locate_id' => 'required',
            'type_seat' => 'required'
        ]);
        if ($validated) {
            $newSeat = Seat::create($request->all());
            return response()->json($newSeat, 201);
        }
        return response()->json(['error' => "Seat cannot be created!"], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seat  $area
     * @return \Illuminate\Http\Response
     */
    public function show( $seatId)
    {
        if ($seatId) {
        return response()->json(Seat::find($seatId), 200);
        }
        return response()->json(['error' => "Seat not found!"], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seat  $area
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
     * @param  \App\Models\Seat  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$seatId)
    {
        $existingSeat = Seat::findOrFail($seatId);
        $validated = $request->validate([
            'seat_locate_id' => 'required',
            'type_seat_id' => 'required',
        ]);
        if ($existingSeat && $validated) {
            $existingSeat->update($request->all());
            return response()->json($existingSeat);
        }
        return response()->json(['error' => 'Seat cannot be updated',404]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seat  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($seatId)
    {
        Seat::destroy($seatId);
    }
}
