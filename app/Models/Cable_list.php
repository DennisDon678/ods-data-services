<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cable_list extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'cable_id',
    ];
}
