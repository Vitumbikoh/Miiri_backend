<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    // Public access
    public function index()
    {
        return response()->json(Program::all());
    }

    public function show($id)
    {
        return response()->json(Program::findOrFail($id));
    }

    // Authenticated routes
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'required|array',
            'color' => 'nullable|string',
        ]);

        $program = Program::create($validated);
        return response()->json($program, 201);
    }

    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'features' => 'sometimes|array',
            'color' => 'nullable|string',
        ]);

        $program->update($validated);
        return response()->json($program);
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return response()->json(['message' => 'Program deleted']);
    }
}
