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
        Schema::table('projects', function (Blueprint $table) {
            // 1. Tambahkan kolom-kolom baru
            $table->string('project_leader_name')->after('client');
            $table->string('project_leader_email')->after('project_leader_name');
            $table->string('project_leader_avatar')->nullable()->after('project_leader_email'); // URL ke avatar

            // 2. Hapus kolom lama
            $table->dropColumn('project_leader');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Method down untuk mengembalikan seperti semula jika diperlukan
            $table->string('project_leader')->after('client');

            $table->dropColumn('project_leader_name');
            $table->dropColumn('project_leader_email');
            $table->dropColumn('project_leader_avatar');
        });
    }
};