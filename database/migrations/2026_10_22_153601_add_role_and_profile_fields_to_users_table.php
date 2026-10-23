
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('mahasiswa');
            $table->string('nim')->nullable()->unique();
            $table->string('nip')->nullable()->unique();
            $table->string('telegram_chat_id')->nullable();
            $table->boolean('is_active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['nim']);
            $table->dropUnique(['nip']);

            $table->dropColumn([
                'role',
                'nim',
                'nip',
                'telegram_chat_id',
                'is_active',
            ]);
        });
    }
};
