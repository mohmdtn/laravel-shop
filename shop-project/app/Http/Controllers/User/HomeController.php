<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Content\Banner;
use App\Models\Content\Post;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function home(){
        $slideShowImages    = Banner::where("position", 0)->where("status", 1)->latest()->get();
        $topBanners         = Banner::where("position", 1)->where("status", 1)->latest()->take(2)->get();
        $middleBanners      = Banner::where("position", 2)->where("status", 1)->latest()->take(2)->get();
        $bottomBanner       = Banner::where("position", 3)->where("status", 1)->latest()->first();

        $brands = Brand::where("status", 1)->get();

        $mostVisitedProducts    = Product::where("status", 1)->where("published_at", "<", Carbon::now())->latest()->take(10)->get();
        $offerProducts          = Product::where("status", 1)->where("published_at", "<", Carbon::now())->latest()->take(10)->get();

        $posts                  = Post::where("status", 1)->where("published_at", "<", Carbon::now())->latest()->take(10)->get();

        return view("user.home", compact("slideShowImages", "topBanners", "middleBanners", "bottomBanner", "brands", "mostVisitedProducts", "offerProducts", "posts"));
    }

    public function products(Request $request, ProductCategory $category = null){
        // get brands
        $brands = Brand::where("status", 1)->get();
        // get category for filter
        if ($category){
            $productModel = $category->products();
        }
        else{
            $productModel = new Product();
        }
        // get categories
        $categories = ProductCategory::whereNull("parent_id")->where("status", 1)->where("show_in_menu", 1)->get();

        // filter for sort
        switch ($request->sort) {
            case "1":
                $column = "created_at";
                $direction = "DESC";
                break;
            case "2":
                $column = "price";
                $direction = "DESC";
                break;
            case "3":
                $column = "price";
                $direction = "ASC";
                break;
            case "4":
                $column = "view";
                $direction = "DESC";
                break;
            case "5":
                $column = "sold_number";
                $direction = "DESC";
                break;
            default:
                $column = "created_at";
                $direction = "ASC";
        }
        // filter for search
        if($request->search){
            $query = $productModel->where("name", "LIKE", "%" . $request->search . "%")->orderBy($column, $direction);
        }
        else{
            $query = $productModel->orderBy($column, $direction);
        }
        // filter for price
        $products = $request->max_price && $request->min_price ? $query->whereBetween("price", [$request->min_price, $request->max_price])
            : $query->when($request->min_price, function ($query) use($request){
                $query->where("price", ">=", $request->min_price)->get();
            })->when($request->max_price, function ($query) use($request){
                $query->where("price", "<=", $request->max_price)->get();
            })->when(!($request->min_price && $request->max_price), function ($query){
                $query->get();
            });
        // filter for brands
        $products = $products->when($request->brands, function () use($request, $products) {
            $products->whereIn("brand_id", $request->brands)->get();
        });
        $products = $products->where("published_at", "<", Carbon::now())->paginate(12);
        $products->appends($request->query());

        // get selected brands
        $selectedBrandsArray = [];
        if ($request->brands){
            $selectedBrands = Brand::find($request->brands);
            foreach ($selectedBrands as $selectedBrand){
                array_push($selectedBrandsArray, $selectedBrand["original_name"]);
            }
        }

        return view("user.market.product.products", compact("products", "brands", 'selectedBrandsArray', 'categories'));
    }

    public function search(Request $request){
        $length = Str::length($request->search);

        if($length > 2){
            $products   = Product::select("id", "name", "slug")->where("name", "LIKE", "%" . $request->search . "%")->take(3)->get();
            $brands     = Brand::select("id", "persian_name")->where("persian_name", "LIKE", "%" . $request->search . "%")->take(3)->get();
            $categories = ProductCategory::select("id", "name")->where("name", "LIKE", "%" . $request->search . "%")->take(3)->get();
            return response()->json([ "status" => true, "data" => ["products" => $products, "brands" => $brands, "categories" => $categories] ]);
        }
        else{
            return response()->json([ "status" => false ]);
        }
    }

}
