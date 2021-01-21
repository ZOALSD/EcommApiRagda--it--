<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardProDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_pro_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('card_data_id');
            $table->bigInteger('produact_id');
            $table->bigInteger('seller_id');
            $table->bigInteger('quantity');
            $table->bigInteger('price');

            $table->bigInteger('seller_percent')->nullable();
            $table->bigInteger('our_percent')->nullable();
            $table->bigInteger('total')->nullable();

            $table->bigInteger('deliver_stutus')->nullable();

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
        Schema::dropIfExists('card_pro_data');
    }
}
