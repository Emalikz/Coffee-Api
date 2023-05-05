<?php
    namespace App\Services;
    use Tymon\JWTAuth\Exceptions\JWTException;
    use Tymon\JWTAuth\Facades\JWTAuth;

    class AuthService {
        public function login(mixed $payload){
            $token = JWTAuth::attempt($payload);
            if(!$token){
                throw new JWTException('Credenciales incorrectas', 401);
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
