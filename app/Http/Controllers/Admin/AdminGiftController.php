<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiftRequest;
use App\Models\Gift;
use App\Models\GiftCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminGiftController extends Controller
{
    private $MODEL_NAME = 'Gift';
    private $LIST_GIFTS = "admin/pages/Gift/ListPage";
    private $CREATE_GIFT = "admin/pages/Gift/CreatePage";
    private $EDIT_GIFT = "admin/pages/Gift/EditPage";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Areas";
        $gifts = Gift::all();
        return Inertia::render($this->LIST_GIFTS, compact('title', 'gifts')); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Gift";
        $giftCategories = GiftCategory::all();
        return Inertia::render($this->CREATE_GIFT, compact('title', 'giftCategories'));
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
            Gift::create($attributes);
            return redirect()->route('gifts.index')->with('successMessage', 'Gift was successfully added!');
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
        $gift = Gift::findOrFail($id);
        if ($gift) {
            $giftCategory = $gift->giftCategory;
            $title = "Edit Gift";
            $gifts = Gift::all();
            return inertia($this->EDIT_GIFT, compact('gift', 'giftCategory', 'title', 'gifts'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GiftRequest $request, Gift $gift)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $gift->update($attributes);
            return redirect()->route('gifts.index')->with('successMessage', 'Gift was successfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gift $gift)
    {
        $gift->delete();
        return back();
    }
}
