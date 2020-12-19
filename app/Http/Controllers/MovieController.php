<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Movie::all());
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
        $validate = $request->validate([
            'required',
            'min:3',
            'max:100',
        ]);
        if ($validate) {
            $newCenima = Movie::create($request->all());
            return response()->json($newCenima);
        }
        return response()->json(['error' => 'Movie cannot be created'],404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $cenima
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $cenimaId)
    {
        if ($cenimaId) {
            $existingCenima = Movie::find($cenimaId);
            return response()->json($existingCenima);
        }
        return response()->json(['error' => 'Movie not found!',404]);
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $cenima
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $cenimaId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $cenimaId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $cenimaId)
    {
        //
        $existingCenima = Movie::find($cenimaId) ;
        if ($existingCenima) {
            $existingCenima->update($request->all());
            return response()->json($existingCenima);
        }
        return response()->json(['error' => "Movie cannot be updated",404]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $cenimaId
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $cenimaId)
    {
        Movie::destroy($cenimaId);
    }
}
