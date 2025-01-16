<?php

namespace App\Http\Controllers;

use App\Http\Requests\Faq\StoreUserRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
          return response()->json($users);
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
          return response()->json($user);
    }

    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::create($validatedData);

          return response()->json($user, 201); // 201 Created
    }


    public function update(StoreUserRequest $request, $id)
    {
        $validatedData = $request->validated();
        $user = User::findOrFail($id);
        $user->update($validatedData);

          return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

          return response()->json('User deleted successfully');
    }

}
