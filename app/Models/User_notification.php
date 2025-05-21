<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'message',
        'type',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
