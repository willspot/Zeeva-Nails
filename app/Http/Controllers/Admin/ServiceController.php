<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Notification;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'nullable|string|max:50',
            'price' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Save image if uploaded
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
            $validated['image'] = $path;
        }

        // Convert features to JSON array (if needed)
        if (!empty($validated['features'])) {
            $validated['features'] = json_encode(preg_split("/\r\n|\n|\r/", trim($validated['features'])));
        }

        $service = Service::create($validated);

        Notification::create([
            'message' => "New service created: {$service->title}",
        ]);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service added successfully!');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'nullable|string|max:50',
            'price' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $features = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $request->features)));
        $validated['features'] = json_encode($features);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($validated);

        Notification::create([
            'message' => "Service updated: {$service->title}",
        ]);

        return redirect()->route('admin.services.index')->with('toast', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $title = $service->title;
        $service->delete();
        Notification::create([
            'message' => "Service deleted: {$title}",
        ]);
        return redirect()->route('admin.services.index')->with('toast', 'Service deleted successfully!');
    }
}
