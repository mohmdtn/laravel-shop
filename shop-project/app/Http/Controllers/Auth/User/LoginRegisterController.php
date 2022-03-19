<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    public function LoginRegisterForm(){
        return view("user.auth.loginRegister");
    }
}
