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
        Schema::create('living_rooms', function (Blueprint $table) {
            $table->id();
            $table ->string('title');
            $table ->string('description');
            $table ->float('surface');
            $table ->integer('toilet');
            $table->foreignIdFor(Property::class)->constrained()->cascadeOnDelete();
           // $table->primary(['property_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('living_rooms');
    }
};
