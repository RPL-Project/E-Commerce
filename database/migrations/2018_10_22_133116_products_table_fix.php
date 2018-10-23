<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsTableFix extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('product_type_id')->unsigned();
            $table->string('product_name');
            $table->string('product_price');
            $table->text('product_desc');
            $table->text('other_product_desc')->nullable();
            $table->timestamps();

            $table->foreign('product_type_id')->references('product_type_id')->on('product_types')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
