<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelSupply extends Model
{
    use HasFactory;
    protected $fillable = [
        'driver_id', 
        'car_id', 
        'date', 
        'fuel_type', 
        'quantity_supplied',
        'total_supplied'
    ];
}
