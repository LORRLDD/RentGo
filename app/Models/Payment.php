<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'car_name',
        'amount',
        'payment_method',
        'status',
        'reference_number',
    ];
}