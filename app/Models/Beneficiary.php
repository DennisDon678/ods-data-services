<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'number',
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id'
    ];
}
