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
    Schema::create('schedules', function (Blueprint $table) {
        $table->id();

        $table->foreignId('class_room_id')
            ->constrained('class_rooms')
            ->cascadeOnDelete();

        $table->string('day', 10);
        $table->time('start_time');
        $table->time('end_time');

        $table->string('room_name')->nullable();

        // Koordinat lokasi kuliah untuk geofencing
        $table->decimal('latitude', 10, 7)->nullable();
        $table->decimal('longitude', 10, 7)->nullable();
        $table->unsignedInteger('radius_meters')->default(100);

        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
