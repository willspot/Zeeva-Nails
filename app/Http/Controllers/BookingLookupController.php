<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookingLookupController extends Controller
{
    public function form(): View
    {
        return view('booking.lookup');
    }

    public function show(Request $request): View
    {
        $request->validate(['code' => 'required|string']);
        $booking = Booking::where('confirmation_code', $request->code)->first();

        return view('booking.show', compact('booking'));
    }
}
