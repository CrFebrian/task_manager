<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\TaskResource;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $request->validate(rules: [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)){
            return new TaskResource(FALSE, "kodok terbang", 911);
        }

        $token = $user->createToken("auth_token", $user->getAllPermissions()->pluck("name")->toArray())->plainTextToken;
        return new TaskResource(TRUE, "kodok lompat", [
            "Token" => $token,
            "Hak" => $user ->load(relations: "roles")
        ]);
    }


    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return new TaskResource(status: true, pesan: "kodok tidur", resource: 471);
        }

}