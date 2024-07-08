<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airtime_to_cash extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'to',
        'from',
        'networks',
        'amount',
        'bank_name',
        'account_number',
        'transaction_id',
        'status',
        'account_name',
    ];
}
