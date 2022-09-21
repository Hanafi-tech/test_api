<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Users extends Controller
{
    public function response($user)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // $token = $user->createToken(str()->random(40))->plainTextToken;
        $token = $user->createToken(substr(str_shuffle(str_repeat($pool, 5)), 0, 40))->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'token_type' => 'Baerer'
        ]);
    }

    public function login(request $request)
    {
        $d = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt($d)) {
            return response()->json([
                'message' => [
                    'Code' => '4019900',
                    'Response' => 'Unauthorized (Invalid API Key)',
                ]
            ], 401);
        }
        // else {
        //     return response()->json([
        //         'message' => [
        //             'Code' => '2009900',
        //             'Response' => 'Successful',
        //         ]
        //     ], 200);
        // }

        return $this->response(Auth::user());
    }

    public function register(request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => ucwords($request->name),
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return $this->response($user);
    }
}
