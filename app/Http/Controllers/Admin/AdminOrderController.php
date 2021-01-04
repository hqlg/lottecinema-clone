<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    private $LIST_ORDER = "admin/pages/Order/ListPage";
    private $CREATE_ORDER = "admin/pages/Order/CreatePage";
    private $EDIT_ORDER = "admin/pages/Order/EditPage";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Order List";
        $orders = Order::all();
        return inertia($this->LIST_ORDER, compact('title', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Order Create";
        $customers = Customer::all();
        return inertia($this->CREATE_ORDER, compact('title', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            Order::create($validatedRequest);
            return redirect()->route('orders.create')->with('successMessage', 'Order was successfully created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $title = "Order Create";
        $customer = $order->customer;
        $customers = getDataExceptById(Customer::class, $customer->id);
        return inertia($this->EDIT_ORDER, compact('title', 'customers', 'customer', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $order->update($validatedRequest);
            return redirect()->route('orders.index')->with('successMessage', 'Order was successfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('successMessage', 'Order was successfully deleted!');
    }
}
