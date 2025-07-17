<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    protected $primaryKey = 'log_id';
    public $timestamps = false; // since you have your own `date` column

    protected $fillable = [
        'transaction_id',
        'transaction_type',
        'action',
        'paid_status_before',
        'paid_status_after',
        'amount_paid',
        'due_amount',
        'performed_by',
        'description',
        'date',
    ];
}
