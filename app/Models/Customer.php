<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'CustomerID';
    public $timestamps = false;

    protected $fillable = [
        'FirstName',
        'LastName',
        'Email',
        'Password',
    ];
}