<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverReqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliver_reqs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('deliver_id');
            $table->bigInteger('card_info_id');
            $table->integer('stuts')->nullable();
            // null لم يتم الرد
            // 0 جاري التوصيل
            // 1 تم التوصيل
            $table->string('qr_code')->nullable();
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
        Schema::dropIfExists('deliver_reqs');
    }
}
