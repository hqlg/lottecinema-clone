<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeatRequest;
use App\Models\Room;
use App\Models\Seat;

class AdminSeatController extends Controller
{
    private $LIST_SEAT = "admin/pages/Seat/ListPage";
    private $CREATE_SEAT = "admin/pages/Seat/CreatePage";
    private $EDIT_SEAT = "admin/pages/Seat/EditPage";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Seat List";
        $seats = Seat::all();
        return inertia($this->LIST_SEAT, compact('title', 'seats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Seat Create";
        $rooms = Room::all();
        return inertia($this->CREATE_SEAT, compact('title', 'rooms'));
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
            Seat::create($validatedRequest);
            return redirect()->route('seats.create')->with('successMessage', 'Seat was successfully added!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function edit(Seat $seat)
    {
        $title = "Seat Edit";
        $room = $seat->room;
        $rooms = getDataExceptById(Seat::class, $seat->id);
        return inertia($this->EDIT_SEAT, compact('title', 'seat', 'rooms', 'room'));
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
            $seat->update($validatedRequest);
            return redirect()->route('seats.index')->with('successMessage', 'Seat was successfully updated!');
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
        return redirect()->route('seats.index')->with('successMessage', 'Seat was successfully deleted');
    }
}
