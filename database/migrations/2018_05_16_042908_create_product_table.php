<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('productName');
            $table->string('productSlug');
            $table->unique('productCode')->unique();
            $table->text('productShortDescription');
            $table->text('productLongDescription')->nullable();
            $table->float('productRegularPrice',10,2);
            $table->float('productSalePrice',10,2)->nullable();
            $table->integer('productQuantity');
            $table->integer('productImage')->nullable();
            $table->string('tagIds',100)->nullable();
            $table->integer('manufactureId');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('products');
    }
}
