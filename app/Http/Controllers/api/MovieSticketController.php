<?php

namespace App\Http\Controllers;

use App\Models\MovieSticket;
use Illuminate\Http\Request;

class MovieSticketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(MovieSticket::all());
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
            'seat_id' => 'required',
            'movie_id' => 'required'
        ]);
        if ($validate) {
            $newCenima = MovieSticket::create($request->all());
            return response()->json($newCenima);
        }
        return response()->json(['error' => 'Movie sticket cannot be created'],404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MovieSticket  $cenima
     * @return \Illuminate\Http\Response
     */
    public function show($movieSticketId)
    {
        if ($movieSticketId) {
            $existingMovieSticket = MovieSticket::find($movieSticketId);
            return response()->json($existingMovieSticket);
        }
        return response()->json(['error' => 'Movie sticket not found!',404]);
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MovieSticket  $cenima
     * @return \Illuminate\Http\Response
     */
    public function edit($movieSticketId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MovieSticket  movie$movieSticketId$
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$movieSticketId)
    {
        //
        $existingMovieSticket = MovieSticket::find($movieSticketId) ;
        $validated = $request->validate([
            'seat_id' => 'required',
            'movie_id' => 'required',
        ]);
        if ($existingMovieSticket && $validated) {
            $existingMovieSticket->update($request->all());
            return response()->json($existingMovieSticket);
        }
        return response()->json(['error' => "Movie sticket cannot be updated",404]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MovieSticket  movie$movieSticketId$
     * @return \Illuminate\Http\Response
     */
    public function destroy($movieSticketId)
    {
        MovieSticket::destroy($movieSticketId);
    }
}
