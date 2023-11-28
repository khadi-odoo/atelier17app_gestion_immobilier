<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Property;
use App\Models\LivingRoom;
use App\Models\BedRoom;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pictures', function (Blueprint $table) {
            //$table->id();
            $table->binary('title');
            $table->foreignIdFor(Property::class)->constrained()->nullable()->cascadeOnDelete();
            $table->foreignIdFor(LivingRoom::class)->constrained()->nullable()->cascadeOnDelete();
            $table->foreignIdFor(BedRoom::class)->constrained()->nullable()->cascadeOnDelete();   
            $table->primary(['property_id', 'bed_room_id', 'living_room_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pictures');
    }
};
