<?php

namespace App\Http\Controllers\User\SalesProcess;

use App\Http\Controllers\Controller;
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

    public function update(Request $request){
        $inputs = $request->all();
        $request->validate([
           "first_name"     => "sometimes|required|max:120|regex:/^[ا-یa-zA-Zءي ]+$/u",
           "last_name"      => "sometimes|required|max:120|regex:/^[ا-یa-zA-Zءي ]+$/u",
           "email"          => "sometimes|required|email|unique:users,email",
           "mobile"         => "sometimes|required|numeric|min:10|max:13|unique:users,mobile",
           "national_code"  => "sometimes|required|numeric"
        ]);

        $user = Auth::user();
        $user->update($inputs);
        return redirect()->route("user.salesProcess.addressAndDelivery");
    }
}
