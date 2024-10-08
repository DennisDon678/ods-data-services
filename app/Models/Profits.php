<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profits extends Model
{
    use HasFactory;

    protected $fillable = [
            'plan_type',
            'profit',
    ];
}
