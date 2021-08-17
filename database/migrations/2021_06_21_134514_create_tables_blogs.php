<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // BLOGS
        Schema::create('blogs_categories', function(Blueprint $table){
          $table->increments('id');

          $table->char('name',100);
          $table->string('description')->nullable();

          $table->string('slug');
          $table->string('keywords')->nullable();
          $table->string('title_seo')->nullable();
          $table->text('description_seo')->nullable();

          $table->timestamps();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
          $table->integer('deleted_by')->unsigned()->nullable();
          $table->softDeletes();
        });

        Schema::create('blogs', function(Blueprint $table){
          $table->increments('id');

          $table->string('title');
          $table->string('description')->nullable();
          $table->text('content')->nullable();
          $table->char('slug', 255);
          $table->string('keywords')->nullable();
          $table->string('title_seo')->nullable();
          $table->text('description_seo')->nullable();

          $table->char('image',150)->nullable();
          $table->boolean('active')->default(1);
          $table->boolean('featured')->default(0);

          $table->timestamps();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
          $table->integer('deleted_by')->unsigned()->nullable();
          $table->softDeletes();
        });


        Schema::create('blogs_categories_details', function(Blueprint $table){
          $table->increments('id');
          $table->integer('category_id')->unsigned();
          $table->foreign('category_id')->references('id')->on('blogs_categories')->onDelete('cascade');
          $table->integer('blog_id')->unsigned();
          $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
          $table->timestamps();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
        });

        Schema::create('blogs_comments', function(Blueprint $table){
          $table->increments('id');

          $table->integer('blog_id')->unsigned();
          $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');

          $table->char('name', 150);
          $table->mediumText('description');

          $table->timestamps();
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
        //
        Schema::dropIfExists('blogs_comments');
        Schema::dropIfExists('blogs_categories_details');
        Schema::dropIfExists('blogs_translations');
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('blogs_categories_translations');
        Schema::dropIfExists('blogs_categories');
    }
}
