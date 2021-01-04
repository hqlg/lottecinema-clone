<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeatTypeRequest;
use App\Http\Resources\SeatTypeCollection;
use App\Http\Resources\SeatTypeResource;
use App\Models\SeatType;

class ApiSeatTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seatTypes = SeatType::all();
        return new SeatTypeCollection($seatTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeatTypeRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $newSeatType = SeatType::create($validatedRequest);
            return new SeatTypeResource($newSeatType);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeatType  $seatType
     * @return \Illuminate\Http\Response
     */
    public function show(SeatType $seatType)
    {
        return new SeatTypeResource($seatType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SeatType  $seatType
     * @return \Illuminate\Http\Response
     */
    public function update(SeatTypeRequest $request, SeatType $seatType)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $seatType->update($validatedRequest);
            return new SeatTypeResource($seatType);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeatType  $seatType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeatType $seatType)
    {
        $seatType->delete();
        return new SeatTypeResource($seatType);
    }
}
