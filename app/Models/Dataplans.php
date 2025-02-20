<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataplans extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_id',
        'price',
        'plan_id',
        'validity',
        'size',
    ];

    protected $hidden =[
        'created_at',
        'updated_at'
    ];
}
