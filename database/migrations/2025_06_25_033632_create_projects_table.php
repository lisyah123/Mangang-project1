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
       Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('project_name');
        $table->string('client');
        $table->string('project_leader');
        $table->date('start_date');
        $table->date('end_date');
        $table->integer('progress')->default(0);
        $table->timestamps(); // membuat kolom created_at dan updated_at
    });     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
