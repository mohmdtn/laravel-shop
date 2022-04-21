<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\User\LoginRegisterRequest;
use App\Http\Services\Message\Email\EmailService;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\Sms\SmsService;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class LoginRegisterController extends Controller
{
    public function loginRegisterForm(){
        return view("user.auth.loginRegister");
    }

    public function loginRegister(LoginRegisterRequest $request){
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
            // send email
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'body'  => "کد فعال سازی شما:  $otpCode"
            ];
            $emailService->setDetails($details);
            $emailService->setFrom("noreply@example.com", "ultra X");
            $emailService->setSubject("کد احراز هویت");
            $emailService->setTo($input["id"]);

            $messageService = new MessageService($emailService);
            $messageService->send();
        }

        return redirect()->route("auth.user.loginConfirmForm", $token);
    }

    public function loginConfirmForm($token){
        $otp = Otp::where('token', $token)->first();
        if(empty($otp)){
            return redirect()->route("auth.user.loginRegisterForm")->withErrors(['id' => 'آدرس وارد شده نا معتبر میباشد']);
        }
        return view("user.auth.loginConfirm", compact("token", "otp"));
    }

    public function loginConfirm($token, LoginRegisterRequest $request){
        $input = $request->all();
        $otp = Otp::where("token", $token)->where("used", 0)->where("created_at", ">=", Carbon::now()->subMinutes(5)->toDateTimeString())->first();

        if (empty($otp)){
            return redirect()->route("auth.user.loginRegisterForm", $token)->withErrors(['id' => 'آدرس وارد شده نا معتبر میباشد']);
        }

        // if otp not match
        if ($otp["otp_code"] !== $input["otp"]){
            return redirect()->route("auth.user.loginConfirm", $token)->withErrors(['otp' => 'کد وارد شده صحیح نمی باشد']);
        }

        // if everything is ok
        $otp->update(["used" => 1]);
        $user = $otp->user()->first();

        // verify kardane filde mobile_verified_at ya email_verified_at jadvale user
        if ($otp["type"] == 0 && empty($user["mobile_verified_at"])){
            $user->update(["mobile_verified_at" => Carbon::now()]);
        }
        else if ($otp["type"] == 1 && empty($user["email_verified_at"])){
            $user->update(["email_verified_at" => Carbon::now()]);
        }

        Auth::login($user);
        return redirect()->route("user.home");
    }

    public function loginResendOtp($token){
        $otp = Otp::where("token", $token)->where("used", 0)->where("created_at", "<=", Carbon::now()->subMinutes(5)->toDateTimeString())->first();

        if (empty($otp)){
            return redirect()->route("auth.user.loginRegisterForm", $token)->withErrors(["id" => "آدرس وارد شده نا معتبر است."]);
        }

        $user = $otp->user()->first();

        // create otp code
        $otpCode = rand(111111, 999999);
        $token = Str::random(60);
        $otpInputs = [
            'token'     => $token,
            'user_id'   => $user->id,
            'otp_code'  => $otpCode,
            'login_id'  => $otp->login_id,
            'type'      => $otp->type,
        ];

        Otp::create($otpInputs);

        // send sms or email
        if ($otp->type == 0){
            // send sms
            $smsService = new SmsService();
            $smsService->setFrom(Config::get('sms.otp_from'));
            $smsService->setTo(['0' . $user->mobile]);
            $smsService->setText( 'فروشگاه محمد تقی نسب' . PHP_EOL . 'کد تایید: ' . $otpCode);
            $smsService->setIsFlash(true);

            $messageService = new MessageService($smsService);
            $messageService->send();
        }

        elseif ($otp->type == 1){
            // send email
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'body'  => "کد فعال سازی شما:  $otpCode"
            ];
            $emailService->setDetails($details);
            $emailService->setFrom("noreply@example.com", "ultra X");
            $emailService->setSubject("کد احراز هویت");
            $emailService->setTo($otp->login_id);

            $messageService = new MessageService($emailService);
            $messageService->send();
        }

        return redirect()->route("auth.user.loginConfirmForm", $token);

    }

}
