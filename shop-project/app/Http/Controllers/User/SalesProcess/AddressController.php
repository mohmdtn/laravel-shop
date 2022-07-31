<?php

namespace App\Http\Controllers\User\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addressAndDelivery(){

        $user = Auth::user();
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
