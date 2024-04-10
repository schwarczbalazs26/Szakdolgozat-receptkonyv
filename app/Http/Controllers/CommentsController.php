<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\recipe;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        $comments = $recipe->comments;
        return view('recipes.show', compact('recipe', 'comments'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string',
            'recipe_id' => 'required|integer',
        ]);

        $recipe = Recipe::find($request->recipe_id);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->recipe_id = $request->recipe_id;
        $comment->save();

        $comments = Comment::where('recipe_id', $request->recipe_id)->get();
        return view('recipes.show', compact('recipe', 'comments'))->with('success', 'Comment added successfully.');
    }
}
