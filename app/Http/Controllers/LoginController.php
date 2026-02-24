<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Services\LoginService;

class LoginController extends Controller
{
    public function index()
    {
        return LoginService::index();
    }

    public function authenticate(LoginRequest $request)
    {
       return LoginService::authenticate($request);
    }

    public function logout(Request $request)
    {
        return LoginService::logout($request);
    }

}
