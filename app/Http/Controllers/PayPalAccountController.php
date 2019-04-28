<?php

namespace App\Http\Controllers;

use App\Models\PayPalAccount;
use Illuminate\Http\Request;

class PayPalAccountController extends Controller
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
        $paypalaccount = PayPalAccount::get();
        return view('paypal.index', compact('paypalaccount'));
    }
    public function show($id)
    {
        $paypalaccount = PayPalAccount::find($id);
        return view('paypal.edit', compact('paypalaccount'));
    }
    public function edit($id, Request $request)
    {
        $paypalaccount = PayPalAccount::find($id);
        $paypalaccount->email = $request->email;
        $paypalaccount->clientId = $request->clientId;
        $paypalaccount->clientSecret = $request->clientSecret;
        $paypalaccount->save();
        return back();
    }
    public function create(Request $request)
    {
        $paypalaccount = new PayPalAccount();
        $paypalaccount->email = $request->email;
        $paypalaccount->clientId = $request->clientId;
        $paypalaccount->clientSecret = $request->clientSecret;
        $paypalaccount->save();
        return back();
    }

}
