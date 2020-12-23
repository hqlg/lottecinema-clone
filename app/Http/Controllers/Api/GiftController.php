<?php

namespace App\Http\Controllers\Api;

use App\Models\Gift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GiftController extends Controller
{
     /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Gift::all());
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
    public function store($request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'gift_category_id' => 'required',
            'price' => 'required',
        ]);
        if ($validated) {
            $newGift = Gift::create($request->all());
            return response()->json($newGift, 201);
        }
        return response()->json(['error' => "Gift cannot be created!"], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gift  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Gift $giftId)
    {
        if ($giftId) {
        return response()->json(Gift::find($giftId), 200);
        }
        return response()->json(['error' => "Gift not found!"], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gift  $area
     * @return \Illuminate\Http\Response
     */
    public function edit($area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gift  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$giftId)
    {
        $existingGift = Gift::findOrFail($giftId);
        $validated = $request->validate([
            'price' => 'required',
            'name' => 'required|string',
            'gift_category_id' => 'required'
        ]);
        if ($existingGift && $validated) {
            $existingGift->update($request->all());
            return response()->json($existingGift);
        }
        return response()->json(['error' => 'Gift cannot be updated',404]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gift  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($giftId)
    {
        Gift::destroy($giftId);
    }   //
}
