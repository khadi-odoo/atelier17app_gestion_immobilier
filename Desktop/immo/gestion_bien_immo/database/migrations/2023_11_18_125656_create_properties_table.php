<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->float('surface');
            $table->integer('floor');
            $table->integer('price');
            $table->string('city');
            $table->string('address');
            $table->binary('image');
            $table->string('postal_code');
            $table ->boolean('green_area');
            $table->boolean('sold');



            // $table->string('rooms');
            // $table->string('bedrooms');
            // $table ->string('terrace');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
