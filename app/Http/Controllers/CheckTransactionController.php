<?php

namespace App\Http\Controllers;

use App\Http\Services\Paypal;
use Illuminate\Http\Request;

class CheckTransactionController extends Controller
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
        if ($request->idTransaction) {
            $data = $this->paypal->getTranstion($request->idTransaction);
            $parent_payment = $data->parent_payment;
            $paymentdetail = $this->paypal->getPayment($parent_payment);
        } else {
            $data = '';
            $paymentdetail = '';
        }
        return view('checktransaction', compact('data', 'paymentdetail'));
    }



}
