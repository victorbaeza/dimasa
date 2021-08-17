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
      Schema::create('users_types', function(Blueprint $table){
        $table->smallIncrements('id');

        $table->char('name', 100);
        $table->string('description')->nullable();

        $table->timestamps();
      });

      Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->char('user',100)->unique();
          // $table->integer('role')->unsigned();
          
          $table->smallInteger('type_id')->unsigned();
          $table->foreign('type_id')->references('id')->on('users_types')->onDelete('restrict');

          $table->string('name');
          $table->string('email');
          $table->char('phone',30)->nullable();
          $table->string('password');
          $table->string('picture')->nullable();
          $table->boolean('active')->default(1);
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
        Schema::dropIfExists('users_types');
    }
}
