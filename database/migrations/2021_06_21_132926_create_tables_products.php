<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_categories', function(Blueprint $table){
          $table->increments('id');

          $table->char('erp_id', 20);

          $table->string('name');
          $table->string('description')->nullable();

          $table->decimal('comision', 19, 2)->nullable();
          $table->decimal('incremento_pvp', 19, 2)->nullable();

          $table->string('slug');
          $table->string('seo_keywords')->nullable();
          $table->string('seo_title')->nullable();
          $table->text('seo_description')->nullable();

          $table->boolean('active')->default(1);
          $table->integer('parent_id')->unsigned()->nullable();
          $table->string('photo_principal')->nullable();


          $table->timestamps();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
          $table->integer('deleted_by')->unsigned()->nullable();
          $table->softDeletes();
        });

        Schema::table('products_categories', function(Blueprint $table){
          $table->foreign('parent_id')->references('id')->on('products_categories')->onDelete('restrict');
        });


        Schema::create('products_brands', function(Blueprint $table){
            $table->increments('id');

            $table->string('name');
            $table->string('description')->nullable();

            $table->string('slug');

            // SEO tags
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();

            // Campos de control
            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->softDeletes();
        });

        Schema::create('products', function(Blueprint $table){
            $table->increments('id');

            $table->char('erp_id', 25);

            $table->string('name');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('products_categories')->onDelete('restrict');

            $table->integer('sub_category_id')->unsigned()->nullable();
            $table->foreign('sub_category_id')->references('id')->on('products_categories')->onDelete('restrict');

            $table->integer('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('products_brands')->onDelete('set null');

            $table->decimal('buy_price', 19, 2)->default(0);
            $table->decimal('price', 19, 2);
            $table->decimal('VAT', 10, 2)->default(0)->comment('Valor del IVA o impuesto correspondiente en porcentaje');
            $table->decimal('discount', 19, 2)->nullable();

            $table->string('description');
            $table->longText('long_description')->nullable();

            $table->decimal('weight', 10, 2)->unsigned()->default(0);
            $table->string('photo_principal')->nullable();
            $table->boolean('active')->default(1);

            $table->integer('stock')->default(0);

            $table->char('sku', 100)->nullable();
            $table->char('ean_code', 100)->nullable();
            $table->string('reference')->nullable();

            $table->string('slug');
            $table->string('seo_keywords')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();

            $table->integer('parent_id')->unsigned()->nullable();

            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->softDeletes();
        });

        Schema::table('products', function(Blueprint $table){
          $table->foreign('parent_id')->references('id')->on('products')->onDelete('restrict');
        });

        Schema::create('products_files', function(Blueprint $table){
          $table->increments('id');
          $table->integer('product_id')->unsigned();
          $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
          $table->string('path');
          $table->timestamps();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
        });

        Schema::create('products_photos', function(Blueprint $table){
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('path');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
        });


        /*
        * OFERTAS - OFFERS
        */
        Schema::create('products_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text')->nullable();
            $table->float('discount');
            $table->integer('discount_type')->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->softDeletes();
        });

        Schema::create('products_offers_details', function(Blueprint $table){
           $table->integer('product_id')->unsigned();
           $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           $table->integer('offer_id')->unsigned();
           $table->foreign('offer_id')->references('id')->on('products_offers')->onDelete('cascade');
        });


        /*
        *   REVIEWS
        */
        Schema::create('products_reviews', function(Blueprint $table){
          $table->increments('id');

          $table->integer('product_id')->unsigned();
          $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');

          $table->integer('client_id')->unsigned()->nullable();
          $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');

          $table->char('name', 100);
          $table->dateTime('date');
          $table->smallInteger('stars')->default(1);
          $table->string('title');
          $table->string('description')->nullable();

          $table->string('image')->nullable();

          $table->timestamps();
          $table->softDeletes();
        });

        Schema::create('products_reviews_photos', function(Blueprint $table){
          $table->increments('id');

          $table->integer('review_id')->unsigned();
          $table->foreign('review_id')->references('id')->on('products_reviews')->onDelete('cascade');

          $table->char('path', 150);

          $table->timestamps();
        });


        /*
        * CLIENTS - PRODUCT RATES
        */
        Schema::create('clients_products_rates', function(Blueprint $table){
          $table->increments('id');

          $table->integer('client_id')->unsigned();
          $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

          $table->integer('product_id')->unsigned();
          $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

          $table->decimal('discount', 10, 2)->default(0);
          $table->boolean('discount_type')->default(0);

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
        Schema::dropIfExists('clients_products_rates');

        Schema::dropIfExists('products_reviews_photos');
        Schema::dropIfExists('products_reviews');

        Schema::dropIfExists('products_offers_details');
        Schema::dropIfExists('products_offers');

        Schema::dropIfExists('products_photos');
        Schema::dropIfExists('products_files');

        Schema::dropIfExists('products_translations');
        Schema::dropIfExists('products');

        Schema::dropIfExists('products_brands');

        Schema::dropIfExists('products_categories_translations');
        Schema::dropIfExists('products_categories');
    }
}
