<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view("user.profile.profile", compact("user"));
    }

    public function update(UpdateProfileRequest $request){
        $user = Auth::user();
        $inputs = [
            "first_name"    => $request->first_name,
            "last_name"     => $request->last_name,
            "national_code" => $request->national_code
        ];
        $user->update($inputs);

        return redirect()->route("user.profile.profile")->with("success", "اطلاعات شما با موفقیت ویرایش شد");
    }
}
