<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('furnis', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id');
            $table->string('name');
            $table->string('code')->unique();
            $table->string('revision')->nullable();
            $table->string('description')->nullable();
            $table->string('category');
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
        Schema::dropIfExists('furnis');
    }
};
