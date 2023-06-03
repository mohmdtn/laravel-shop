<?php

namespace App\Http\Controllers\User\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SalesProcess\AddAddressRequest;
use App\Http\Requests\User\SalesProcess\ChooseAddressAndDeliveryRequest;
use App\Models\Market\Address;
use App\Models\Market\CartItem;
use App\Models\Market\CommonDiscount;
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
        // calc price
        $cartItems = CartItem::where("user_id", $user->id)->get();
        $total_product_price = 0;
        $total_discount = 0;
        $total_final_price = 0;
        $total_final_discount_price_with_number = 0;
        $delivery_price = Delivery::find($request->delivery_id)->first();
        $finalPrice = 0;

        foreach ($cartItems as $cartItem){
            $total_product_price                        += $cartItem->cartItemProductPrice();
            $total_discount                             += $cartItem->cartItemProductDiscount();
            $total_final_price                          += $cartItem->cartItemFinalPrice();
            $total_final_discount_price_with_number     += $cartItem->cartItemFinalDiscount();
        }

        // common discount
        $commonDiscount = CommonDiscount::where([["status", 1], ["end_date" ,">", now()], ["start_date", "<", now()]])->first();
        if ($commonDiscount){
            $commonDiscountId = $commonDiscount->id;
            $commonDiscountPercentage = $total_final_price * ($commonDiscount["percentage"] / 100);

            if ($commonDiscountPercentage > $commonDiscount["discount_ceiling"]){
                $commonDiscountPercentage = $commonDiscount["discount_ceiling"];
            }

            if ($total_final_price >= $commonDiscount["minimal_order_amount"]){
                $finalPrice = $total_final_price - $commonDiscountPercentage;
            }

            else{
                $finalPrice = $total_final_price;
            }
        }
        else{
            $commonDiscountPercentage = null;
            $finalPrice = $total_final_price;
            $commonDiscountId = null;
        }

        $inputs = [
            "user_id"                               => $user->id,
            "address_id"                            => $request->address_id,
            "delivery_id"                           => $request->delivery_id,
            "order_final_amount"                    => $finalPrice + $delivery_price->amount,
            "order_discount_amount"                 => $total_final_discount_price_with_number,
            "common_discount_id"                    => $commonDiscountId,
            "order_common_discount_amount"          => $commonDiscountPercentage,
        ];
        $inputs["order_total_products_discount_amount"] = $inputs["order_discount_amount"] + $inputs["order_common_discount_amount"];

        $order = Order::updateOrCreate(
            ["user_id" => $user->id, "order_status" => 0],
            $inputs
        );
        return redirect()->route("user.salesProcess.payment");
    }

}
