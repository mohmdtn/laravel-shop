<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // content
            [ "name" => "show-content", "description" => "نمایش پست ها و دسته بندی ها در قسمت محتوی" ],
            [ "name" => "show-content-comment", "description" => "نمایش کامنت ها در قسمت محتوی" ],
            [ "name" => "show-faq", "description" => "نمایش سوالات متداول در قسمت محتوی" ],
            [ "name" => "show-add-menu", "description" => "نمایش منو ساز در قسمت محتوی" ],
            [ "name" => "show-create-page", "description" => "نمایش پیج ساز در قسمت محتوی" ],
            [ "name" => "show-banners", "description" => "نمایش بنر در قسمت محتوی" ],
            // users
            [ "name" => "show-users", "description" => "نمایش یوزر ها در قسمت کاربران" ],
            [ "name" => "show-admins", "description" => "نمایش ادمین ها در قسمت کاربران" ],
            [ "name" => "add-admins", "description" => "اضافه کردن ادمین در قسمت کاربران" ],
            // tickets
            [ "name" => "show-tickets", "description" => "مدیریت تیکت ها قسمت تیکت" ],
            // notifications
            [ "name" => "notifications", "description" => "دسترسی به قسمت اطلاع رسانی" ],
            // market
            [ "name" => "access-orders-important", "description" => "دسترسی به بخش ویترین در قسمت فروشگاه" ],
            [ "name" => "access-orders", "description" => "دسترسی به سفارشات در قسمت فروشگاه" ],
            [ "name" => "access-payments", "description" => "دسترسی به پرداخت ها در قسمت فروشگاه" ],
            [ "name" => "access-discounts", "description" => "دسترسی به تخفیف ها در قسمت فروشگاه" ],
            // settings
            [ "name" => "access-settings", "description" => "دسترسی به تنظیمات سایت در قسمت تنظیمات" ],
        ];
        DB::table("permissions")->insert($data);
    }
}
