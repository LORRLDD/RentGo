<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\User;
use App\Models\Car;

use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// HOME PAGE
Route::get('/', function () {
    return view('welcome');
})->name('home');


// =========================
// CARS (CUSTOMER)
// =========================
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');


// =========================
// BOOKING
// =========================
Route::post('/book', [BookingController::class, 'store'])
    ->middleware('auth')
    ->name('book.store');


// =========================
<<<<<<< HEAD
// USER DASHBOARD (DB CONNECTED)
=======
// USER DASHBOARD
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
// =========================
Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

<<<<<<< HEAD
    $bookings = Booking::with('car')
        ->where('CustomerID', Auth::id())
        ->latest('BookingID')
        ->get();

    $totalBookings = $bookings->count();
    $upcomingTrips = $bookings->where('BookingStatus', 'Booked')->count();
    $completedTrips = $bookings->where('BookingStatus', 'Completed')->count();
    $totalSpent = $bookings->sum('TotalAmount');

    $latestBooking = $bookings->first();

    return view('dashboard', compact(
        'bookings',
        'totalBookings',
        'upcomingTrips',
        'completedTrips',
        'totalSpent',
        'latestBooking'
    ));
=======
    return view('dashboard');
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
})->middleware('auth')->name('dashboard');


// =========================
// ADMIN PANEL
// =========================
Route::middleware('auth')->group(function () {

<<<<<<< HEAD
    // ADMIN DASHBOARD (DB CONNECTED)
=======
    // ADMIN DASHBOARD
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
    Route::get('/admin-dashboard', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

<<<<<<< HEAD
        $totalCars = Car::count();
        $totalCustomers = User::where('role', 'customer')->count();
        $totalBookings = Booking::count();
        $totalRevenue = Booking::sum('TotalAmount');

        $customers = User::where('role', 'customer')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalCars',
            'totalCustomers',
            'totalBookings',
            'totalRevenue',
            'customers'
        ));
=======
        return view('admin.dashboard');
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
    })->name('admin.dashboard');


    // OWNED CARS
    Route::get('/admin-cars', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $cars = Car::latest('CarID')->get();

        return view('admin.owned-cars', compact('cars'));
    })->name('admin.owned-cars');

    Route::post('/admin-cars/store', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        Car::create(request()->all());

        return back()->with('success', 'Car added successfully!');
    })->name('admin.owned-cars.store');

    Route::put('/admin-cars/status/{id}', function ($id) {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $car = Car::findOrFail($id);
        $car->Status = request('Status');
        $car->save();

        return back()->with('success', 'Car status updated!');
    })->name('admin.owned-cars.status');

    Route::delete('/admin-cars/delete/{id}', function ($id) {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        Car::where('CarID', $id)->delete();

        return back()->with('success', 'Car deleted successfully!');
    })->name('admin.owned-cars.delete');


    // CUSTOMERS
    Route::get('/admin-customers', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $customers = User::where('role', 'customer')
            ->with(['bookings.car'])
            ->orderBy('id')
            ->get();

        return view('admin.customers', compact('customers'));
    })->name('admin.customers');

<<<<<<< HEAD
    // ADMIN ACCEPT BOOKING
Route::put('/admin-booking-accept/{id}', function ($id) {
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $booking = Booking::where('BookingID', $id)->firstOrFail();

    if ($booking->BookingStatus === 'Pending') {
        $booking->BookingStatus = 'Booked';
        $booking->save();
    }

    return back()->with('success', 'Booking accepted successfully.');
})->name('admin.booking.accept');
=======
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50

    // ANALYTICS
    Route::get('/admin-analytics', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

<<<<<<< HEAD
$totalCars = Car::count();
$availableCars = Car::where('Status', 'Available')->count();
$rentedCars = Car::where('Status', 'Rented')->count();

$totalCustomers = User::where('role', 'customer')->count();

$totalBookings = Booking::whereNotIn('BookingStatus', ['Cancelled', 'Completed'])->count();
$bookedBookings = Booking::where('BookingStatus', 'Booked')->count();
$pendingBookings = Booking::where('BookingStatus', 'Pending')->count();
$cancelledBookings = Booking::where('BookingStatus', 'Cancelled')->count();

$totalRevenue = Booking::whereNotIn('BookingStatus', ['Cancelled', 'Pending'])
    ->sum('TotalAmount');
=======
        $totalCars = Car::count();
        $availableCars = Car::where('Status', 'Available')->count();
        $rentedCars = Car::where('Status', 'Rented')->count();

        $totalCustomers = User::where('role', 'customer')->count();

        $totalBookings = Booking::count();
        $bookedBookings = Booking::where('BookingStatus', 'Booked')->count();
        $pendingBookings = Booking::where('BookingStatus', 'Pending')->count();
        $cancelledBookings = Booking::where('BookingStatus', 'Cancelled')->count();

        $totalRevenue = Booking::sum('TotalAmount');
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50

        return view('admin.analytics', compact(
            'totalCars',
            'availableCars',
            'rentedCars',
            'totalCustomers',
            'totalBookings',
            'bookedBookings',
            'pendingBookings',
            'cancelledBookings',
            'totalRevenue'
        ));
    })->name('admin.analytics');


    // ADMIN PROFILE
    Route::get('/admin-profile', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.profile');
    })->name('admin.profile');
});


// MY BOOKINGS
Route::get('/my-bookings', function () {

    $bookings = Booking::where('CustomerID', Auth::id())
        ->latest('BookingID')
        ->get();

    return view('bookings.index', compact('bookings'));

})->middleware('auth')->name('bookings.index');


// BOOKING DETAILS
<<<<<<< HEAD
Route::get('/booking-details/{id}', function ($id) {

    $booking = Booking::with('car')
        ->where('BookingID', $id)
        ->where('CustomerID', Auth::id())
        ->firstOrFail();

    return view('bookings.details', [
        'booking' => $booking
    ]);

})->middleware('auth')->name('booking.details');

=======
Route::get('/booking-details', function () {
    return view('bookings.details');
})->middleware('auth')->name('booking.details');


>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50
// BOOK AGAIN
Route::get('/book-again', function () {
    return redirect()->route('cars.show', 2);
})->middleware('auth')->name('book.again');

<<<<<<< HEAD
// CANCEL BOOKING
Route::put('/booking-cancel/{id}', function ($id) {

    $booking = Booking::where('BookingID', $id)
        ->where('CustomerID', Auth::id())
        ->firstOrFail();

    if (
        $booking->BookingStatus !== 'Cancelled' &&
        $booking->BookingStatus !== 'Completed'
    ) {
        $booking->BookingStatus = 'Cancelled';
        $booking->save();
    }

    return redirect()->route('bookings.index')
        ->with('success', 'Booking cancelled successfully.');

})->middleware('auth')->name('booking.cancel');
=======
>>>>>>> 08b6d1334bbe4e4929c1ad5c42e60f24abef3c50

// PROFILE
Route::get('/my-profile', [ProfileController::class, 'edit'])
    ->middleware('auth')
    ->name('profile.index');

Route::put('/my-profile', [ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update');


// PAYMENTS
Route::get('/payments', [PaymentController::class, 'index'])
    ->middleware('auth')
    ->name('payments.index');

Route::post('/payments/pay', [PaymentController::class, 'store'])
    ->middleware('auth')
    ->name('payments.store');


// AUTH
require __DIR__ . '/auth.php';