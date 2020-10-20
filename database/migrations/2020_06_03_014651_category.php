<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable()->unsigned();

            $table->string('slug')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image', 100)->nullable();
            $table->boolean('active')->default(0)->nullable();
            $table->boolean('show_menu')->default(0)->nullable();
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
        Schema::dropIfExists('categories');
    }
}
