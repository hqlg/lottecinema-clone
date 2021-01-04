<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderDetailRequest;
use App\Http\Resources\OrderDetailCollection;
use App\Http\Resources\OrderDetailResource;
use App\Models\OrderDetail;

class ApiOrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderDetails = OrderDetail::all();
        return new OrderDetailCollection($orderDetails);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderDetailRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $newOrderDetail = OrderDetail::create($validatedRequest);
            return (new OrderDetailResource($newOrderDetail))
                ->response()
                ->setStatusCode(201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        return new OrderDetailResource($orderDetail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(OrderDetailRequest $request, OrderDetail $orderDetail)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $orderDetail->update($validatedRequest);
            return new OrderDetailResource($orderDetail);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        $orderDetail->delete();
        return new OrderDetailResource($orderDetail);
    }
}
