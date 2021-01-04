<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiftCategoryRequest;
use App\Http\Resources\GiftCategoryCollection;
use App\Http\Resources\GiftCategoryResource;
use App\Models\GiftCategory;

class ApiGiftCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $giftCategories = GiftCategory::all();
        return new GiftCategoryCollection($giftCategories);
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
            $newCinema = GiftCategory::create($attributes);
            return (new GiftCategoryResource($newCinema))
                ->response()
                ->setStatusCode(201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GiftCategory  $cinema
     * @return \Illuminate\Http\Response
     */
    public function show(GiftCategory $giftCategory)
    {
        return new GiftCategoryResource($giftCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GiftCategory  $giftCategory
     * @return \Illuminate\Http\Response
     */
    public function update(GiftCategoryRequest $request, GiftCategory $giftCategory)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $giftCategory->update($attributes);
            return new GiftCategoryResource($giftCategory);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GiftCategory  $cinema
     * @return \Illuminate\Http\Response
     */
    public function destroy(GiftCategory $cinema)
    {
        $cinema->delete();
        return new GiftCategoryResource($cinema);
    }
}
