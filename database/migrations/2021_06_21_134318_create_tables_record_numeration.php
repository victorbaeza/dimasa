<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesRecordNumeration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         //
         Schema::create('record_numeration', function(Blueprint $table){
           $table->smallIncrements('id');
           $table->char('table', 100);
           $table->char('prefix', 5);
           $table->integer('value')->default(1);
         });

         DB::table('record_numeration')->insert([
           ['id' => 1, 'table' => 'Orders', 'prefix' => 'W', 'value' => 1],
           ['id' => 2, 'table' => 'Invoices', 'prefix' => 'W', 'value' => 20200001],
         ]);
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         //
         Schema::dropIfExists('record_numeration');
     }
}
