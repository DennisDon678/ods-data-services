<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Tag extends Model
{
    use HasFactory;
    // declare table
    protected $table = 'user_tags';

    protected $fillable = [
        'user_id',
        'tag',
    ];
}
