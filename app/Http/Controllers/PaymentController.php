<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('payments.index', compact('payments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_name' => ['required', 'string'],
            'amount' => ['required', 'numeric'],
            'payment_method' => ['required', 'string'],
        ]);

        Payment::create([
            'user_id' => Auth::id(),
            'car_name' => $request->car_name,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => 'Paid',
            'reference_number' => 'RENTGO-' . strtoupper(Str::random(8)),
        ]);

        return redirect()->route('payments.index')
            ->with('success', 'Payment successful!');
    }
}