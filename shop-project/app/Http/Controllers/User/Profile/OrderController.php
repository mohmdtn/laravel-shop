<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\Market\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){

        if (isset(request()->type)){
            $orders = Auth::user()->orders()->where("order_status", request()->type)->orderBy("id", "desc")->get();
        }
        else{
            $orders = Auth::user()->orders()->orderBy("id", "desc")->get();
        }

        return view("user.profile.orders", compact("orders"));
    }

    public function show(Order $order){
        return view("user.profile.show-order", compact("order"));
    }

}
