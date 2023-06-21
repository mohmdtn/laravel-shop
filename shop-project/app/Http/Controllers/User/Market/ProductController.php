<?php

namespace App\Http\Controllers\User\Market;

use App\Http\Controllers\Controller;
use App\Models\Content\Comment;
use App\Models\Market\Compare;
use App\Models\Market\Product;
use App\Notifications\NewComment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product(Product $product){
//        $relatedProducts = Product::where("status", 1)->where("published_at", "<", Carbon::now())->get();
        $relatedProducts = Product::with('category')->whereHas('category', function ($q) use ($product){
            $q->where("id" , $product->category->id);
        })->where("status", 1)->where("published_at", "<", Carbon::now())->get()->except($product->id);
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

        $comment = Comment::create($inputs);

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

    public function addToCompare(Product $product){
        if (Auth::check()) {
            $user = Auth::user();

            if($user->compare->products->count() <= 3) {
                if ($user->compare()->count() > 0)
                    $userCompareList = $user->compare;
                else
                    $userCompareList = Compare::create(["user_id" => $user->id]);

                $product->compares()->toggle([$userCompareList->id]);

                if ($product->compares->contains($userCompareList->id))
                    return response()->json(["status" => 1]);
                else
                    return response()->json(["status" => 2]);
            }
            else {
                return response()->json(["status" => 4]);
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
