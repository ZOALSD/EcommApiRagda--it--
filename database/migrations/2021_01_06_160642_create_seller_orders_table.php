<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('card_cata_id');
            $table->bigInteger('seller_id');
            $table->bigInteger('clint_id');
            $table->string('qrcode');
            $table->bigInteger('stutus_clint')->nullable();
            //null => not Confirm
            //1 => Comfirmed
            $table->bigInteger('stutus_seller')->nullable();
            /// 1=> Done Delivered
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
        Schema::dropIfExists('seller_orders');
    }
}
