<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        * Formas de pago
        */
        Schema::create('payment_forms', function(Blueprint $table){
          $table->smallIncrements('id');

          $table->char('name', 100);
          $table->string('description')->nullable();

          $table->timestamps();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
        });

        /*
        *  Métodos de envio
        */
        Schema::create('shipping_methods', function(Blueprint $table){
            $table->smallIncrements('id');

            $table->string('description');

            $table->decimal('cost', 10, 2);
            $table->decimal('minimum_free', 10, 2)->nullable();
            $table->boolean('default')->default(0);
            $table->boolean('active')->default(1);

            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->softDeletes();
        });


        /*
        * PEDIDOS
        */
        Schema::create('orders_status', function(Blueprint $table){
          $table->smallIncrements('id');

          $table->char('name', 100);
          $table->string('description')->nullable();

          $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('erp_id')->nullable();

            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict');
            // $table->integer('status')->unsigned()->default(0);
            $table->smallInteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('orders_status')->onDelete('restrict');

            $table->char('name',255);
            $table->char('cif',50)->nullable();
            $table->dateTime('date');
            $table->char('number',50);
            $table->string('email');
            $table->char('phone', 50)->nullable();
            $table->string('address');
            $table->char('city',100);
            $table->char('postal_code',25);
            $table->char('province',100);
            $table->integer('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('restrict');
            $table->string('shipping_address');
            $table->char('shipping_city',100);
            $table->char('shipping_postal_code',25);
            $table->char('shipping_province',100);
            $table->integer('shipping_country_id')->unsigned()->nullable();
            $table->foreign('shipping_country_id')->references('id')->on('countries')->onDelete('restrict');

            $table->smallInteger('shipping_method_id')->unsigned();
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods')->onDelete('restrict');

            $table->decimal('total_weight', 19, 2)->unsigned()->default(0);
            $table->decimal('subtotal', 19, 2);
            $table->decimal('shipping_cost',10,2)->unsigned();
            $table->decimal('VAT',10,2);
            $table->decimal('discount', 19, 2)->default(0);
            $table->decimal('total',19,2);
            // $table->smallInteger('payment_form')->default(0);
            $table->smallInteger('payment_form_id')->unsigned();
            $table->foreign('payment_form_id')->references('id')->on('payment_forms')->onDelete('restrict');

            $table->string('tracking_code')->nullable();
            $table->string('uuid')->nullable();
            $table->char('observations',255)->nullable();
            $table->char('redsys_number', 12)->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->string('bank_transfer_document')->nullable();
            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->softDeletes();
        });

        Schema::create('orders_lines', function(Blueprint $table){
          $table->increments('id');
          $table->integer('order_id')->unsigned();
          $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
          $table->integer('product_id')->unsigned()->nullable();
          $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
          $table->char('product_name',255);
          $table->integer('quantity');
          $table->decimal('price_unit',10,2);
          $table->decimal('VAT', 10, 2)->default(0.21)->comment('IVA del producto en valor porcentual');
          $table->decimal('total', 19, 2)->default(0);
          $table->timestamps();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
        });

        Schema::create('postal_codes_blacklist', function(Blueprint $table){
          $table->increments('id');

          $table->char('postal_code');

          $table->timestamps();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
          $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postal_codes_blacklist');

        Schema::dropIfExists('orders_lines');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('orders_status');

        Schema::dropIfExists('shipping_methods_translations');
        Schema::dropIfExists('shipping_methods');

        Schema::dropIfExists('payment_forms');
    }
}
