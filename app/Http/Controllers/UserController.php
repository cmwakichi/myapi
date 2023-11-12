<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse;
     */
    public function index()
    {
        $users = User::query()->get();

        return new \Illuminate\Http\JsonResponse(
            [
                'data' => $users
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $created = User::query()->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        return new \Illuminate\Http\JsonResponse([
            'user' => $created
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return new \Illuminate\Http\JsonResponse([
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $user)
    {
        $updated = $user->update([
            'name'=>$request->name ?? $user->name,
            'email'=>$request->email ?? $user->email,
            'password'=>$request->password ?? $user->password,
        ]);

        if(!$updated){
            return new JsonResponse([
                'errors'=>[
                    'Update failed.'
                ]
                ],400);
        }

        return new \Illuminate\Http\JsonResponse([
            'data' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        $id = $user->id;
        $deleted = $user->delete();

        if(!$deleted){
            return new JsonResponse([
                'errors'=>[
                    'Failed to delete user.'
                ]
                ],400);
        }
        return new \Illuminate\Http\JsonResponse([
            'data' => 'user with id:'.$id. ' deleted'
        ]);
    }
}
