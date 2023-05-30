<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        auth()->loginUsingId(1);
        $mostSalesProducts = Product::select("name", "sold_number")->orderBy("sold_number", "desc")->take(8)->get();
        $mostViewsProducts = Product::select("name", "view")->orderBy("view", "desc")->take(5)->get();
        return view("admin.index", compact("mostSalesProducts", "mostViewsProducts"));
    }
}
