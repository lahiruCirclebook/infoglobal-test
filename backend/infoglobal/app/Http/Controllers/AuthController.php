<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Classes\UserClass;

class AuthController extends Controller
{

    private $authManager;
    public function __construct(UserClass $userClass)
    {
        $this->authManager = $userClass;
    }


    //register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'Name Filed is Required',
            'email.required' => 'Email Filed is Required',
            'password.required' => 'Password Filed is Required',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json(['status' => false, 'message' => $error])->setStatusCode(400);
        }
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        return $this->authManager->register($name, $email, $password);
    }


    //login
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string',
                'password' => 'required|min:8',
            ], [
                'email.required' => 'Email Field is Required!',
                'password.required' => 'password Field is Required!'
            ]);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return response()->json(['status' => false, 'message' => $error])->setStatusCode(400);
            }

            if ($request->email == "admin@gmail.com") {

                $email = $request->email;
                $password = $request->password;

                $userDetail = array();
                $userDetail['email'] = $email;
                $userDetail['password'] = $password;

                Auth::attempt($userDetail);

                $token = Auth::user()->createToken('authToken')->accessToken;
                if ($token) {
                    return response()->json(['status' => true, 'message' => "admin login success!", "token" => $token, "data" => 'admin'])->setStatusCode(200);
                }
                return response()->json(['status' => false, 'message' => "Invalid Credential!"])->setStatusCode(400);
            } else {
                $email = $request->email;
                $password = $request->password;

                $userDetail = array();
                $userDetail['email'] = $email;
                $userDetail['password'] = $password;

                Auth::attempt($userDetail);

                $token = Auth::user()->createToken('authToken')->accessToken;
                if ($token) {
                    return response()->json(['status' => true, 'message' => "user login success!", "token" => $token, "data" => 'user'])->setStatusCode(200);
                }
                return response()->json(['status' => false, 'message' => "Invalid Credential!"])->setStatusCode(400);
            }
        } catch (\Exception $exception) {
            return response()->json(['status' => false, 'message' => 'Authentication Failed !', "error" => $exception->getMessage()])->setStatusCode(400);
        }
    }


    //user auth or not
    public function authAlive()
    {
        try {
            if (Auth::guard('api')->check()) {
                return response()->json(["status" => true, "message" => "Auth Alive success"])->setStatusCode(200);
            }
            return response()->json(["status" => false, "message" => "Auth Alive Failed"])->setStatusCode(400);
        } catch (\Exception $ex) {
            Log::info("AuthController", ["authAlive" => $ex->getMessage(), "line" => $ex->getLine()]);
            return response()->json(["status" => false, "message" => "Auth Alive Failed"])->setStatusCode(500);
        }
    }


    //logout
    public function logoutUser(Request $request)
    {
        if (Auth::user()->token()) {
            $user = Auth::user()->token();
            if ($user->revoke()) {
                return response()->json([
                    'status' => true,
                    'message' => 'User has been logged out'
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'error while logged out'
            ]);
        }
    }
}
