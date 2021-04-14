<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Profpic;

class Profpic extends Model
{
    use HasFactory;
    protected $table = 'profpicture';
    protected $fillable = ['uuid', 'profpic'];
}
