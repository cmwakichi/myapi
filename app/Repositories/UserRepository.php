<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\GeneralJsonException;

class UserRepository
{
    public function create(array $attributes)
    {
        return DB::transaction(function () use($attributes){
            $user = User::query()->create(
                [
                    'name'=>data_get($attributes, 'name'),
                    'email'=>data_get($attributes, 'email'),
                    'password'=>Hash::make(data_get($attributes, 'password')),
                ]
            );

            throw_if(!$user, GeneralJsonException::class,'Failed to create new user record.');

            return $user;
        });
    }

    public function update(User $user, array $attributes)
    {
        return DB::transaction(function () use($user, $attributes){
            $updated = $user->update([
                'name'=>data_get($attributes, 'name', $user->name),
                'email'=>data_get($attributes, 'email', $user->email),
            ]);

            throw_if(!$updated, GeneralJsonException::class, 'Failed to update the user details.');

            return $updated;
        });
    }

    public function destroy(User $user)
    {
        return DB::transaction(function () use($user) {

            $deleted = $user->forceDelete();

            throw_if(!$deleted, GeneralJsonException::class, 'Failed to delete the user record.');

            return $deleted;
        });
    }
}
