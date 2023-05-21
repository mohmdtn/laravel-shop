<?php

namespace App\Http\Controllers\User\Market;

use App\Http\Controllers\Controller;
use App\Models\Content\Comment;
use App\Models\Market\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product(Product $product){
        $relatedProducts = Product::where("status", 1)->get();
        return view("user.market.product.product", compact("relatedProducts", "product"));
    }

    public function addComment(Request $request, Product $product){
        $request->validate([
            "body" => "required|min:2|max:800|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,# ]+$/u",
        ]);

        $inputs["body"]             = str_replace(PHP_EOL, "<br/>", $request["body"]);
        $inputs["author_id"]        = Auth::user()->id;
        $inputs["commentable_id"]   = $product->id;
        $inputs["commentable_type"] = Product::class;

        Comment::create($inputs);

        return back();
    }

    public function addToFavorite(Product $product){
        if (Auth::check()) {
            $product->user()->toggle([Auth::user()->id]);
            if ($product->user->contains(Auth::user()->id)) {
                return response()->json(["status" => 1]);
            }
            else{
                return response()->json(["status" => 2]);
            }
        }
        else{
            return response()->json(["status" => 3]);
        }
    }

    public function addRate(Product $product, Request $request){
        $productIds = auth()->user()->isUserPurchedProduct($product->id);
        if (Auth::check() && $productIds->count() > 0){
            $user = Auth::user();
            if (isset($request->rating))
                $user->rate($product, $request->rating);
            else
                $user->rate($product, 0);

            return back()->with("alert-section-success", "امتیاز شما با موفقیت ثبت شد.");
        }
        else
            return back()->with("alert-section-danger", "کاربر گرامی برای ثبت امتیاز ابتدا باید محصول را خریداری کنید.");
    }
}
