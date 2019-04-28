<?php

namespace App\Http\Controllers;

use App\Http\Services\Paypal;
use App\Models\HistoryRefundAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefundController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->paypal = new Paypal();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $historyrefund = HistoryRefundAccount::get();
        return view('historyrefund',compact('historyrefund'));
    }

    public function refunddetails($id)
    {
        $data = $this->paypal->getTranstion($id);
        $parent_payment = $data->parent_payment;
        $paymentdetail = $this->paypal->getPayment($parent_payment);
        return view('refunddetails', compact('data'));
    }


    public function Refund(Request $request)
    {
        if ($request->idTransaction) {
            $refund = $this->paypal->Refund($request->idTransaction, $request->amount, $request->description, $request->invoice);
            if ($refund) {
                if($request->amount){
                    $amount = $request->amount;
                }else{
                    $amount = $request->originalamount;
                }
                $arr['transactionId'] = $request->idTransaction;
                $arr['amount'] = $amount;
                $arr['reference_user_id'] = auth()->id();
                $arr['status'] = 'refund';
                $arr['description'] = $request->description;
                $arr['invoice'] = $request->invoice;
                $this->createHistoryRefund($arr);
           }
        }

        return redirect('checktransaction?idTransaction=' . $request->idTransaction);
    }

    public function createHistoryRefund($data)
    {
        $history = new HistoryRefundAccount();
        $history->transactionId = $data['transactionId'];
        $history->amount = $data['amount'];
        $history->reference_user_id = $data['reference_user_id'];
        $history->status = $data['status'];
        $history->description = $data['description'];
        $history->invoice = $data['invoice'];
        $history->save();
        return $history;
    }


}
