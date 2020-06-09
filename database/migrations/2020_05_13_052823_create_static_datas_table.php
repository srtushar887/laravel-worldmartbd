<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_datas', function (Blueprint $table) {
            $table->id();
            $table->text('about_us')->nullable();
            $table->text('deller')->nullable();
            $table->text('return')->nullable();
            $table->text('support')->nullable();
            $table->text('privacy')->nullable();
            $table->text('team')->nullable();
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
        Schema::dropIfExists('static_datas');
    }
}
