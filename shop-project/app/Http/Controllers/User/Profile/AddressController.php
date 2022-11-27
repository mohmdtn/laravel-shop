<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use App\Models\Market\Delivery;
use App\Models\Market\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index(){
        $user = Auth::user();
        $cartItems = CartItem::where("user_id", $user["id"])->get();
        $addresses = $user->addresses;
        $provinces = Province::all();
        $deliveryMethods = Delivery::where("status", 1)->get();

        return view("user.profile.myAddresses",  compact("cartItems", "addresses", "provinces", "deliveryMethods"));
    }
}
