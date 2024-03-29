<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use App\Models\Market\ProductColor;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return view("admin.market.product.color.index", compact("product"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view("admin.market.product.color.create", compact("product"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            "color_name"        => "required|max:150|min:2|regex:/^[ا-یa-zA-Z0-9-۰-۹ء-ي. ]+$/u",
            "color"             => "required|max:150|min:3|regex:/^[#a-zA-Z0-9 ]+$/u",
            "price_increase"    => "required|numeric",
        ]);

        $inputs = $request->all();
        $inputs["product_id"] = $product["id"];

        ProductColor::create($inputs);
        return redirect()->route("admin.market.color.index", $product["id"])->with("swal-success", "رنگ جدید با موفقیت ایجاد شد.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductColor $color)
    {
        $color->delete();
        return redirect()->route("admin.market.color.index", $product["id"])->with("swal-success", "رنگ با موفقیت حذف شد.");
    }
}
