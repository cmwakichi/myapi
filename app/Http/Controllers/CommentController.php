<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return new JsonResponse([
            'data'=>'all comments'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return new JsonResponse(
            300
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Comment $comment)
    {
        return new JsonResponse([
            'data'=>$comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request $request
     * @param  \App\Models\Comment $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Comment $comment)
    {
        return new JsonResponse([
            'data'=>'updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Comment $comment)
    {
        return new JsonResponse([
            'data'=>'deleted'
        ]);
    }
}
