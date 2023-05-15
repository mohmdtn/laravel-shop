<?php

namespace App\Http\Services\Message\Sms;

use Kavenegar;

class KaveNegarService
{
    public function sendSmsKavenegar($from, $to, $text){
        try{
            $sender     = $from;
            $message    = $text;
            $receptor   = $to;

            $result = Kavenegar::Send($sender,$receptor,$message);
            if($result){
//                foreach($result as $r){
//                    echo "messageid     = $r->messageid";
//                    echo "message       = $r->message";
//                    echo "status        = $r->status";
//                    echo "statustext    = $r->statustext";
//                    echo "sender        = $r->sender";
//                    echo "receptor      = $r->receptor";
//                    echo "date          = $r->date";
//                    echo "cost          = $r->cost";
//                }
                return true;
            }
        }
        catch(\Kavenegar\Exceptions\ApiException $e){
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            dd(1);
            echo $e->errorMessage();
        }
        catch(\Kavenegar\Exceptions\HttpException $e){
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            dd(2);
            echo $e->errorMessage();
        }
    }




    public function verifyKavenegar($from, $to, $text, $bodyId){
        try{
            $sender     = $from;
            $token      = $text;
            $receptor   = $to;
//            $template   = $bodyId;

            $result = Kavenegar::VerifyLookup($receptor, $token, $template);
            if($result){
                return true;
            }
        }
        catch(\Kavenegar\Exceptions\ApiException $e){
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            echo $e->errorMessage();
        }
        catch(\Kavenegar\Exceptions\HttpException $e){
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            echo $e->errorMessage();
        }
    }
}
