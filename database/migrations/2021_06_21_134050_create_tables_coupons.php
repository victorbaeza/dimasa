<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesCoupons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->char('code', 50)->unique();
            $table->float('discount');
            $table->integer('discount_type')->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->float('minimum_price')->nullable();
            $table->integer('use_limit')->nullable();
            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->softDeletes();
        });

        Schema::create('coupons_orders', function(Blueprint $table){
          $table->bigIncrements('id');
          $table->integer('order_id')->unsigned();
          $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
          $table->integer('coupon_id')->unsigned();
          $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('restrict');

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
        Schema::dropIfExists('coupons_orders');
        Schema::dropIfExists('coupons');
    }
}
