<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OfferTypeProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_type_property', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->nullable();

            $table->foreignId('offer_type_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('offer_type_property');
    }
}