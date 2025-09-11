<?php

namespace App\Http\Controllers;

use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->take(3)
            ->get();

        return view('welcome', compact('services'));
    }
}
