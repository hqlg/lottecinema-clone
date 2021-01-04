<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimeRequest;
use App\Models\Time;

class AdminTimeController extends Controller
{
    private $LIST_TIME = "admin/pages/Time/ListPage";
    private $CREATE_TIME = "admin/pages/Time/CreatePage";
    private $EDIT_TIME = "admin/pages/Time/EditPage";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Time::all();
        $title = "Times";
        return inertia($this->LIST_TIME, compact('times', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Time Create";
        return inertia($this->CREATE_TIME, compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            Time::create($validatedRequest);
            return redirect()->route('times.create')->with('successMessage', 'Time was successfully added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function show(Time $time)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function edit(Time $time)
    {
        $title = "Time Edit";
        return inertia($this->EDIT_TIME, compact('title', 'time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function update(TimeRequest $request, Time $time)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $time->update($validatedRequest);
            return redirect()->route('times.index')->with('successMessage', 'Time was succesfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function destroy(Time $time)
    {
        $time->delete();
        return redirect()->route('times.index')->with('successMessage', 'Time was successfully deleted!');
    }
}
