<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmerpersonal extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'education',
        'pwd',
        'porpis',
        'aypis',
        'ayp_detail',
        'religion',
        'status',
        'spouse',
        'mother',
        'gov_id',
        'gov_detail',
        'househead',
        'nohousehead',
        'householdrel',
        'noofmen',
        'maleno',
        'femaleno',
        'coop',
        'coopdetail',
        'emergency',
        'contactno',
        // 'status',
    ];
}
