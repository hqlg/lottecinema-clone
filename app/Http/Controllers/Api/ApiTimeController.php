<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimeRequest;
use App\Http\Resources\TimeCollection;
use App\Http\Resources\TimeResource;
use App\Models\Time;

class ApiTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Time::all();
        return new TimeCollection($times);
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
            $newTime = Time::create($validatedRequest);
            return (new TimeResource($newTime))
                ->response()
                ->setStatusCode(201);
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
        return new TimeResource($time);
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
            return new TimeResource($time);
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
        return new TimeResource($time);
    }
}
