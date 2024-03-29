<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductRequest;
use App\Http\Services\image\ImageService;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use App\Models\Market\ProductMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy("created_at", "desc")->paginate(20);
        return view("admin.market.product.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        $brands = Brand::all();
        return view("admin.market.product.create", compact("categories", "brands"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();

        // date fix
        $realTimestampStart = substr($request["published_at"] ,0 ,10);
        $inputs["published_at"] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        if ($request->hasFile("image")){
            $imageService->setExclusiveDirectory("images" . DIRECTORY_SEPARATOR . "product");
            $result = $imageService->createIndexAndSave($request->file("image"));

            if ($result === false){
                return redirect()->route("admin.market.product.index")->with("swal-error" , "آپلود تصویر با خطا مواجه شد.");
            }

            $inputs["image"] = $result;
        }

        DB::transaction(function () use ($request, $inputs){
            $product = Product::create($inputs);

            $metas = array_combine($request["meta_key"], $request["meta_value"]);
            foreach ($metas as $key => $meta){
                ProductMeta::create([
                    "meta_key"      => $key,
                    "meta_value"    => $meta,
                    "product_id"    => $product->id
                ]);
            }
        });

        return redirect()->route("admin.market.product.index")->with("swal-success" , "محصول جدید با موفقیت ثبت شد.");
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
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        $brands = Brand::all();
        return view("admin.market.product.edit", compact("categories", "brands", "product"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product, ImageService $imageService)
    {
        $inputs = $request->all();

        // date fix
        $realTimestampStart = substr($request["published_at"] ,0 ,10);
        $inputs["published_at"] = date("Y-m-d H:i:s", (int)$realTimestampStart);


        if ($request->hasFile("image")){
            if (!empty($product["image"])){
                $imageService->deleteDirectoryAndFiles($product["image"]["directory"]);
            }

            $imageService->setExclusiveDirectory("images" . DIRECTORY_SEPARATOR . "product");
            $result = $imageService->createIndexAndSave($request->file("image"));

            if ($result === false){
                return redirect()->route("admin.content.product.index")->with("swal-error" , "آپلود تصویر با خطا مواجه شد.");
            }

            $inputs["image"] = $result;
        }

        DB::transaction(function () use ($request, $inputs, $product){
            $product->update($inputs);

            if ($request["meta_key"] != null){
                $meta_keys = $request["meta_key"];
                $meta_values = $request["meta_value"];
                $meta_ids = array_keys($request["meta_key"]);

                $metas = array_map(function ($meta_id, $meta_key, $meta_value){
                    return array_combine(
                        ["meta_id", "meta_key", "meta_value"],
                        [$meta_id, $meta_key, $meta_value]
                    );
                }, $meta_ids, $meta_keys, $meta_values); // qesmate 298 daqiqe 46

//            $metas = array_combine($request["meta_key"], $request["meta_value"]);
                foreach ($metas as $meta){
                    ProductMeta::where("id", $meta["meta_id"])->update([
                        "meta_key"      => $meta["meta_key"],
                        "meta_value"    => $meta["meta_value"]
                    ]);
                }
            }

        });

        return redirect()->route("admin.market.product.index")->with("swal-success" , "محصول جدید با موفقیت ویرایش شد.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("admin.market.product.index")->with("swal-success" , "محصول شما با موفقیت حذف شد.");
    }

    public function status(Product $product){

        $product["status"] = $product["status"] == 0 ? 1 : 0;
        $result = $product->save();

        if ($result){
            if ($product["status"] == 0){
                return response()->json(["status" => true , "checked" => false]);
            }
            else{
                return response()->json(["status" => true , "checked" => true]);
            }
        }
        else{
            return response()->json(["status" => false]);
        }

    }
}
