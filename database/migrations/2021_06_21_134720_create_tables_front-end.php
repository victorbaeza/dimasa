<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesFrontEnd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        /*
        * SITEMAPS
        */
        Schema::create('sitemaps_changefreq', function(Blueprint $table){
          $table->increments('id');
          $table->char('name',20);
        });

        Schema::create('sitemaps', function(Blueprint $table){
          $table->increments('id');
          $table->integer('changefreq_id')->unsigned()->nullable();
          $table->foreign('changefreq_id')->references('id')->on('sitemaps_changefreq')->onDelete('set null');
          $table->string('loc');
          $table->dateTime('lastmod');
          $table->decimal('priority',5,2);
          $table->timestamps();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
          $table->softDeletes();
        });


        /*
        * FRONT-END TABLES
        */
        Schema::create('web_data', function(Blueprint $table){
          $table->increments('id');
          $table->char('email',150)->nullable();
          $table->char('address',200)->nullable();
          $table->char('city',100)->nullable();
          $table->char('CP',20)->nullable();
          $table->char('province',100)->nullable();
          $table->char('CIF', 50)->nullable();
          $table->char('phone',150)->nullable();
          $table->char('twitter', 150)->nullable();
          $table->char('facebook', 150)->nullable();
          $table->char('linkedin', 150)->nullable();
          $table->char('instagram', 150)->nullable();
          $table->char('whatsapp', 150)->nullable();
        });

        Schema::create('home_slider', function(Blueprint $table){
          $table->increments('id');
          $table->char('title',250)->nullable();
          $table->char('url',250)->nullable();
          $table->char('image',150);
          $table->char('alt',150)->nullable();
          $table->boolean('active')->default(1);
          $table->timestamps();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
        });

        Schema::create('newsletter_subscribers', function(Blueprint $table){
          $table->bigIncrements('id');
          $table->integer('client_id')->unsigned()->nullable();
          $table->string('email');
          $table->boolean('active')->default(1);
          $table->dateTime('unsubscribed_at')->nullable();
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
        Schema::dropIfExists('newsletter_subscribers');
        Schema::dropIfExists('home_slider');
        Schema::dropIfExists('web_data');

        Schema::dropIfExists('sitemaps');
        Schema::dropIfExists('sitemaps_changefreq');
    }
}
