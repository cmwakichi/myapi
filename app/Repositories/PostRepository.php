<?php

namespace App\Repositories;

use Exception;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
//use App\Repositories\BaseRepository;

class PostRepository{

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes){
            $post = Post::query()->create([
                'title' => data_get($attributes, 'title'),
                'body' => data_get($attributes, 'body'),
            ]);

            if(!$post){
                throw new GeneralJsonException('Error occured', 422);
            }

            if($userIds = data_get($attributes, 'user_ids')){
                $post->users()->sync($userIds);
            }
            return $post;
        },3);
    }

    /**
     * @param Post $post
     * @param array $attributes
     * @return mixed
     */
    public function update(Post $post, $attributes)
    {
        return DB::transaction(function () use($post, $attributes){
            $updated = $post->update([
                'title' => data_get($attributes, 'title', $post->title),
                'body' => data_get($attributes, 'body', $post->body),
            ]);

            if(!$updated)
            {
                throw new Exception("Failed to update post.");
            }

            if($userIds = data_get($attributes, 'user_ids'))
            {
                $post->users()->sync($userIds);
            }

            return $post;
        });
    }
    /**
     * @param Post $post
     * @return mixed
     */
    public function forceDelete(Post $post)
    {
        return DB::transaction(function () use($post){
            $deleted = $post->delete();

            if(!$deleted)
            {
                throw new Exception("Failed to dele post.");
            }

            return $deleted;
        });
    }
}
