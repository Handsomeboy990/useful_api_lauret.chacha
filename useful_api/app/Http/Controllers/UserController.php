<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return $users;
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return $user;
    }
}
