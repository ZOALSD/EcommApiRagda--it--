<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('clint_id');
            $table->bigInteger('area_id')->nullable();
            $table->bigInteger('village_id')->nullable();
            $table->string('near_flg')->nullable();
            $table->bigInteger('order_num')->nullable();
            $table->bigInteger('deliver_id')->nullable();
            $table->string('qr_code')->nullable();
            $table->Integer('clint_stutus')->nullable();
            //null => Just Request
            // own => Comfirmed Requested
            // zero => Cancel Requested
            $table->Integer('deliver_stutus')->nullable();
            //null => Not Accept Request
            // zero => Accepted Requested
            // own => Delivered Done Successfully
            $table->Integer('admin_stutus')->nullable();

            //null => Not Accept Request
            // own => Accept Request

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
        Schema::dropIfExists('card_data');
    }
}
