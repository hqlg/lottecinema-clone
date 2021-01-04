<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeatRequest;
use App\Http\Resources\SeatCollection;
use App\Http\Resources\SeatResource;
use App\Models\Seat;

class ApiSeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seats = Seat::all();
        return new SeatCollection($seats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeatRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $newSeat = Seat::create($attributes);
            return (new SeatResource($newSeat))
                ->response()
                ->setStatusCode(201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show(Seat $seat)
    {
        return new SeatResource($seat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function update(SeatRequest $request, Seat $seat)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $seat->update($attributes);
            return new SeatResource($seat);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        $seat->delete();
        return new SeatResource($seat);
    }
}
