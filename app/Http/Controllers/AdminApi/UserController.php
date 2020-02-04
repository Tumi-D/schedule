<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }
    public function roles()
    {
        $roles = Role::all();
        return response()->json(["data" => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user =   $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            // 'phone' => 'required'
        ]);
        // $user = $user + $request['phone'];
        // User::create($user)
        $user = User::create([
            'name' => $request->name,
            "email" => $request->email,
            'password' => Hash::make($request->password),
            'phone' => Str::random(10)
        ]);
        if ($request->has('role')) {
            $user->attachRole($request->role['name']);
        }
        if ($request->has('permission')) {
            $user->givePermissionTo(collect($request->permissions)->pluck("id")->toArray());
        }
        return response(['message' => 'User Created', 'user' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }
}
