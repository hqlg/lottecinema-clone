<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Customer::all());
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
            'email' => 'required|email',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);
        if ($validated) {
            $newCustomer = Customer::create($request->all());
            return response()->json($newCustomer, 201);
        }
        return response()->json(['error' => "Customer cannot be created!"], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $area
     * @return \Illuminate\Http\Response
     */
    public function show($customerId)
    {
        if ($customerId) {
        return response()->json(Customer::find($customerId), 200);
        }
        return response()->json(['error' => "Customer not found!"], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $area
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
     * @param  \App\Models\Customer  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customerId)
    {
        $existingCustomer = Customer::findOrFail($customerId);
        $validated = $request->validate([
            'price' => 'required',
            'name' => 'required|string',
        ]);
        if ($existingCustomer && $validated) {
            $existingCustomer->update($request->all());
            return response()->json($existingCustomer);
        }
        return response()->json(['error' => 'Customer cannot be updated',404]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($customerId)
    {
        Customer::destroy($customerId);
    }
}
