<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiftCategoryRequest;
use App\Models\GiftCategory;

class AdminGiftCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $giftCategories = GiftCategory::all();
        $title = "Category List";
        return inertia('admin/pages/GiftCategory/ListPage', compact('giftCategories', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Category Create";
        return inertia('admin/pages/GiftCategory/CreatePage', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GiftCategoryRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            GiftCategory::create($attributes);
            return redirect()->route('gift-categories.index')->with('successMessage', 'Gift category was successfully added!');
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
        $title = "Gift category Edit";
        $giftCategory = GiftCategory::find($id);
        return inertia('admin/pages/GiftCategory/EditPage', compact('title', 'giftCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GiftCategoryRequest $request, $id)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $giftCategory = GiftCategory::find($id);
            $attributes = getRequestAddedSlug($validatedRequest);
            $giftCategory->update($attributes);
            return redirect()->route('gift-categories.index')->with('successMessage', 'Gift category was successfully updated!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GiftCategory $giftCategory)
    {
        $giftCategory->delete();
        return redirect()->route('gift-categories.index');
    }
}
