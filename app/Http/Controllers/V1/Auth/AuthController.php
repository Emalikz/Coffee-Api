<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function __construct(protected AuthService $_authService)
    {
    }
    public function login(LoginRequest $login){

        try{
            $payload = $login->only(["email","password"]);
            return $this->_authService->login($payload);
        }catch(JWTException $e){
            Log::info($e->getMessage());
        }

    }
}
