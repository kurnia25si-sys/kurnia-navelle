<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ulasan_produks', function (Blueprint $table) {
            $table->string('email_pengulas')->nullable()->after('nama_pengulas');
        });
    }

    public function down(): void
    {
        Schema::table('ulasan_produks', function (Blueprint $table) {
            $table->dropColumn('email_pengulas');
        });
    }
};