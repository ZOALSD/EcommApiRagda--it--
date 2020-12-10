<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.4 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.4 | https://it.phpanonymous.com]
class CreateProduactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->string('cate_name');
            $table->string('color_id');//->unsigned()->nullable();
            //$table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->bigInteger('price')->nullable();
            $table->bigInteger('size_id')->unsigned()->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->string('cate_image')->nullable();
            $table->longtext('cate_disc')->nullable();
            $table->bigInteger('cate_id')->unsigned()->nullable();
            $table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('request')->nullable()->default(1);
            $table->softDeletes();

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
        Schema::dropIfExists('produacts');
    }
}