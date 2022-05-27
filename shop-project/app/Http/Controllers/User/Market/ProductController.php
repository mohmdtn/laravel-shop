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
}
