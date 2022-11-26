<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(){
        return view("user.profile.myFavorites");
    }

    public function delete(Product $product){
        $user = Auth::user();
        $user->products()->detach($product);
        return redirect()->route("user.profile.favorites")->with("success", "محصول با موفقیت از علاقه مندی ها حذف شد.");
    }
}
