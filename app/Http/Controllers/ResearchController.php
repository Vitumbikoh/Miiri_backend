<?php

// app/Http/Controllers/ResearchController.php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function index()
    {
        return response()->json(Research::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:Ongoing,Planning,Data Collection',
            'collaborators' => 'required|array',
        ]);

        $research = Research::create($validated);
        return response()->json($research, 201);
    }

    public function show($id)
    {
        $research = Research::findOrFail($id);
        return response()->json($research);
    }

    public function update(Request $request, $id)
    {
        $research = Research::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'status' => 'sometimes|in:Ongoing,Planning,Data Collection',
            'collaborators' => 'sometimes|array',
        ]);

        $research->update($validated);
        return response()->json($research);
    }

    public function destroy($id)
    {
        $research = Research::findOrFail($id);
        $research->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}
