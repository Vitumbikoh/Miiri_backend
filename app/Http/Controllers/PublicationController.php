<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index()
    {
        return response()->json(Publication::all());
    }

    public function show($id)
    {
        return response()->json(Publication::findOrFail($id));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
        ]);

        $publication = Publication::create($validated);
        return response()->json($publication, 201);
    }

    public function update(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);
        $publication->update($request->only(['title', 'content', 'author']));
        return response()->json($publication);
    }

    public function destroy($id)
    {
        Publication::destroy($id);
        return response()->json(['message' => 'Publication deleted successfully']);
    }
}
