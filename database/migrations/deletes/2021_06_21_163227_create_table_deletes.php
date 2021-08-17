<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDeletes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deletes', function (Blueprint $table) {
            $table->id();

            $table->integer('old_id')->unsigned();
            $table->string('table');
            $table->text('content');
            $table->timestamps();
            $table->integer('deleted_by')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deletes');
    }
}
