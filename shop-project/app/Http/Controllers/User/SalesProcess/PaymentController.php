<?php

namespace App\Http\Controllers\User\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use App\Models\Market\CashPayment;
use App\Models\Market\Copan;
use App\Models\Market\OfflinePayment;
use App\Models\Market\OnlinePayment;
use App\Models\Market\Order;
use App\Models\Market\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment(){
        $user = Auth::user();
        $cartItems = CartItem::where("user_id", $user["id"])->get();
        $order = Order::where("user_id", $user["id"])->where("order_status", 0)->first();
        return view("user.salesProcess.payment", compact("cartItems", "order"));
    }

    public function copanDiscount(Request $request){
        $request->validate([
           "copan" => "required"
        ]);

        $copan = Copan::where([ ["code" => $request->code], ["status", 1], ["end_date", ">", now()], ["start_date", "<", now()] ])->first();

        if ($copan != null){

            if ($copan->user_id != null){
                $copan = Copan::where([ ["code" => $request->code], ["status", 1], ["end_date", ">", now()], ["start_date", "<", now()], ["user_id", Auth::id()] ])->first();
                if ($copan == null){
                    return redirect()->back()->withErrors(["copan" => "کوپن وارد شده معتبر نمی باشد."]);
                }
            }


            $order = Order::where("user_id", Auth::id())->where("order_status", 0)->where("copan_id", null)->first();
            if ($order){

                if ($copan->amount_type == 0){

                    $copanDiscountAmount = $order->order_final_amount * ($copan->amount / 100);
                    if ($copanDiscountAmount > $copan->discount_ceiling){
                        $copanDiscountAmount = $copan->discount_ceiling;
                    }

                }
                else{
                    $copanDiscountAmount = $copan->amount;
                }

                $order->order_final_amount = $order->order_final_amount - $copanDiscountAmount;
                $finalDiscount = $order->order_total_products_discount_amount + $copanDiscountAmount;

                $order->update([
                    "copan_id"                              => $copan->id,
                    "order_copan_discount_amount"           => $copanDiscountAmount,
                    "order_total_products_discount_amount"  => $finalDiscount,
                ]);
                return redirect()->back()->with(["done" => "کوپن تخفیف با موفقیت اعمال شد."]);

            }
            else{
                return redirect()->back()->withErrors(["copan" => "کوپن وارد شده معتبر نمی باشد."]);
            }


        }
        else{
            dd(1);
            return redirect()->back();
        }

    }

    public function paymentSubmit(Request $request){
        $request->validate([
            "payment_type" => "required|numeric"
        ]);

        $user = Auth::user();
        $order = Order::where("user_id", $user->id)->where("order_status", 0)->first();
        $cartItems = CartItem::where("user_id", $user->id)->get();

        switch ($request->payment_type){
            case '1':
                $targetModel = OnlinePayment::class;
                $type = 0;
                break;

            case '2':
                $targetModel = OfflinePayment::class;
                $type = 1;
                break;

            case '3':
                $targetModel = CashPayment::class;
                $type = 2;
                break;

            default:
                return redirect()->back()->withErrors(["error" => "خطا!"]);
        }

        $paid = $targetModel::create([
            "amount"    => $order->order_final_amount,
            "user_id"   => $user->id,
            "pay_date"  => now(),
            "status"    => 1,
        ]);

        $payment = Payment::create([
            "amount"            => $order->order_final_amount,
            "user_id"           => $user->id,
            "pay_date"          => now(),
            "type"              => $type,
            "paymentable_id"    => $paid->id,
            "paymentable_type"  => $targetModel,
            "status"            => 1,
        ]);

        $order->update([
            "order_status" => 3,
            "payment_type" => $type
        ]);

        foreach ($cartItems as $cartItem){
            $cartItem->delete();
        }

        return redirect()->route("user.home")->with("success", "کاربر گرامی، سفارش شما با موفقیت ثبت شد.");

    }
}
