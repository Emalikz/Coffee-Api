<?php
    namespace App\Services;

use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Exceptions\JWTException;
    use Tymon\JWTAuth\Facades\JWTAuth;

    class AuthService {
        public function login(mixed $payload){
            Log::info($payload);
            $token = JWTAuth::attempt($payload);
            if(!$token){
                return response()->json(["message"=>'Incorrect username or password'], 401);
            }

            $user = JWTAuth::user();

            return [
                "token" => $token,
                "user" => $user
            ];
        }

        public function session_id(){
            return JWTAuth::user()->id;
        }
    }
