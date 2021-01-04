<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Http\Resources\RoomCollection;
use App\Http\Resources\RoomResource;
use App\Models\Room;

class ApiRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return new RoomCollection($rooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $newRoom = Room::create($attributes);
            return (new RoomResource($newRoom))
                ->response()
                ->setStatusCode(201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return new RoomResource($room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, Room $room)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $room->update($attributes);
            return new RoomResource($room);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return new RoomResource($room);
    }
}
