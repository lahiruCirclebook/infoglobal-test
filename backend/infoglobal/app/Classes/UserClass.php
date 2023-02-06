<?php

namespace App\Classes;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserClass
{
    private $userManager;

    public function __construct(User $user)
    {
        $this->userManager = $user;
    }
    public function register($name, $email, $password)
    {
        try {
            if ($this->userManager->checkUser($email)) {
                return response()->json(['status' => false, 'message' => "user Already Exit !"])->setStatusCode(400);
            }
            $hash_password = Hash::make($password);
            $result = $this->userManager->register($name, $email, $hash_password);
            if ($result) {
                $userDetail = array();
                $userDetail['email'] = $email;
                $userDetail['password'] = $password;
                Auth::attempt($userDetail);
                $token = Auth::user()->createToken('authToken')->accessToken;
                if ($token) {
                    return response()->json(['status' => true, 'message' => "user register success!", "token" => $token])->setStatusCode(400);
                }
            }
            return response()->json(['status' => false, 'message' => "error while register user!"])->setStatusCode(400);
        } catch (\Exception $ex) {
            Log::info("UserClass Error", ["register" => $ex->getMessage(), "line" => $ex->getLine()]);
            return response()->json(["status" => false, "message" => "internal server Error"])->setStatusCode(500);
        }
    }
}
