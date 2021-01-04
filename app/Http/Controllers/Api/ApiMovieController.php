<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Resources\MovieCollection;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class ApiMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return new MovieCollection($movies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $newMovie = Movie::create($attributes);
            return (new MovieResource($newMovie))
                ->response()
                ->setStatusCode(201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return new MovieResource($movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(MovieRequest $request, Movie $movie)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $movie->update($attributes);
            return new MovieResource($movie);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return new MovieResource($movie);
    }
}
