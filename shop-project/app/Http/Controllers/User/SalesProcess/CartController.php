<?php

namespace App\Http\Controllers\User\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use App\Models\Market\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart(){
        if (Auth::check()){
            $cartItems = CartItem::where("user_id", Auth::user()->id)->get();
            if ($cartItems->count() > 0){
                $relatedProducts = Product::all();
                return view("user.salesProcess.cart", compact("cartItems", "relatedProducts"));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect()->route("auth.user.loginRegisterForm");
        }
    }


    public function update(Request $request){
        $inputs = $request->all();
        $cartItems = CartItem::where("user_id", Auth::id())->get();
        foreach ($cartItems as $cartItem){
            if(isset($inputs["number"][$cartItem->id]))
                $cartItem->update(["number" => $inputs["number"][$cartItem->id]]);
        }
        return redirect()->route("user.salesProcess.addressAndDelivery");
    }


    public function add(Product $product, Request $request){
        $inputs = $request->all();

        if (Auth::check()){
            $validate = $request->validate([
                "color"     => "nullable|exists:product_colors,id",
                "guarantee" => "nullable|exists:guarantees,id",
                "number"    => "numeric|min:1|max:5",
            ]);

            $cartItems = CartItem::where("product_id", $product["id"])->where("user_id", Auth::user()->id)->get();

            if (!isset($inputs["color"])){
                $inputs["color"] = null;
            }
            if (!isset($inputs["guarantee"])){
                $inputs["guarantee"] = null;
            }

            foreach ($cartItems as $cartItem){
                if ($cartItem["color_id"] == $inputs["color"] && $cartItem["guarantee_id"] == $inputs["guarantee"]){
                    if ($cartItem["number"] != $inputs["number"]){
                        $cartItem->update(["number" => $inputs["number"]]);
                    }
                    return back()->with("alert-section-success", "محصول مورد نظر با موفقیت در سبد خرید ویرایش شد.");
                }
            }

            $data = [
                "color_id"      => $request["color"],
                "guarantee_id"  => $request["guarantee"],
                "user_id"       => Auth::user()->id,
                "product_id"    => $product->id,
                "number"        => $request["number"]
            ];

            CartItem::create($data);
            return back()->with("alert-section-success", "محصول مورد نظر با موفقیت به سبد خرید اضافه شد.");
        }
        else{
            return redirect()->route("auth.user.loginRegisterForm");
        }
    }


    public function remove(CartItem $cartItem){
        if ($cartItem["user_id"] == Auth::user()->id){
            $cartItem->delete();
        }
        return  redirect()->route("user.home");
    }
}
