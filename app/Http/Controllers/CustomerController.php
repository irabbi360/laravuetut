<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer');
    }

    public function save(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
           'name' => 'required'
        ]);

        $name = $request->name;

        Customer::create([
            'name' => $name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
    }

    public function customerList()
    {
        $data = Customer::all();

        return $data;
    }
}
