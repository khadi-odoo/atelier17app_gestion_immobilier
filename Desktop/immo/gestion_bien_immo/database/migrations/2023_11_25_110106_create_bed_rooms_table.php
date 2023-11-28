<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Property;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bed_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('number');
            $table->float('surface');
            $table->string('description');
            $table->integer('toilet');
            $table->integer('balcony');
            $table->foreignIdFor(Property::class)->constrained()->cascadeOnDelete();
            //$table->primary(['property_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bed_rooms');
    }
};
