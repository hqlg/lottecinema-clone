<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(OrderDetail::all());
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
            'movie_sticket_id' => 'required',
            'gift_id' => 'required'
        ]);
        if ($validated) {
            $newOrderDetail = OrderDetail::create($request->all());
            return response()->json($newOrderDetail, 201);
        }
        return response()->json(['error' => "Order detail cannot be created!"], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $area
     * @return \Illuminate\Http\Response
     */
    public function show( $orderDetailId)
    {
        if ($orderDetailId) {
        return response()->json(OrderDetail::find($orderDetailId), 200);
        }
        return response()->json(['error' => "Order detail not found!"], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetail  $area
     * @return \Illuminate\Http\Response
     */
    public function edit( $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetail  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$orderDetailId)
    {
        $existingOrderDetail = OrderDetail::findOrFail($orderDetailId);
        $validated = $request->validate([
            'movie_sticket_id' => 'required',
            'gift_id' => 'required',
        ]);
        if ($existingOrderDetail && $validated) {
            $existingOrderDetail->update($request->all());
            return response()->json($existingOrderDetail);
        }
        return response()->json(['error' => 'Order detail cannot be updated',404]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($orderDetailId)
    {
        OrderDetail::destroy($orderDetailId);
    }
}
