<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tractorservice extends Model
{
    use HasFactory;
    protected $fillable = [
        'service',
        'price',

    ];
}
