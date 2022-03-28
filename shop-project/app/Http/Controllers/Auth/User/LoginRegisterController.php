<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\User\LoginRegisterRequest;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    public function LoginRegisterForm(){
        return view("user.auth.loginRegister");
    }

    public function LoginRegister(LoginRegisterRequest $request){
        $input = $request->all();

        // check email
        if (filter_var($input["id"], FILTER_VALIDATE_EMAIL)){
            $type = 1; // yani email daryaft kardim
            $user = User::where("email", $input["id"])->first();
            if (empty($user)){
                $newUser["newUser"] = $input["id"];
            }
        }

        // check mobile
        elseif (preg_match("/^(\+98|98|0)9\d{9}$/", $input["id"])){
            $type = 0; // yani mobile daryaft kardim

            // all mobile numbers should have this format 9** *** ***
            $input["id"] = ltrim($input["id"], 0);
            $input["id"] = substr($input["id"], 0, 2) === "98" ? substr($input["id"], 2) : $input["id"];
            $input["id"] = str_replace("+98" , '', $input["id"]);

            $user = User::where("mobile", $input["id"])->first();
            if (empty($user)){
                $newUser["mobile"] = $input["id"];
            }
        }

        else{
            $errorText = "شناسه ورودی شما نه شماره موبایل است نه ایمیل";
            return redirect()->route("auth.user.loginRegisterForm")->withErrors(["id" => $errorText]);
        }
    }
}
