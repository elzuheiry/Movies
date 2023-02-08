<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(["role:superadmin||admin"]);
    }

    public function index()
    {
        return view("admin.users.index", [
            "users" => User::whereRoleIs("admin")->latest()->get(),
        ]);
    }

    public function create()
    {
        return view("admin.users.create");
    }

    public function store(UserRequest $request)
    {
        $attribute = $request->validated();

        $attribute["password"] = Hash::make($request->password);
        $attribute["email_verified_at"] = now();
        $user = User::create($attribute);
        $user->attachRole("admin");
        return redirect()->route("admin.users.index");
    }


    public function edit(User $user)
    {
        return view("admin.users.edit", [
            "user" => $user
        ]);
    }

    
    public function update(UserRequest $request, User $user)
    {
        $attribute = $request->validated();

        $user->update($attribute);
        return redirect()->route("admin.users.index");
    }

    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("admin.users.index");        
    }
}