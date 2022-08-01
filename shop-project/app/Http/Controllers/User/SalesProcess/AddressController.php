<?php

namespace App\Http\Controllers\User\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SalesProcess\AddAddressRequest;
use App\Models\Market\Address;
use App\Models\Market\CartItem;
use App\Models\Market\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addressAndDelivery(){

        $user = Auth::user();
        $cartItems = CartItem::where("user_id", $user["id"])->get();
        $addresses = $user->addresses;
        $provinces = Province::all();

        if (empty(CartItem::where("user_id", $user["id"])->count())){
            return redirect()->route("user.salesProcess.cart");
        }
        else{
            return view("user.salesProcess.addressAndDelivery", compact("cartItems", "addresses", "provinces"));
        }

    }

    public function addAddress(AddAddressRequest $request){
        $inputs = $request->all();
        $inputs["user_id"] = Auth::id();

        $address = Address::create($inputs);
        return redirect()->back();
    }

    public function getCities(Province $province){
        $cities = $province->cities;
        if ($cities != null)
            return response()->json(["status" => true, "cities" => $cities]);
        else
            return response()->json(["status" => false]);
    }
}
