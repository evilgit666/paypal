<?php
/**
 * Created by PhpStorm.
 * User: To Nguyen
 * Date: 4/25/2019
 * Time: 10:25 AM
 */

namespace App\Http\Services;

use App\Models\PayPalAccount;
use App\User;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\Refund;
use PayPal\Api\Sale;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class Paypal
{
    private $apiContext;

    public function changeAccount($id)
    {
        $user = User::find(auth()->id());
        $user->id_paypal = $id;
        $user->save();
        return back();
    }

    public function getTranstiontest($id)
    {
        $this->set();
        return Sale::get($id, $this->apiContext);
    }

    public function set()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $this->setAccount()->clientId,
                $this->setAccount()->clientSecret
            )
        );

        $arr = config('paypal');
        $arr['mode'] = 'sandbox';
        $this->apiContext->setConfig(
            $arr
        );

    }

    public function setAccount()
    {
        $paypal = PayPalAccount::find(auth()->user()->id_paypal);
        if (!$paypal) {
            $paypal = PayPalAccount::first();
        }
        return $paypal;

    }

    public function getPaymenttest($id)
    {
        $this->set();
        return Payment::get($id, $this->apiContext);
    }

    public function Refund($id, $amount, $des, $invoice)
    {
        $this->set();
        $amt = new Amount();
        $amt->setTotal($amount)
            ->setCurrency('USD');

        $refund = new Refund();
        if ($amount) {
            $refund->setAmount($amt)->setDescription($des)->setInvoiceNumber($invoice);
        }
        $sale = new Sale();
        $sale->setId($id);
        $sale->refund($refund, $this->apiContext);
        return $sale;
    }

    public function getTranstion($id)
    {
        $this->set();
        return Sale::get($id, $this->apiContext);
    }

    public function getPayment($id)
    {
        $this->set();
        try {
            return Payment::get($id, $this->apiContext);
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            return $ex;
        }

    }

    public function DetailInvoice()
    {
        $this->set();
        $curl = curl_init('https://api.sandbox.paypal.com/v1/payments/payment/PAY-6BN86246KV184705VLQ3P3NA');
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $this->apiContext->getCredential()->getAccessToken(array()),
            'Accept: application/json',
            'Content-Type: application/json'
        ));
        $response = curl_exec($curl);
        return $response;
    }

    public function getListTransactions()
    {
        $this->set();
        $url = 'https://api.sandbox.paypal.com/v1/reporting/transactions?start_date=2019-01-01T00:00:00-0700&end_date=2019-01-25T23:59:59-0700&fields=all&page_size=100&page=1';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $this->apiContext->getCredential()->getAccessToken(array()),
            'Accept: application/json',
            'Content-Type: application/json'
        ));
        $response = curl_exec($curl);
        $result = json_decode($response, true);
        return $result;

    }


}
