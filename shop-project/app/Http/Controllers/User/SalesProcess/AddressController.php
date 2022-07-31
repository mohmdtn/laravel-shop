<?php

namespace App\Http\Controllers\User\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addressAndDelivery(){
        // check profile
        $user = Auth::user();

        if (empty($user["mobile"]) || empty($user["first_name"]) || empty($user["last_name"]) || empty($user["email"]) || empty($user["national_code"])){
            return redirect()->route("user.salesProcess.profileCompletion");
        }
        if (empty(CartItem::where("user_id", $user["id"])->count())){
            return redirect()->route("user.salesProcess.cart");
        }
        else{
            return view("user.salesProcess.addressAndDelivery");
        }

    }

    public function addAddress(){

    }
}
