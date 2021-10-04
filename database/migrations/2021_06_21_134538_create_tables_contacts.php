<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_types', function(Blueprint $table){
          $table->smallIncrements('id');

          $table->char('name', 100);
          $table->string('description')->nullable();

          $table->timestamps();
        });

        Schema::create('contacts', function(Blueprint $table){
          $table->increments('id');
          $table->integer('type')->unsigned()->default(0);
          $table->char('name',50);
          $table->char('email',255);
          $table->char('phone',50)->nullable();
          $table->char('subject',100);
          $table->text('message');
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
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('contacts_types');
    }
}
