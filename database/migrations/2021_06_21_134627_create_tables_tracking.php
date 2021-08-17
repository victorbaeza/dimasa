<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTracking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         //
         Schema::create('tracking_visits', function(Blueprint $table){
           $table->id();

           $table->string('uuid');
           $table->boolean('is_mobile')->default(0);

           $table->timestamps();
         });


         Schema::create('tracking_visits_referers', function(Blueprint $table){
           $table->smallIncrements('id');

           $table->char('name', 150);
           $table->timestamps();
         });

         DB::table('tracking_visits_referers')->insert([
             ['id' => 1, 'name' => 'google'],
             ['id' => 2, 'name' => 'facebook'],
             ['id' => 3, 'name' => 'instagram'],
             ['id' => 4, 'name' => 'twitter'],
             ['id' => 5, 'name' => 'linkedin'],
             ['id' => 6, 'name' => 'tiktok'],
         ]);


         Schema::create('tracking_sessions', function (Blueprint $table) {
             $table->id();

             $table->bigInteger('visit_id')->unsigned();
             $table->foreign('visit_id')->references('id')->on('tracking_visits')->onDelete('restrict');

             $table->boolean('add_to_cart')->default(0);
             $table->boolean('checkout')->default(0);
             $table->boolean('order_completed')->default(0);

             $table->integer('order_id')->unsigned()->nullable();
             $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

             $table->string('utm_source')->nullable();
             $table->string('utm_medium')->nullable();
             $table->string('utm_name')->nullable();
             $table->string('utm_term')->nullable();
             $table->string('utm_content')->nullable();
             $table->string('user_agent')->nullable();
             $table->string('referer')->nullable();

             $table->smallInteger('referer_id')->unsigned()->nullable();
             $table->foreign('referer_id')->references('id')->on('tracking_visits_referers')->onDelete('restrict');

             $table->char('ip', 25)->nullable();

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
         //
         Schema::dropIfExists('tracking_sessions');
         Schema::dropIfExists('tracking_visits');
     }
}
