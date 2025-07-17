<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
    'account_code',
    'account_name',
    'account_type',
    'initial_balance',
    'total_balance',
    'note',
];
}
