<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Notification;
use App\Models\LoyaltyCode;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $notes = Note::where('user_id', Auth::id())
                     ->latest()
                     ->get();

        $notifications = Notification::latest()
                                     ->take(10)
                                     ->get();

        // Loyalty codes with optional search
        $search = $request->input('search');

        $codes = LoyaltyCode::when($search, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('code', 'ILIKE', "%{$search}%")
                ->orWhere('phone', 'ILIKE', "%{$search}%")
                ->orWhere('email', 'ILIKE', "%{$search}%")
                ->orWhere('full_name', 'ILIKE', "%{$search}%");
            });
        })
        ->orderByDesc('created_at')
        ->paginate(3);


        return view('dashboard', compact('notes', 'notifications', 'codes'));
    }
}
