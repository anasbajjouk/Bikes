<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {       

        $this->validate($request,[
            'addressline' => 'required',
            'country' => 'required',
            'state' => 'sometimes|string',
            'city' => 'required|string',
            'zip' => 'required',
            'phone' => 'required', 
        ]);
    
       Auth::user()->address()->create([
            'addressline' => ucfirst($request->input('addressline') ),
            'country' => ucfirst($request->input('country') ),
            'state' => ucfirst($request->input('state') ),
            'zip' => ucfirst($request->input('zip') ),
            'city' => ucfirst($request->input('city') ),
            'phone' => $request->input('phone'),
        ]);


        return redirect()->route('checkout.payment')
                            ->with('success', 'Address is Set Successfully. ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
