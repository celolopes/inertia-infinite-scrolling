<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index(Request $request) {
        $posts = Post::latest()->cursorPaginate(10);

        if ($request->expectsJson()) {
            return PostResource::collection($posts);
        }

        return Inertia::render("Posts/Index", [
            "posts" => PostResource::collection( $posts ),
        ]);
    }
}
