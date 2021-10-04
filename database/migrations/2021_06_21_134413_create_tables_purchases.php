<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesPurchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         //
         Schema::create('purchases_payment_forms', function(Blueprint $table){
           $table->increments('id');

           $table->char('short_name', 50);
           $table->char('name', 50);
           $table->string('description');

           // Campos de control
           $table->timestamps();
           $table->integer('created_by')->unsigned()->nullable();
           $table->integer('updated_by')->unsigned()->nullable();
           $table->softDeletes();
         });

         Schema::create('vendors', function(Blueprint $table){
           $table->increments('id');

           $table->integer('erp_id');

           $table->string('name');
           $table->string('company_name')->nullable();
           $table->string('alias')->nullable();

           $table->char('NIF', 50)->nullable();
           $table->string('email')->nullable();
           $table->string('phone')->nullable();

           $table->string('address')->nullable();
           $table->char('city', 100)->nullable();
           $table->char('zip', 50)->nullable();
           $table->char('province', 100)->nullable();
           $table->char('country', 100)->nullable();

           $table->integer('payment_form_id')->unsigned()->nullable();
           $table->foreign('payment_form_id')->references('id')->on('purchases_payment_forms')->onDelete('set null');

           $table->string('contact_name')->nullable();
           $table->string('website')->nullable();

           $table->text('observations')->nullable();

           // Campos de control
           $table->timestamps();
           $table->integer('created_by')->unsigned()->nullable();
           $table->integer('updated_by')->unsigned()->nullable();
           $table->softDeletes();
         });


         Schema::create('purchases_status', function(Blueprint $table){
           $table->smallIncrements('id');

           $table->string('name');
           $table->string('description')->nullable();

           // Campos de control
           $table->timestamps();
         });


         Schema::create('purchases', function(Blueprint $table){
           $table->increments('id');

           $table->integer('vendor_id')->unsigned();
           $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('restrict');

           $table->dateTime('date');

           $table->smallInteger('status_id')->unsigned();
           $table->foreign('status_id')->references('id')->on('purchases_status')->onDelete('restrict');

           $table->integer('payment_form_id')->unsigned()->nullable();
           $table->foreign('payment_form_id')->references('id')->on('purchases_payment_forms')->onDelete('set null');

           $table->string('invoice_file')->nullable();

           $table->string('observations')->nullable();

           // Campos de control
           $table->timestamps();
           $table->integer('created_by')->unsigned()->nullable();
           $table->integer('updated_by')->unsigned()->nullable();
           $table->softDeletes();
         });

         Schema::create('purchases_lines', function(Blueprint $table){
           $table->increments('id');

           $table->integer('purchase_id')->unsigned();
           $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');

           $table->integer('product_id')->unsigned();
           $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');

           $table->integer('quantity');
           $table->decimal('price', 19, 2);

           $table->boolean('available')->default(1);

           // Campos de control
           $table->timestamps();
           $table->integer('created_by')->unsigned()->nullable();
           $table->integer('updated_by')->unsigned()->nullable();
           $table->softDeletes();
         });


         Schema::table('products', function(Blueprint $table){
           $table->integer('vendor_id')->unsigned()->nullable();
           $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('set null');
         });

     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         //
         Schema::dropIfExists('purchases_lines');
         Schema::dropIfExists('purchases');
         Schema::dropIfExists('purchases_status');

         Schema::dropIfExists('vendors');

         Schema::dropIfExists('purchases_payment_forms');
     }
}
