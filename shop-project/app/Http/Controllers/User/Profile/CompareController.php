<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\Market\Compare;
use App\Models\Market\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompareController extends Controller
{
    public function index(){
        return view("user.profile.myCompares");
    }

    public function remove(Product $product){
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->compare()->count() > 0)
                $userCompareList = $user->compare;
            else
                $userCompareList = Compare::create(["user_id" => $user->id]);

            $product->compares()->toggle([$userCompareList->id]);

//            return redirect()->back()->with(["success" => "محصول با موفقیت از لیست مقایسه حذف شد."]);
            return redirect()->back();
        }
        else{
            return redirect()->route("auth.user.loginRegisterForm");
        }
    }
}
