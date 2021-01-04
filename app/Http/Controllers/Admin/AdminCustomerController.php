<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class AdminCustomerController extends Controller
{
    private $LIST_CUSTOMER = "admin/pages/Customer/ListPage";
    private $CREATE_CUSTOMER = "admin/pages/Customer/CreatePage";
    private $EDIT_CUSTOMER = "admin/pages/Customer/EditPage";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        $title = "Customer List";
        return inertia($this->LIST_CUSTOMER, compact('title', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Customer Create";
        return inertia($this->CREATE_CUSTOMER, compact('title'));
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
            $attributes = getRequestAddedSlug($validatedRequest);
            $attributes['password'] = $validatedRequest['password'];
            Customer::create($attributes);
            return redirect()->route('customers.index')->with('successMessage', 'Customer was successfully added!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $title = "Customer Edit";
        return inertia($this->EDIT_CUSTOMER, compact('title', 'customer'));
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
        $validatedRequest = $request->validated($request);
        if ($validatedRequest) {
            $attributes = getRequestAddedSlug($validatedRequest);
            $attributes['password'] = Hash::make($validatedRequest['password']);
            $customer->update($attributes);
            return redirect()->route('customers.index')->with('successMessage', 'Customer was successfully updated!');
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
        return redirect()->route('customers.index')->with('successMessage', 'Customer was successfully deleted!');
    }
}
