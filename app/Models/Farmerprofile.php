<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmerprofile extends Model
{
    use HasFactory;
    protected $fillable = [

        'uuid',
        'fname',
        'mname',
        'exname',
        'gender',
        'houseno',
        'street',
        'brgy',
        'city',
        'province',
        'contact',
        'birthdate',
        'birthplace',
    ];
}
