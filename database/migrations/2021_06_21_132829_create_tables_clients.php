<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // PAISES
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->char('short_code',2);
            $table->float('vat')->nullable();
        });


        /*
        * CLIENTES
        */
        Schema::create('clients', function(Blueprint $table){
          $table->increments('id');

          $table->integer('erp_id');

          $table->string('name')->nullable();

          $table->string('company_name')->nullable();

          $table->char('email', 150)->unique();
          $table->char('phone', 50)->nullable();
          $table->char('dni', 50)->nullable();
          $table->string('address')->nullable();
          $table->char('city', 50)->nullable();
          $table->char('province', 100)->nullable();
          $table->char('postal_code', 25)->nullable();
          $table->integer('country_id')->unsigned()->nullable();
          $table->foreign('country_id')->references('id')->on('countries')->onDelete('restrict');

          $table->string('shipping_address')->nullable();
          $table->char('shipping_city', 50)->nullable();
          $table->char('shipping_province', 100)->nullable();
          $table->char('shipping_postal_code', 25)->nullable();
          $table->integer('shipping_country_id')->unsigned()->nullable();
          $table->foreign('shipping_country_id')->references('id')->on('countries')->onDelete('restrict');

          $table->char('iva_regimen', 2)->default('N');
          $table->char('iva_clase', 2)->default('N');

          $table->decimal('riesgo_max', 19, 4)->nullable();

          $table->text('observations')->nullable();
          $table->char('password',200);
          $table->rememberToken();
          $table->boolean('active')->default(1);

          $table->boolean('professional_pending_validation')->default(0)->comment('Campo para saber si esta pendiente de validar un cliente profesional');
          $table->boolean('professional')->default(0)->comment('Campo para determinar si es un cliente profesional');

          $table->timestamps();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
        });

        Schema::create('clients_contacts', function(Blueprint $table){
          $table->increments('id');

          $table->integer('client_id')->unsigned();
          $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict');

          $table->string('name');
          $table->char('phone', 50)->nullable();
          $table->char('phone_2', 50)->nullable();
          $table->char('email', 150)->nullable();
          $table->char('email_2', 150)->nullable();

          $table->char('position', 150)->nullable();
          $table->boolean('is_manager')->default(0);

          // Campos de control
          $table->timestamps();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
          $table->softDeletes();
        });


        /*
        * PASSWORD RESETS
        */
        Schema::create('password_resets', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('changed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');

        Schema::dropIfExists('clients_contacts');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('countries');
    }
}
