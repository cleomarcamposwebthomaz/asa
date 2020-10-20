<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Brokers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brokers', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('name');
            $table->string('about')->nullable();
            $table->string('email')->nullable();
            $table->text('emails')->nullable();
            $table->string('phone')->nullable();
            $table->string('phones')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->text('address')->nullable();            
            $table->string('image')->nullable();
            $table->boolean('active')->nullable()->default(0);
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
        Schema::dropIfExists('brokers');
    }
}