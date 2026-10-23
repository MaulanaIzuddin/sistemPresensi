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
    Schema::create('attendance_sessions', function (Blueprint $table) {
        $table->id();

        $table->foreignId('schedule_id')
            ->constrained('schedules')
            ->cascadeOnDelete();

        $table->foreignId('opened_by')
            ->constrained('users')
            ->restrictOnDelete();

        $table->string('title')->nullable();

        // Token rahasia untuk QR dinamis
        $table->string('qr_token_hash', 64)->nullable()->unique();

        $table->dateTime('starts_at');
        $table->dateTime('ends_at');

        $table->unsignedInteger('qr_refresh_seconds')->default(30);

        $table->boolean('is_open')->default(true);

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_sessions');
    }
};
