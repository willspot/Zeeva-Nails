<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoyaltyCode;
use Illuminate\Support\Str;

class LoyaltyCodeController extends Controller
{

    public function verifyCode(Request $request)
    {
        $code = $request->input('code');

        $record = LoyaltyCode::where('code', $code)
                            ->where('status', 'active')
                            ->first();

        if (!$record) {
            return response()->json(['valid' => false], 404);
        }

        return response()->json(['valid' => true, 'id' => $record->id]);
    }

    // Submit user details
    public function submitDetails(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:loyalty_codes,id',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        LoyaltyCode::where('id', $validated['id'])->update([
            'status' => 'used',
            'full_name' => $validated['full_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
        ]);

        return response()->json(['success' => true]);
    }

    // Show all codes + search
    public function dashboard(Request $request)
    {
        $search = $request->input('search');

        $codes = LoyaltyCode::when($search, function ($query, $search) {
                return $query->where('code', 'ILIKE', "%$search%");
            })
            ->orderByDesc('created_at')
            ->paginate(2);

        return view('dashboard', compact('codes'));
    }

    // Generate a new code
    public function generate(Request $request)
    {
         // Loop until a unique code is found
        do {
            $code = strtoupper(Str::random(8));
        } while (LoyaltyCode::where('code', $code)->exists());

        // Create the new loyalty code
        LoyaltyCode::create([
            'code' => $code,
            'status' => 'active',
        ]);

        return redirect()->route('dashboard')->with('success', 'Loyalty code generated successfully.');
    }

    // Show details for a specific code
    public function show($id)
    {
        $code = LoyaltyCode::findOrFail($id);
        return view('admin.loyalty.show', compact('code'));
    }
}
