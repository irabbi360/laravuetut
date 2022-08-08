<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    // unique number generate
    function invoiceNumber()
        {
            $latest = App\Order::latest()->first();

            if (! $latest) {
                return 'arm0001';
            }

            $string = preg_replace("/[^0-9\.]/", '', $latest->invoice_number);

            return 'arm' . sprintf('%04d', $string+1);
        }
}
