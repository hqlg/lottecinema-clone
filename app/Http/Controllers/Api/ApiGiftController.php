<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiftRequest;
use App\Http\Resources\GiftCollection;
use App\Http\Resources\GiftResource;
use App\Models\Gift;
use Illuminate\Http\Request;

class ApiGiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts = Gift::all();
        return new GiftCollection($gifts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GiftRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $newGift = Gift::create($attributes);
            return (new GiftCollection($newGift))
                ->response()
                ->setStatusCode(201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function show(Gift $gift)
    {
        return new GiftResource($gift);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function update(GiftRequest $request, Gift $gift)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $gift->update($attributes);
            return new GiftResource($gift);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gift $gift)
    {
        $gift->delete();
        return new GiftResource($gift);
    }
}
