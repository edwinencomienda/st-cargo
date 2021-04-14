<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmerparttwo extends Model
{
    use HasFactory;
    protected $fillable = [

        'uuid',
        'livelihood',
        'farmactivity',
        'othercrop',
        'livestock',
        'poultry',
        'kindwork',
        'otherwork',
        'fishwork',
        'otherfish',
        'farmgross',
        'nonfarmgross',

    ];
}
