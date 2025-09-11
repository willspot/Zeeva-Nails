<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->latest()->get();
        return view('dashboard', [
            'notes' => $notes,
            'notifications' => collect(), // temp
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Note::create([
            'content' => $request->input('content'),
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'Note saved successfully.');
    }

    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate(['content' => 'required|string']);
        $note->update(['content' => $request->input('content')]);

        return back()->with('success', 'Note updated successfully.');
    }

    public function destroy(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $note->delete();
        return back()->with('success', 'Note deleted successfully.');
    }

}
