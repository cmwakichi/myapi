<?php

namespace App\Repositories;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralJsonException;

class CommentRepository
{
    public function create(array $attributes)
    {
        return DB::transaction(function () use($attributes){
            $comment = Comment::query()->create([
                'body'=>data_get($attributes, 'body'),
                'post_id'=>data_get($attributes, 'post_id'),
                'user_id'=>data_get($attributes, 'user_id'),
            ]);

            throw_if(!$comment, GeneralJsonException::class, 'Failed to create a comment.');

            return $comment;
        });
    }

    public function update(Comment $comment, array $attributes)
    {
        return DB::transaction(function () use($comment, $attributes){
            $updated = $comment->update([
                'body'=>data_get($attributes, 'body'),
            ]);

            throw_if(!$updated, GeneralJsonException::class, 'Failed to update.');

            return $comment;
        });
    }

    public function destroy(Comment $comment)
    {
        DB::transaction(function () use($comment){
            $deleted = $comment->forceDelete();

            throw_if(!$deleted, GeneralJsonException::class, 'Failed to delete.');

            return $deleted;
        });
    }
}
