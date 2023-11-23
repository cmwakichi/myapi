<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Events\Models\User\UserCreated;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return UserResource;
     */
    public function index(Request $request)
    {
        //event(new UserCreated(User::factory(App\User::class)->make()));

        $pageSize = $request->page_size ?? 20;

        $users = User::query()->paginate($pageSize);

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request $request
     * @return UserResource
     */
    public function store(Request $request)
    {

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]
        );

        event(new UserCreated($user));

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request $request
     * @param  \App\Models\User $user
     * @return UserResource | UserResource
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

        event(new UserUpdated($updated));

        return new UserResource($user);
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

        event(new UserDeleted($deleted));

        return new \Illuminate\Http\JsonResponse([
            'data' => 'user with id:'.$id. ' deleted'
        ]);
    }
}
