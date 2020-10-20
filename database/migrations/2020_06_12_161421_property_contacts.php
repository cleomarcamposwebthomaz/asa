<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PropertyContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->nullable();

            $table->foreignId('broker_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->nullable();

            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('message');
            $table->boolean('is_read')->nullable()->default(0);

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
        Schema::dropIfExists('property_contacts');
    }
}