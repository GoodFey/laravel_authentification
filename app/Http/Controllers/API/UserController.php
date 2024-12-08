<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public static function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }
    public static function show(User $user)
    {
        return UserResource::make($user);
    }
    public static function store(StoreRequest $request)
    {
        $request->validated();
        $user = User::store($request);
        return UserResource::make($user);
    }
}
