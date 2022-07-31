<?php

namespace App\Http\Controllers\User\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SalesProcess\ProfileCompletionRequest;
use App\Models\Market\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCompletionController extends Controller
{
    public function ProfileCompletion(){
        $user = Auth::user();
        $cartItems = CartItem::where("user_id", Auth::id())->get();
        return view("user.salesProcess.profileCompletion", compact("cartItems", "user"));
    }

    public function update(ProfileCompletionRequest $request){
        $user = Auth::user();
        $national_code = convertArabicToEnglish($request["national_code"]);
        $national_code = convertPersianToEnglish($national_code);

        $inputs = [
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "national_code" => $national_code,
        ];

        if ( isset($request->mobile) && empty($user["mobile"]) ){
            $mobile = convertArabicToEnglish($request["mobile"]);
            $mobile = convertPersianToEnglish($mobile);

            if (preg_match('/^(\+98|98|0)9\d{9}$/', $mobile)){
                $type = 0; // mobile

                $mobile = ltrim($mobile, '0');
                $mobile = substr($mobile, 0, 2) == '98' ? substr($mobile, 2) : $mobile;
                $mobile = str_replace('+98', '', $mobile);
                $inputs["mobile"] = $mobile;
            }
            else{
                $errorText = 'فرمت شماره موبایل معتبر نیست.';
                return redirect()->back()->withErrors("mobile", $errorText);
            }
        }

        if ( isset($request->email) && empty($user["email"]) ){
            $email = convertArabicToEnglish($request["email"]);
            $email = convertPersianToEnglish($email);
            $inputs["email"] = $email;
        }

        $inputs = array_filter($inputs);

        if ( !empty($inputs) ){
            $user->update($inputs);
        }

        return redirect()->route("user.salesProcess.addressAndDelivery");
    }
}
