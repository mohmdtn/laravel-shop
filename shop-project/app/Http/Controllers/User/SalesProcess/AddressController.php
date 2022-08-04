<?php

namespace App\Http\Controllers\User\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SalesProcess\AddAddressRequest;
use App\Http\Requests\User\SalesProcess\ChooseAddressAndDeliveryRequest;
use App\Models\Market\Address;
use App\Models\Market\CartItem;
use App\Models\Market\Delivery;
use App\Models\Market\Order;
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
        $deliveryMethods = Delivery::where("status", 1)->get();

        if (empty(CartItem::where("user_id", $user["id"])->count())){
            return redirect()->route("user.salesProcess.cart");
        }
        else{
            return view("user.salesProcess.addressAndDelivery", compact("cartItems", "addresses", "provinces", "deliveryMethods"));
        }

    }


    public function addAddress(AddAddressRequest $request){
        $inputs = $request->all();
        $inputs["user_id"] = Auth::id();
        $inputs["postal_code"] = convertArabicToEnglish($request["postal_code"]);
        $inputs["postal_code"] = convertPersianToEnglish($inputs["postal_code"]);

        $address = Address::create($inputs);
        return redirect()->back();
    }


    public function updateAddress(AddAddressRequest $request, Address $address){
        $inputs = $request->all();
        $inputs["user_id"] = Auth::id();
        $inputs["postal_code"] = convertArabicToEnglish($request["postal_code"]);
        $inputs["postal_code"] = convertPersianToEnglish($inputs["postal_code"]);

        $address->update($inputs);
        return redirect()->back();
    }


    public function getCities(Province $province){
        $cities = $province->cities;
        if ($cities != null)
            return response()->json(["status" => true, "cities" => $cities]);
        else
            return response()->json(["status" => false]);
    }


    public function chooseAddressAndDelivery(ChooseAddressAndDeliveryRequest $request){
        $user = Auth::user();
        $inputs = [
            "user_id"       => $user->id,
            "address_id"    => $request->address_id,
            "delivery_id"   => $request->delivery_id
        ];

        $order = Order::updateOrCreate(
            ["user_id" => $user->id, "order_status" => 0],
            $inputs
        );
        return redirect()->route("user.salesProcess.payment");
    }

}
