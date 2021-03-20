<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('address')->nullable();
            $table->string('number',14)->nullable();
            $table->string('email',100)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamps('deleted')->nullable();
            $table->tinyInt('status',1)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            Schema::dropIfExists('customers');
        });
    }
}
