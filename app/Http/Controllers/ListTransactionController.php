<?php

namespace App\Http\Controllers;

use App\Http\Services\Paypal;
use Illuminate\Http\Request;

class ListTransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->paypal = new Paypal();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $list = $this->paypal->getListTransactions($request->date);
        $listtransaction = $list;
        $cache = $request;
        return view('listtransactions', compact('listtransaction','cache'));
    }


}
