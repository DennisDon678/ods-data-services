<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pending_manual_fund extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amount',
        'sender_name',
        'sender_bank',
    ];
}
