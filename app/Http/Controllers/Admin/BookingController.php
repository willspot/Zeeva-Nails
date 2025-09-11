<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\BookingStatusMail;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\Notification;


class BookingController extends Controller
{

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'full_name' => 'required|string|max:255',
        'email'     => 'required|email',
        'phone'     => 'required|string|max:20',
        'services'  => 'required|string',
        'preferred_date'      => 'required|date',
        'preferred_time'      => 'required|string',
        'request'   => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422);
    }

    $validated = $validator->validated();

    // Generate random confirmation code
    $confirmationCode = strtoupper(Str::random(6));

    $booking = Booking::create([
        'full_name' => $validated['full_name'],
        'email'     => $validated['email'],
        'phone'     => $validated['phone'],
        'services'  => $validated['services'],
        'preferred_date'  => $validated['preferred_date'],
        'preferred_time'  => $validated['preferred_time'],
        'request'   => $validated['request'] ?? null,
        'status'    => 'pending',
        'confirmation_code' => $confirmationCode,
    ]);

    Notification::create([
        'message' => "New booking from {$booking->full_name} for " . (is_array($booking->services) ? implode(', ', $booking->services) : $booking->services),
    ]);


    // Send email (basic example)
    Mail::raw(
        "Thank you {$booking->full_name}, your booking is pending. Confirmation Code: {$confirmationCode}",
        function ($msg) use ($booking) {
            $msg->to($booking->email)
                ->subject("Booking Confirmation - Zeeva Nails");
        }
    );

    return response()->json([
        'success' => true,
        'confirmation_code' => $confirmationCode,
    ]);
}

    public function index(Request $request)
    {
        // Get filter value from input
        $code = $request->get('code');

        // Base query
        $query = Booking::query();

        // Apply filter if search input exists
        if ($code) {
            $query->where(function ($q) use ($code) {
                $q->where('confirmation_code', 'ILIKE', "%{$code}%")
                ->orWhere('full_name', 'ILIKE', "%{$code}%")
                ->orWhere('email', 'ILIKE', "%{$code}%");
            });
        }

        // Get paginated results
        $bookings = $query->latest()->paginate(10);

        // Counts for summary cards
        $counts = [
            'pending'  => Booking::where('status', 'pending')->count(),
            'accepted' => Booking::where('status', 'accepted')->count(),
            'declined' => Booking::where('status', 'declined')->count(),
        ];

        // Latest booking for popup tracking
        $latestBookingId = Booking::latest('id')->value('id');

        return view('admin.bookings.index', compact('bookings', 'counts', 'code', 'latestBookingId'));
    }



    public function latest()
    {
        $booking = Booking::where('status', 'pending')
            ->latest('id')
            ->first();

        return response()->json($booking);
    }


    // BookingController.php
    public function revoke(Booking $booking)
    {
        $booking->update(['status' => 'pending']);
        return back()->with('toast', 'Booking reverted to pending.');
    }


    public function accept(Request $request, Booking $booking): RedirectResponse
    {
        $request->validate([
            'message' => 'nullable|string|max:2000',
        ]);

        $booking->update(['status' => 'accepted']);

        Notification::create([
            'message' => "New booking from {$booking->full_name} for " . (is_array($booking->services) ? implode(', ', $booking->services) : $booking->services),
        ]);


        $message = $request->input('message') ?: "Great news! Your appointment at Zeeva Nails has been confirmed.\nWe can’t wait to pamper you 🌸";
        Mail::to($booking->email)->send(new BookingStatusMail($booking, $message, 'accepted'));

        return back()->with('toast', 'Booking accepted & email sent.');
    }

    public function decline(Request $request, Booking $booking): RedirectResponse
    {
        $request->validate([
            'message' => 'nullable|string|max:2000',
        ]);

        $booking->update(['status' => 'declined']);

        Notification::create([
            'message' => "Booking declined: {$booking->full_name} ({$booking->confirmation_code})",
        ]);

        $message = $request->input('message') ?: "We’re sorry — we can’t honor the selected time.\nPlease reply to this email or rebook a new time. 💖";
        Mail::to($booking->email)->send(new BookingStatusMail($booking, $message, 'declined'));

        return back()->with('toast', 'Booking declined & email sent.');
    }

    public function destroy(Booking $booking): RedirectResponse
    {
        $name = $booking->full_name;
        $code = $booking->confirmation_code;
        $booking->delete();
        Notification::create([
            'message' => "Booking deleted: {$name} ({$code})",
        ]);
        return back()->with('toast', 'Booking deleted.');
    }
}
