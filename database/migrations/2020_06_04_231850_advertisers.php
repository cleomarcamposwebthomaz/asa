<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Advertisers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisers', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('name');
            $table->enum('person_type', ['legal', 'individual'])->nullable()->default('legal');
            $table->string('document')->nullable();
            $table->string('email')->nullable();
            $table->text('emails')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatszap')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->text('address')->nullable();
            $table->longText('html')->nullable();
            $table->longText('about')->nullable();
            $table->boolean('active')->default(0)->nullable();
            $table->integer('sort')->default(0)->nullable();
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
        Schema::dropIfExists('advertisers');
    }
}