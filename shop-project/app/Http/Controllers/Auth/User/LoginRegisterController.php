<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\User\LoginRegisterRequest;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\Sms\SmsService;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

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
                $newUser["email"] = $input["id"];
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

        if (empty($user)){
            $newUser["password"] = "98355154";
            $newUser["activation"] = "1";
            $user = User::create($newUser);
        }

        // create otp code
        $otpCode = rand(111111, 999999);
        $token = Str::random(60);
        $otpInputs = [
            'token'     => $token,
            'user_id'   => $user->id,
            'otp_code'  => $otpCode,
            'login_id'  => $input["id"],
            'type'      => $type,
        ];

        Otp::create($otpInputs);

        // send sms or email
        if ($type == 0){
            // send sms
            $smsService = new SmsService();
            $smsService->setFrom(Config::get('sms.otp_from'));
            $smsService->setTo(['0' . $user->mobile]);
            $smsService->setText( 'فروشگاه محمد تقی نسب' . PHP_EOL . 'کد تایید: ' . $otpCode);
            $smsService->setIsFlash(true);

            $messageService = new MessageService($smsService);
            $messageService->send();
        }

        elseif ($type == 1){

        }

    }

}
