<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->text("description")->nullable();
            $table->text("keywords")->nullable();
            $table->text("telegram")->nullable();
            $table->text("instagram")->nullable();
            $table->text("whatsapp")->nullable();
            $table->text("phone")->nullable();
            $table->text("email")->nullable();
            $table->text("address")->nullable();
            $table->text("logo")->nullable();
            $table->text("icon")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
