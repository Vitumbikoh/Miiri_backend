<?php

namespace App\Http\Controllers;

use App\Models\Innovation;
use Illuminate\Http\Request;

class InnovationController extends Controller
{
    public function index()
    {
        return response()->json(Innovation::all());
    }

    public function show($id)
    {
        return response()->json(Innovation::findOrFail($id));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'nullable|string',
        ]);

        $innovation = Innovation::create($validated);
        return response()->json($innovation, 201);
    }

    public function update(Request $request, $id)
    {
        $innovation = Innovation::findOrFail($id);
        $innovation->update($request->only(['name', 'description', 'status']));
        return response()->json($innovation);
    }

    public function destroy($id)
    {
        Innovation::destroy($id);
        return response()->json(['message' => 'Innovation deleted successfully']);
    }
}
