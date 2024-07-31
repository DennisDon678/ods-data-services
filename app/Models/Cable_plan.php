<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cable_plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'plan_name',
        'cable_id',
        'price',
    ];
}
