<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Vehicle extends Model
{
    use HasFactory , HasApiTokens , SoftDeletes;
    


    protected $fillable = [
        'brand',
        'plate_number',
        'model',
        'insurance_date',
    ];
    protected $hidden = [
        'password',
    ];

}
