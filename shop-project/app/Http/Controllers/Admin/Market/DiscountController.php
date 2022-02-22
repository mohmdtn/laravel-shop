<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CommonDiscountRequest;
use App\Models\Market\CommonDiscount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function copan(){
        return view("admin.market.discount.copan");
    }

    public function copanCreate(){
        return view("admin.market.discount.copanCreate");
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
        return view("admin.market.discount.amazing");
    }

    public function amazingSaleCreate(){
        return view("admin.market.discount.amazingCreate");
    }
}
