<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('invoices', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('client_id')->unsigned()->nullable();
          $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict');

          $table->char('number',50);

          $table->integer('order_id')->unsigned();
          $table->foreign('order_id')->references('id')->on('orders')->onDelete('restrict');

          $table->char('name',255);
          $table->char('cif',50)->nullable();
          $table->dateTime('date');
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

          $table->decimal('subtotal', 19, 2);
          $table->decimal('shipping_cost',10,2)->unsigned();
          $table->decimal('VAT',10,2);
          $table->decimal('discount', 19, 2)->default(0);
          $table->decimal('total',19,2);

          $table->smallInteger('payment_form_id')->unsigned();
          $table->foreign('payment_form_id')->references('id')->on('payment_forms')->onDelete('restrict');

          $table->char('observations',255)->nullable();

          $table->timestamps();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
          $table->integer('deleted_by')->unsigned()->nullable();
          $table->softDeletes();
      });

      Schema::create('invoices_lines', function(Blueprint $table){
        $table->increments('id');
        $table->integer('invoice_id')->unsigned();
        $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices_lines');
        Schema::dropIfExists('invoices');
    }
}
