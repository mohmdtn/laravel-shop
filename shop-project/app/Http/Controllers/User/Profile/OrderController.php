<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
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
//            dd($orders->orderItems()->singleProduct);
        }

        return view("user.profile.orders", compact("orders"));
    }

}
