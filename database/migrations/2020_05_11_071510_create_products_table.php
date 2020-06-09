<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->integer('top_cat_id')->nullable();
            $table->integer('mid_cat_id')->nullable();
            $table->integer('end_cat_id')->nullable();
            $table->integer('size_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->string('old_price')->nullable();
            $table->string('new_price')->nullable();
            $table->text('main_image')->nullable();
            $table->text('image_one')->nullable();
            $table->text('image_two')->nullable();
            $table->text('image_three')->nullable();
            $table->text('image_four')->nullable();
            $table->text('image_five')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->nullable();
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
