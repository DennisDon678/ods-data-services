<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preordered extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'number',
        'size',
        'status',
        'network',
        'reference',
        'amount',
    ];
}
