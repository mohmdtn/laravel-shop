<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\AmazingSaleRequest;
use App\Http\Requests\Admin\Market\CommonDiscountRequest;
use App\Http\Requests\Admin\Market\CopanRequest;
use App\Models\Market\AmazingSale;
use App\Models\Market\CommonDiscount;
use App\Models\Market\Copan;
use App\Models\Market\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function copan(){
        $copans = Copan::orderBy("created_at", "desc")->get();
        return view("admin.market.discount.copan", compact("copans"));
    }


    public function copanCreate(){
        return view("admin.market.discount.copanCreate");
    }

    public function copanGetUsers(){
        $users = User::all();
        return response()->json(["status" => true , "users" => $users]);
    }


    public function copanStore(CopanRequest $request){
        $inputs = $request->all();

        // date fix
        $realTimestampStart = substr($request["start_date"] ,0 ,10);
        $inputs["start_date"] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampStart = substr($request["end_date"] ,0 ,10);
        $inputs["end_date"] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        if($inputs["type"] == 0){
            $inputs["user_id"] = null;
        }
        Copan::create($inputs);
        return redirect()->route("admin.market.discount.copan")->with("swal-success" , "کوپن تخفیف جدید با موفقیت ثبت شد.");
    }


    public function copanEdit(Copan $copan){
        $users = User::all();
        return view("admin.market.discount.copanEdit", compact("copan", "users"));
    }


    public function copanUpdate(CopanRequest $request, Copan $copan){
        $inputs = $request->all();

        // date fix
        $realTimestampStart = substr($request["start_date"] ,0 ,10);
        $inputs["start_date"] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampStart = substr($request["end_date"] ,0 ,10);
        $inputs["end_date"] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        if($inputs["type"] == 0){
            $inputs["user_id"] = null;
        }
        $copan->update($inputs);
        return redirect()->route("admin.market.discount.copan")->with("swal-success" , "کوپن تخفیف با موفقیت ویرایش شد.");
    }

    public function copanDestroy(Copan $copan) {
        $copan->delete();
        return redirect()->route("admin.market.discount.copan")->with("swal-success" , "کوپن تخفیف با موفقیت حذف شد.");
    }


    public function copanStatus(Copan $copan){

        $copan["status"] = $copan["status"] == 0 ? 1 : 0;
        $result = $copan->save();

        if ($result){
            if ($copan["status"] == 0){
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




    public function commonDiscount(){
        $commonDiscounts = CommonDiscount::orderBy("created_at", "desc")->get();
        return view("admin.market.discount.common", compact("commonDiscounts"));
    }


    public function commonDiscountCreate(){
        return view("admin.market.discount.commonCreate");
    }


    public function commonDiscountStore(CommonDiscountRequest $request){
        $inputs = $request->all();

        // date fix
        $realTimestampStart = substr($request["start_date"] ,0 ,10);
        $inputs["start_date"] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampStart = substr($request["end_date"] ,0 ,10);
        $inputs["end_date"] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        CommonDiscount::create($inputs);
        return redirect()->route("admin.market.discount.commonDiscount")->with("swal-success" , "تخفیف عمومی با موفقیت ثبت شد.");
    }


    public function commonDiscountEdit(CommonDiscount $commonDiscount){
        return view("admin.market.discount.commonEdit", compact("commonDiscount"));
    }


    public function commonDiscountUpdate(CommonDiscountRequest $request, CommonDiscount $commonDiscount){
        $inputs = $request->all();

        // date fix
        $realTimestampStart = substr($request["start_date"] ,0 ,10);
        $inputs["start_date"] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampStart = substr($request["end_date"] ,0 ,10);
        $inputs["end_date"] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        $commonDiscount->update($inputs);
        return redirect()->route("admin.market.discount.commonDiscount")->with("swal-success" , "تخفیف عمومی با موفقیت ویرایش شد.");
    }


    public function commonDiscountDestroy(CommonDiscount $commonDiscount) {
        $commonDiscount->delete();
        return redirect()->route("admin.market.discount.commonDiscount")->with("swal-success" , "تخفیف عمومی با موفقیت حذف شد.");
    }


    public function commonDiscountStatus(CommonDiscount $commonDiscount){

        $commonDiscount["status"] = $commonDiscount["status"] == 0 ? 1 : 0;
        $result = $commonDiscount->save();

        if ($result){
            if ($commonDiscount["status"] == 0){
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





    public function amazingSale(){
        $amazingSales = AmazingSale::orderBy("created_at", "desc")->get();
        return view("admin.market.discount.amazing", compact("amazingSales"));
    }

    public function amazingSaleCreate(){
        $products = Product::orderBy("created_at", "desc")->get();
        return view("admin.market.discount.amazingCreate", compact("products"));
    }

    public function amazingSaleStore(AmazingSaleRequest $request){
        $inputs = $request->all();

        // date fix
        $realTimestampStart = substr($request["start_date"] ,0 ,10);
        $inputs["start_date"] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampStart = substr($request["end_date"] ,0 ,10);
        $inputs["end_date"] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        AmazingSale::create($inputs);
        return redirect()->route("admin.market.discount.amazingSale")->with("swal-success" , "فروش شگفت انگیز جدید با موفقیت ثبت شد.");
    }

    public function amazingSaleEdit(AmazingSale $amazingSale){
        $products = Product::orderBy("created_at", "desc")->get();
        return view("admin.market.discount.amazingEdit", compact("products", "amazingSale"));
    }

    public function amazingSaleUpdate(AmazingSaleRequest $request, AmazingSale $amazingSale){
        $inputs = $request->all();

        // date fix
        $realTimestampStart = substr($request["start_date"] ,0 ,10);
        $inputs["start_date"] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampStart = substr($request["end_date"] ,0 ,10);
        $inputs["end_date"] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        $amazingSale->update($inputs);
        return redirect()->route("admin.market.discount.amazingSale")->with("swal-success" , "فروش شگفت انگیز با موفقیت ویرایش شد.");
    }

    public function amazingSaleDestroy(AmazingSale $amazingSale) {
        $amazingSale->delete();
        return redirect()->route("admin.market.discount.amazingSale")->with("swal-success" , "فروش شگفت انگیز با موفقیت حذف شد.");
    }

    public function amazingSaleStatus(AmazingSale $amazingSale){

        $amazingSale["status"] = $amazingSale["status"] == 0 ? 1 : 0;
        $result = $amazingSale->save();

        if ($result){
            if ($amazingSale["status"] == 0){
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
