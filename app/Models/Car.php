<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'plate', 
        'name', 
        'fuel_type', 
        'manufacturer', 
        'year_of_manufacturer', 
        'tank_capacity', 
        'obs'
    ];
}
