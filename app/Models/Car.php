<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'Cars';
    protected $primaryKey = 'CarID';

    public $timestamps = false; // IMPORTANT (your DB uses custom timestamps)

    protected $fillable = [
        'Brand',
        'Model',
        'Year',
        'PlateNumber',
        'Transmission',
        'FuelType',
        'Seats',
        'PricePerDay',
        'Status',
        'Image'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'CarID');
    }
}