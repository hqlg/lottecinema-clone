<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Cinema;
use App\Models\Movie;
use Inertia\Inertia;

class AdminMovieController extends Controller
{
    private $LIST_MOVIE = "admin/pages/Movie/ListPage";
    private $CREATE_MOVIE = "admin/pages/Movie/CreatePage";
    private $EDIT_MOVIE = "admin/pages/Movie/EditPage";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Movies";
        $movies = Movie::all();
        return Inertia::render($this->LIST_MOVIE, compact('title', 'movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Movie";
        $cinemas = Cinema::all();
        return Inertia::render($this->CREATE_MOVIE, compact('title', 'cinemas'));
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
            Movie::create($attributes);
            return redirect()->route('movies.index')->with('successMessage', 'Movie was successfully added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $cinema = $movie->cinema;
        $cinemas = getDataExceptById(Cinema::class, $id);
        $title = "Update movie";
        if ($movie) {
            return Inertia::render($this->EDIT_MOVIE, compact('title', 'movie', 'cinemas', 'cinema'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function update(MovieRequest $request, Movie $movie)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $movie->update($attributes);
            return redirect()->route('movies.index')->with('successMessage', 'Movie was successfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
