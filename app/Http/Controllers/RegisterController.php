<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService;

class RegisterController extends Controller
{
    public function index()
    {
        return RegisterService::index();
    }

    public function store(RegisterRequest $request)
    {
        return RegisterService::store($request);
      }

}
