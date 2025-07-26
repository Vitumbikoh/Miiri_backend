<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/news",
     *     summary="Get all news",
     *     tags={"News"},
     *     @OA\Response(response=200, description="List of news")
     * )
     */
    public function index()
    {
        return response()->json(News::all());
    }

    /**
     * @OA\Post(
     *     path="/api/news",
     *     summary="Create a news item",
     *     tags={"News"},
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title","content"},
     *             @OA\Property(property="title", type="string", example="New Feature Released"),
     *             @OA\Property(property="content", type="string", example="Details about the new feature...")
     *         )
     *     ),
     *     @OA\Response(response=201, description="News created")
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $news = News::create($validated);
        return response()->json($news, 201);
    }
}
