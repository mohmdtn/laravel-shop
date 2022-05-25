<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Content\Banner;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $slideShowImages    = Banner::where("position", 0)->where("status", 1)->latest()->get();
        $topBanners         = Banner::where("position", 1)->where("status", 1)->latest()->take(2)->get();
        $middleBanners      = Banner::where("position", 2)->where("status", 1)->latest()->take(2)->get();
        $bottomBanner       = Banner::where("position", 3)->where("status", 1)->latest()->first();

        $brands = Brand::where("status", 1)->get();

        $mostVisitedProducts    = Product::where("status", 1)->latest()->take(10)->get();
        $offerProducts          = Product::where("status", 1)->latest()->take(10)->get();

        return view("user.home", compact("slideShowImages", "topBanners", "middleBanners", "bottomBanner", "brands", "mostVisitedProducts", "offerProducts"));
    }
}
