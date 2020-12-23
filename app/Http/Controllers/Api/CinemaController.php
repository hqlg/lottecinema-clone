<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CinemaRequest;
use App\Models\Cinema;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        successfulResData(Cinema::all());
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
    public function store(CinemaRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {
            $newCenima = Cinema::create($request->all());
            successfulResStore($newCenima, "Cinema was created successfully!");
        }
        failedResMsg("Cinema could be created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cinema  $cenima
     * @return \Illuminate\Http\Response
     */
    public function show($cenimaId)
    {
        if ($cenimaId) {
            $existingCenima = Cinema::find($cenimaId);
            successfulResData($existingCenima);
        }
        failedResMsg("Cinema not found!");
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cinema  $cenima
     * @return \Illuminate\Http\Response
     */
    public function edit($cenimaId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cinema  $cenimaId
     * @return \Illuminate\Http\Response
     */
    public function update(CinemaRequest $request, $cenimaId)
    {
        $existingCenima = Cinema::find($cenimaId);
        $validated = $request->validated();
        if ($existingCenima && $validated) {
            $existingCenima->update($request->all());
            successfulRes($existingCenima, "Cinema was updated successfully!");
        }
        failedResMsg("Cinema could not be updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cinema  $cenimaId
     * @return \Illuminate\Http\Response
     */
    public function destroy($cinemaId)
    {
        if ($cinemaId) {
            Cinema::destroy($cinemaId);
            successfulResMsg("Cinema has been successfully deleted");
        }
        failedResMsg("Cinema with ${$cinemaId} does not exist");
    }
}
