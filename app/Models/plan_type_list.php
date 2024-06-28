<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan_type_list extends Model
{
    use HasFactory;

    protected $fillable = [
        'network_id',
        'plan_type'
    ];
}
