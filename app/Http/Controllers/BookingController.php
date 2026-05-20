<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'CarID' => 'required',
            'PickupDate' => 'required|date',
            'ReturnDate' => 'required|date|after:PickupDate',
        ]);

        $car = Car::findOrFail($request->CarID);

        $days = Carbon::parse($request->PickupDate)
            ->diffInDays(Carbon::parse($request->ReturnDate));

        if ($days <= 0) {
            $days = 1;
        }

        $totalAmount = $days * $car->PricePerDay;

        Booking::create([
            'CustomerID'    => Auth::id(), // use logged-in user id
            'CarID'         => $request->CarID,
            'PickupDate'    => $request->PickupDate,
            'ReturnDate'    => $request->ReturnDate,
            'TotalAmount'   => $totalAmount,
            'BookingStatus' => 'Booked',
        ]);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Car successfully booked!');
    }
}