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

    public function edit($id)
    {
        $data = Customer::find($id);

        return view('edit', compact('data'));
    }

    public function customerUpdate(Request $request, $id)
    {
        Customer::find($id)->update($request->all());

        return 'update done';
    }

    public function delete($id)
    {
        Customer::find($id)->delete();
        return 'deleted';
    }
}
