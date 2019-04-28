<?php

namespace App;

use App\Models\PayPalAccount;

class CUtil
{
    public static function getPaypalAccount()
    {
        return $paypal= PayPalAccount::get();
    }

}
