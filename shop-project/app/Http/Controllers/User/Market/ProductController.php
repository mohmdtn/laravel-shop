<?php

namespace App\Http\Controllers\User\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(Product $product){
        $relatedPosts = Product::all();
        return view("user.market.product.product", compact("relatedPosts", "product"));
    }

    public function addComment(){

    }
}
