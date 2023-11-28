<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Events\Models\User\UserCreated;
use App\Events\Models\User\UserDeleted;
use App\Events\Models\User\UserUpdated;
use App\Exceptions\GeneralJsonException;

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
    public function store(Request $request, UserRepository $repository)
    {

        $user = $repository->create($request->only([
            'name',
            'email',
            'password',
        ]));

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
    public function update(Request $request, User $user, UserRepository $repository)
    {
        $updated = $repository->update($user, $request->only([
            'name',
            'email',
        ]));

        event(new UserUpdated($user));

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user, UserRepository $repository)
    {
        $deleted = $repository->destroy($user);

        event(new UserDeleted($user));

        return new JsonResponse([
            'message'=>'Success.'
        ]);

    }
}
