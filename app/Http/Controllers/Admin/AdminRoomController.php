<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Cinema;
use App\Models\Room;

class AdminRoomController extends Controller
{
    private $LIST_ROOM = "admin/pages/Room/ListPage";
    private $CREATE_ROOM = "admin/pages/Room/CreatePage";
    private $EDIT_ROOM = "admin/pages/Room/EditPage";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        $title = "Room List";
        return inertia($this->LIST_ROOM, compact('title', 'rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Room Create";
        $cinemas = Cinema::all();
        return inertia($this->CREATE_ROOM, compact('title', 'cinemas'));
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
            Room::create($validatedRequest);
            return redirect()->route('rooms.create')->with('successMessage', 'Room was successfully added!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $title = "Room Edit";
        $cinemas = getDataExceptById(Room::class, $room->id);
        return inertia($this->EDIT_ROOM, compact('title', 'cinemas', 'room'));
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
            $room->update();
            return redirect()->route('rooms.index')->with('successMessage', 'Room was successfully updated.');
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
        return redirect()->route('rooms.index')->with('successMessage', 'Room was successfully deleted');
    }
}
