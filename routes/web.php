<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\BookingLookupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoyaltyCodeController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

// Bookings page
Route::get('/bookings', function () {
    return view('bookings');
});

Route::prefix('admin/loyalty')->name('admin.loyalty.')->group(function () {
    // Route::get('/', [LoyaltyCodeController::class, 'dashboard'])->name('dashboard'); // dashboard view
    Route::post('/generate', [LoyaltyCodeController::class, 'generate'])->name('generate');
    Route::get('/{id}', [LoyaltyCodeController::class, 'show'])->name('details');
});

Route::get('/admin/loyalty/{id}', [LoyaltyCodeController::class, 'show'])->name('admin.loyalty.details');

Route::post('/verify-code', [LoyaltyCodeController::class, 'verifyCode'])->name('loyalty.verify');
Route::post('/submit-details', [LoyaltyCodeController::class, 'submitDetails'])->name('loyalty.submit');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
});

// revoke booking
Route::patch('/admin/bookings/{booking}/revoke', [BookingController::class, 'revoke'])->name('admin.bookings.revoke');

Route::get('/admin/bookings/latest', [\App\Http\Controllers\Admin\BookingController::class, 'latest'])
    ->name('admin.bookings.latest');


Route::post('/bookings', [App\Http\Controllers\Admin\BookingController::class, 'store'])->name('bookings.store');

// Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('services', ServiceController::class);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
    Route::post('/admin/bookings/{booking}/accept', [BookingController::class, 'accept'])->name('admin.bookings.accept');
    Route::post('/admin/bookings/{booking}/decline', [BookingController::class, 'decline'])->name('admin.bookings.decline');
    Route::delete('/admin/bookings/{booking}', [BookingController::class, 'destroy'])->name('admin.bookings.destroy');
});

// Public lookup by confirmation code
Route::get('/booking/lookup', [BookingLookupController::class, 'form'])->name('booking.lookup.form');
Route::get('/booking/lookup/show', [BookingLookupController::class, 'show'])->name('booking.lookup.show');

// Loyalty Club page
Route::get('/loyalty', function () {
    return view('loyalty');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('notes', NoteController::class)->except(['show', 'create', 'edit']);
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('notes', NoteController::class);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
