<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return new CustomerCollection($customers);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $passwordHashed = Hash::make($validatedRequest['password']);
            $validatedRequest['password'] = $passwordHashed;
            $attributes = getRequestAddedSlug($validatedRequest);
            $newCustomer = Customer::create($attributes);
            return (new CustomerResource($newCustomer))
                ->response()
                ->setStatusCode(201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $validatedRequest = $request->validated();
        if ($validatedRequest) {
            $validatedRequest['password'] = Hash::make($validatedRequest['password']);
            $attributes = getRequestAddedSlug($validatedRequest);
            $customer->update($attributes);
            return new CustomerResource($customer);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return new CustomerResource($customer);
    }
}
