<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produact_id');
            $table->bigInteger('seller_id');
            $table->bigInteger('clint_id');
            $table->bigInteger('process_id');
            $table->bigInteger('city_id')->nullable();
            $table->bigInteger('area_id')->nullable();
            $table->bigInteger('quantity');
            $table->bigInteger('price');
            $table->bigInteger('total');
            $table->Integer('stutus')->default(2);
            
            // 2 تم الطلب  
            // 1 تم تاكيد الطلب  
            // 0 تم الغاء الطلب  

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
        Schema::dropIfExists('cards');
    }
}