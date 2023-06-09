<?php

namespace App\Http\Controllers\Bacend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("backend.users.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.users.insert_form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name      = $request->get("name");
        $email     = $request->get("email");
        $password  = $request->get("password");
        $is_active = $request->get("is_active");
        $is_admin  = $request->get("is_admin", default:0);

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->is_active = $is_active;
        $user->is_admin = $is_admin;

        $user->save();

        return Redirect::to("/users");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "show => $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view("backend.users.update_form", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->get("name");
        $email = $request->get("email");
        $is_active = $request->get("is_active");
        $is_admin = $request->get("is_active");
        
        $user = User::find($id);

        $user->name = $name;
        $user->email = $email;
        $user->$is_active = $is_active;
        $user->$is_admin = $is_admin;

        $user->save();
        return Redirect::to("/users"); //haat var burda kaldık!!
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "destroy";
    }
}
