<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('phone')->unique();
            $table->integer('year');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('type'); // 1 Clint 2 Seller  3 Delivery
            $table->integer('area_id')->nullable(); //for Delivery And Seller
            $table->integer('village_id')->nullable(); //for Delivery And Seller
            $table->string('photo')->nullable();
            $table->string('stuts')->default(1); // OF Account  zero Blocked
            $table->string('stuts_delivery')->nullable(); // OF Delivery null or 1 => busy
            $table->bigInteger('clint_order_num')->nullable();
            $table->bigInteger('deliver_order_num')->nullable();
            $table->bigInteger('seller_order_num')->nullable();
            $table->integer('clint_perce')->default(0);
            $table->integer('max_value')->default(1000);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
