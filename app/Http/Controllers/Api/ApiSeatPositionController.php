<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeatPositionRequest;
use App\Http\Resources\SeatPositionCollection;
use App\Http\Resources\SeatPositionResource;
use App\Models\SeatPosition;

class ApiSeatPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seatPositions = SeatPosition::all();
        return new SeatPositionCollection($seatPositions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeatPositionRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $newSeatPosition = SeatPosition::create($validatedRequest);
            return (new SeatPositionResource($newSeatPosition))
                ->response()
                ->setStatusCode(201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeatPosition  $seatPosition
     * @return \Illuminate\Http\Response
     */
    public function show(SeatPosition $seatPosition)
    {
        return new SeatPositionResource($seatPosition);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SeatPosition  $seatPosition
     * @return \Illuminate\Http\Response
     */
    public function update(SeatPositionRequest $request, SeatPosition $seatPosition)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $seatPosition->update($validatedRequest);
            return new SeatPositionResource($seatPosition);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeatPosition  $seatPosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeatPosition $seatPosition)
    {
        $seatPosition->delete();
        return new SeatPositionResource($seatPosition);
    }
}
