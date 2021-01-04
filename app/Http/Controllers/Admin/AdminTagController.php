<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;

class AdminTagController extends Controller
{
    private $LIST_TAG = "admin/pages/Tag/ListPage";
    private $CREATE_TAG = "admin/pages/Tag/CreatePage";
    private $EDIT_TAG = "admin/pages/Tag/EditPage";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $title = "Titles";
        return inertia($this->LIST_TAG, compact('title', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tag Create";
        return inertia($this->CREATE_TAG, compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            Tag::create($validatedRequest);
            return redirect()->route('tags.create')->with('successMessage', 'Tag was successfully added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $title = "Tag Edit";
        return inertia($this->EDIT_TAG, compact('title', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $tag->update($validatedRequest);
            return redirect()->route('tags.index')->with('successMessage', 'Tag was successfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('successMessage', 'Tag was successfully deleted!');
    }
}
