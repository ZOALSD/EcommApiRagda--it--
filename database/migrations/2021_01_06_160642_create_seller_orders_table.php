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
            $table->bigInteger('deliver_id')->nullable();
            $table->string('qrcode');
            $table->string('num_receipt')->nullable();
            $table->text('note')->nullable();
            $table->bigInteger('stutus_admin')->nullable();
            //null => not Confirm
            //1 => Comfirmed
            $table->bigInteger('stutus_clint')->nullable();
            //null => not Confirm
            //1 => Comfirmed
            $table->bigInteger('stutus_deliver')->nullable();
            //null => Note Taket From Seller And Note Scan QRcode
            //1 => Done Taket From Seller And Scan QRcode
            $table->bigInteger('stutus_seller')->nullable();
            /// 0=> Done Accept it
            /// 1=> Done Ready
            $table->date('datee');
            $table->time('houre');
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
