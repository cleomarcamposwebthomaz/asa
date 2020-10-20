<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PropertyPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_photos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('property_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('caption')->nullable();

            $table->boolean('active')->nullable()->default(1);
            $table->integer('sort')->nullable()->default(0);
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
        Schema::dropIfExists('property_photos');
    }
}