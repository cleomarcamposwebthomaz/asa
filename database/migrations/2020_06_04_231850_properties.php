<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Properties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('broker_id')->unsigned()->nullable();
            $table->foreign('broker_id')
                ->references('id')
                ->on('brokers')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->unsignedBigInteger('offer_type_id')->unsigned()->nullable();
            $table->foreign('offer_type_id')
                ->references('id')
                ->on('offer_types')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->unsignedBigInteger('state_id')->unsigned()->nullable();
            $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->unsignedBigInteger('city_id')->unsigned()->nullable();
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->unsignedBigInteger('property_type_id')->unsigned()->nullable();
            $table->foreign('property_type_id')
                ->references('id')
                ->on('property_types')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->string('slug')->nullable();
            $table->string('name');
            $table->string('reference')->nullable();
            $table->float('price', 8, 2)->nullable()->default(0);
            $table->float('price_promotional', 8, 2)->nullable()->default(0);
            $table->text('description')->nullable();

            $table->integer('bathroom')->nullable()->default(0);
            $table->integer('bedrooms')->nullable()->default(0);
            $table->integer('property_size')->nullable()->default(0);
            $table->integer('garages')->nullable()->default(0);
            $table->integer('suites')->nullable()->default(0);
            $table->string('video_url')->nullable();
            $table->year('year')->nullable()->default(0);

            // Address
            $table->string('cep', 10)->nullable();
            $table->string('street')->nullable();
            $table->integer('number')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('complement')->nullable();

            $table->string('image', 100)->nullable();
            $table->boolean('active')->default(0)->nullable();
            $table->boolean('fatured')->default(0)->nullable();
            $table->integer('sort')->default(0)->nullable();
            $table->text('tags');
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
        Schema::table('properties', function (Blueprint $table) {
            $table->dropForeign('properties_broker_id_foreign');
            $table->dropForeign('properties_city_id_foreign');
            $table->dropForeign('properties_offer_type_id_foreign');
            $table->dropForeign('properties_state_id_foreign');
            $table->dropForeign('properties_property_type_id_foreign');
        });

        Schema::dropIfExists('properties');
    }
}