<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_types', function(Blueprint $table){
            $table->increments('product_type_id');
            $table->string('product_type_desc');
            // $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('product_type_id')->unsigned();
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_color');
            $table->string('product_size');
            $table->text('product_desc');
            $table->text('other_product_desc')->nullable();
            $table->timestamps();

            $table->foreign('product_type_id')->references('product_type_id')->on('product_types')->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('product_images', function(Blueprint $table){
            $table->integer('product_id')->unsigned();
            $table->string('file_name');
            $table->string('file_size');
            $table->string('file_type');
            // $table->timestamps();

            $table->foreign('product_id')->references('product_id')->on('products')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_types');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_images');
    }
}
