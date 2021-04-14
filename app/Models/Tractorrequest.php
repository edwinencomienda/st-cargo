<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tractorrequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'tractor_service',
        'brgylocation',
        'payamount',
        'hectare',
        'approvedby',
    ];
}
