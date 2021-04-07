<?php

namespace App\Http\Controllers;


use App\Events\SentRegisteredUserMail;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

//        // call our event here
//        event(new SentRegisteredUserMail($user));
//
//        return $user;
    }
}
