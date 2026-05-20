<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'BookingID';
    public $timestamps = false;

    protected $fillable = [
        'CustomerID',
        'CarID',
        'PickupDate',
        'ReturnDate',
        'TotalAmount',
        'BookingStatus',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'CarID', 'CarID');
    }
}