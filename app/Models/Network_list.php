<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network_list extends Model
{
    use HasFactory;

    protected $fillable = ['label','network_id'];
}
