<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preorder extends Model
{
    use HasFactory;

    protected $fillable = [
        'network_id',
        'price',
        'validity',
        'size',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
