<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\PostResource;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PostResource
     */
    public function index()
    {
        $posts = Post::query()->get();

        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request  $request
     * @return PostResource
     */
    public function store(Request $request)
    {
        $post = Post::query()->create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return PostResource
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Post $post)
    {
        $updated = $post->update([
            'title' => $request->title ?? $post->title,
            'body' => $request->body ?? $post->body,
        ]);

        if(!$updated){
            return new JsonResponse([
                'errors'=>[
                    'Failed to update post.'
                ]
            ],400);
        }

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Post $post)
    {
        $deleted = $post->delete();

        if(!$deleted){
            return new JsonResponse([
                'errors'=>[
                    'Failed to remove post.'
                ]
                ],400);
        }
        return new JsonResponse([
            'data'=>'post deleted'
        ]);
    }
}
