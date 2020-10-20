<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FeatureProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_property', function (Blueprint $table) {
            $table->id();

            $table->foreignId('property_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->nullable();

            $table->foreignId('feature_id')
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
        Schema::dropIfExists('feature_property');
    }
}