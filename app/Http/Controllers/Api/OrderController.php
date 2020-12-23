<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Order::all());
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
            'total_price' => 'required',
            'customer_id' => 'required',
            'order_detail_id' => 'required'
        ]);
        if ($validated) {
            $newOrder = Order::create($request->all());
            return response()->json($newOrder, 201);
        }
        return response()->json(['error' => "Order cannot be created!"], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $area
     * @return \Illuminate\Http\Response
     */
    public function show($orderId)
    {
        if ($orderId) {
        return response()->json(Order::find($orderId), 200);
        }
        return response()->json(['error' => "Order not found!"], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $area
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
     * @param  \App\Models\Order  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$orderId)
    {
        $existingOrder = Order::findOrFail($orderId);
        $validated = $request->validate([
            'order_detail_id' => 'required',
            'customer_id' => 'required',
            'total_price' => 'required'
        ]);
        if ($existingOrder && $validated) {
            $existingOrder->update($request->all());
            return response()->json($existingOrder);
        }
        return response()->json(['error' => 'Order cannot be updated',404]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($orderId)
    {
        Order::destroy($orderId);
    }   //
}
