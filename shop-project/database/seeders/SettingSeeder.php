<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("settings")->insert([
            "title"         => "عنوان سایت",
            "description"   => "توضیحات سایت",
            "address"       => "ایران بابل",
            "telegram"      => "https://www.telegram.com",
            "instagram"     => "https://www.instagram.com",
            "whatsapp"      => "https://www.whatsapp.com",
            "email"         => "test@gmail.com",
            "phone"         => "09111111111",
            "keywords"      => "کلمات کلیدی سایت",
            "logo"          => "logo.png",
            "icon"          => "icon.png",
        ]);
    }
}
