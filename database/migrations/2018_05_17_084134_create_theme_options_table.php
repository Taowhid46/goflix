<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('title', 100);
            $table->string('logo')->nullable();
            $table->string('numberOne', 24);
            $table->string('numberTwo', 24)->nullable();
            $table->string('telephone', 24)->nullable();
            $table->string('fax', 24)->nullable();

            $table->string('addressOne', 500);
            $table->string('addressTwo', 500)->nullable();
            $table->string('emailOne', 25);
            $table->string('emailTwo', 25)->nullable();
            
            $table->url('facebook', 100)->nullable();
            $table->url('twitter', 100)->nullable();
            $table->url('snapchat', 100)->nullable();
            $table->url('googlePlus', 100)->nullable();
            $table->url('linkedIn', 100)->nullable();
            $table->url('pinterest', 100)->nullable();
            $table->string('copyright', 500);
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
        Schema::dropIfExists('theme_options');
    }
}
