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
    Schema::create('attendances', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('attendance_session_id');
        $table->unsignedBigInteger('student_id');

        $table->dateTime('attended_at');

        // Koordinat GPS mahasiswa ketika presensi
        $table->decimal('latitude', 10, 7);
        $table->decimal('longitude', 10, 7);

        // Jarak mahasiswa dari titik lokasi kuliah
        $table->unsignedInteger('distance_meters');

        $table->enum('status', [
            'hadir',
            'terlambat',
            'izin',
            'sakit'
        ])->default('hadir');

        $table->timestamps();

        // Satu mahasiswa hanya boleh presensi sekali per sesi
        $table->unique(
            ['attendance_session_id', 'student_id'],
            'attendance_session_student_unique'
        );
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
