<?php

namespace App\Http\Controllers;

use App\Models\GiftCategory;
use Illuminate\Http\Request;

class GiftCategoryController extends Controller
{
     /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(GiftCategory::all());
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
        $validated = $request->validate([
            'name' => 'required|string',
        ]);
        if ($validated) {
            $newGiftCategory = GiftCategory::create($request->all());
            return response()->json($newGiftCategory, 201);
        }
        return response()->json(['error' => "Gift category cannot be created!"], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GiftCategory  $area
     * @return \Illuminate\Http\Response
     */
    public function show(GiftCategory $giftCategoryId)
    {
        if ($giftCategoryId) {
        return response()->json(GiftCategory::find($giftCategoryId), 200);
        }
        return response()->json(['error' => "Gift category not found!"], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GiftCategory  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(GiftCategory $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GiftCategory  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GiftCategory $giftCategoryId)
    {
        $existingGiftCategory = GiftCategory::findOrFail($giftCategoryId);
        $validated = $request->validate([
            'price' => 'required',
            'name' => 'required|string',
            'gift_category_id' => 'required'
        ]);
        if ($existingGiftCategory && $validated) {
            $existingGiftCategory->update($request->all());
            return response()->json($existingGiftCategory);
        }
        return response()->json(['error' => 'Gift category cannot be updated',404]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GiftCategory  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(GiftCategory $giftCategoryId)
    {
        GiftCategory::destroy($giftCategoryId);
    }
}
