<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class HistoryRefundAccount extends Model
{
    protected $table = 'refund_payments';

    public function user()
    {
        return $this->belongsTo('App\User','reference_user_id','id');
    }

}

