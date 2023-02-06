<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        return $user = User::create([
           'name' => $request->input('name'),
           'email' => $request->input('email'),
           'password' => Hash::make($request->input('password'))
        ]);
        
    }

    public function user(){
        return 'authentificated user';
    }
}